<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConectionRequest;
use App\Http\Requests\ParentRequest;
use App\Project;
use App\User;
use Illuminate\Support\Facades\Mail;
use Validator;
use Illuminate\Http\Request;
use App\Conection;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('project.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.parent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        
        dd($input);
    }
    
    public function children(ParentRequest $request)
    {
        $user = Auth::user();

        $parent_temp = $request->all();

        $input = [
            'user_id' => $user->id,
            'name' => $parent_temp['name']
        ];

        $project = Project::create($input);

        $parents = $parent_temp['parents'];
        
        return view('project.children', compact('parents'));

    }

    public function start(Request $request)
    {
       // dd($request->all());
        $sections = $request->all();
        $parents = count($sections)-1;
        for($i=1; $i<count($sections); $i++){
            $validate["section$i"] = 'required';
        }

        $validator = Validator::make($request->all(),$validate);

        if ($validator->fails()) {
            return view('project.children',compact('parents'))->withErrors($validator);
        }

        $temp = $request->input();
        $this->formData = $temp;
        $temp['sections'] = 0;

        for($i=1; $i<count($temp)-1;$i++){
            $section_array[] = $temp["section$i"];
        }
        return view('project.form', compact('section_array'));
    }


    public function calculate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:15',
            'electric_user'=>'required',
            'poles'=>'required',
            'voltage'=>'required',
            'capacity'=>'required|integer|between:100,60000'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $errors =  json_decode($errors);

            return response()->json([
                'success' => false,
                'message' => $errors
            ], 422);
        }

        $temp = $request->all();


        $results = ConectionController::calculation($request);

        foreach($results as $result){
            Conection::create($result);
        }
        $temp['conections'] = $temp['conections'] - 1;

        if($temp['conections']==0){

            $user = Auth::user();
            $project = $user->project->last();
            ConectionController::parents($project);
        }
        
        return response()->json($temp);



    }
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

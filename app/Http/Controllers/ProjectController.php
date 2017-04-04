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
            'capacity'=>'required|integer'
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
        $temp['conections'] = $temp['conections'] - 1;

        $results = ConectionController::calculation($request);

        foreach($results as $result){
            Conection::create($result);
        }

        return response()->json($temp);


    }
    /*
    public function calculate(Request $request)
    {
        
        
        $temp = $request->all();


        $validator = Validator::make($request->all(), [
            'name' => 'required|max:15',
            'electric_user'=>'required',
            'poles'=>'required',
            'voltage'=>'required',
            'capacity'=>'required|integer'
        ]);

        if ($validator->fails()) {

            $section1 = $temp['section1'];
            $section2 = $temp['section2'];
            $section3 = $temp['section3'];
            $sections = $temp['sections'] + 1;
            $title = $temp['title'];
            $parent = $temp['parent'];
            if(isset($temp['cnt1'])){
                $cnt1 = $temp['cnt1'] - 1;
                return  view('project.form',
                    compact('section1','section2','section3','sections','title','cnt1','parent'))->withErrors($validator);
            }
            if(isset($temp['cnt2'])){
                $cnt2 = $temp['cnt2'] - 1;
                return  view('project.form',
                    compact('section1','section2','section3','sections','title','cnt2','parent'))->withErrors($validator);
            }
            if(isset($temp['cnt3'])){
                $cnt3 = $temp['cnt3'] - 1;

                return view('project.form',
                    compact('section1','section2','section3','sections','title','cnt3','parent'))->withErrors($validator);
                //dd($return);
            }
        }

        $inputs = ConectionController::calculation($request);

        foreach($inputs as $input){

            $input['title'] = $temp['title'];

            Conection::create($input);
        }


        $sections = $temp['sections'];

        if(isset($temp['section1']))
            $section1 = $temp['section1'];
        else {
            $section1 = 0;
        }

        if(isset($temp['section2']))
            $section2 = $temp['section2'];
        else {
            $section2 = 0;
        }
        
        if(isset($temp['section3']))
            $section3 = $temp['section3'];
        else {
            $section3 = 0;
        }

        $parent = $temp['parent'];
        
        while($parent !=0 )
        {
            if($parent == 1)
            {
                if(!isset($temp['cnt1']))
                    $cnt1 = 0;
                else
                    $cnt1 = $temp['cnt1'];

                for($a=0; $a<$section1; $a++)
                {
                    $titles[] = 'QF'. $parent .'.'. ($a+1);
                }
                if(isset($titles[$cnt1]))
                $title = $titles[$cnt1];

                if($sections != 0)
                    
                    return view('project.form', compact('sections','title','section1','section2','section3','cnt1','parent'));
            }
            if($parent == 2)
            {
                if(!isset($temp['cnt2']))
                    $cnt2 = 0;
                else
                    $cnt2 = $temp['cnt2'];
                for($b=0; $b<$section2; $b++)
                {
                    $titles[] = 'QF'. ($parent) .'.'. ($b+1);
                }
                if(isset($titles[$cnt2]))
                $title = $titles[$cnt2];
                
                if($sections != 0)
                    return view('project.form', compact('sections','title','section1','section2','section3','cnt2','parent'));
            }
            if($parent == 3)
            {
                if(!isset($temp['cnt3']))
                    $cnt3 = 0;
                else
                    $cnt3 = $temp['cnt3'];
                for($c=0; $c<$section3; $c++)
                {
                    $titles[] = 'QF'. ($parent) .'.'. ($c+1);
                }

                if(isset($titles[$cnt3]))
                $title = $titles[$cnt3];

                if($sections != 0)
                    return view('project.form', compact('sections','title','section1','section2','section3','cnt3','parent'));
            }
        }
        
        $user = Auth::user();

        $project = $user->project->last();

        ConectionController::parents($project);

        return redirect('/conection');
        
    }
    */

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

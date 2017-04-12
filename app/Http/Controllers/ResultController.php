<?php

namespace App\Http\Controllers;

use App\Conection;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cnt = 0;

        $user = Auth::user();

        $projects = $user->project->all();

        $project_names[-1] = 'выбрать';

        foreach ($projects as $project) {
            $project_names[$project->name] = $project->name;
            $conections_temp[] = $project->conection->all();
            $cnt++;
        }

        for ($i = 0; $i < $cnt; $i++) {
            $row = count($conections_temp[$i]);
            for ($j = 0; $j < $row; $j++) {
                $conections[] = $conections_temp[$i][$j];
            }
        }
        return view('results.custom_results',compact('conections', 'project_names'));
    }
    
    public function destroyProject(){

        $input = Input::all();

        $result = Project::where('name', $input[1])->delete();

        return response()->json($result);
    }

    public function destroyAll(){

        $user = Auth::user();
        $results = $user->project->all();

        foreach($results as $result){
            $result->delete();
        }
        return response()->json($results);
    }

    public function destroyOne(){

        $input = Input::all();

        $result = Conection::whereId($input[1])->delete();

        return response()->json($result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

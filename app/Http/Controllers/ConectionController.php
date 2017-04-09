<?php

namespace App\Http\Controllers;

use App\Conection;
use App\Http\Requests\ConectionRequest;
use App\Mail\Results;
use App\Mail\Results1;
use App\Project;
use App\User;
use App\Role;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Validator;


class ConectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
    }
    
    public function pdf()
    {
        $request = Input::all();

        $inputs = explode(',',$request['ids']);
        
        $conections = Conection::find($inputs);

        $pdf = PDF::loadView('email.pdf', compact('conections'))->setPaper('a4', 'landscape');

        return $pdf->download('results.pdf');
    }

    static public function mail(Request $request)
    {
        $ids = $request->all();
        
        $conections = Conection::find($ids);
        
        $user = Auth::user();
        $email = $user->email;

        Mail::to($email)->send(new Results1($conections));
            $result = 'Письмо успешно отправлено';


        return response()->json($result);
    }
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('conection.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $cnt = 0;

        for ($i = 0; $i < ((count($input['creates'])) / 10); $i++) {
            for ($j = 0; $j < 9; $j++) {
                $outputs[$i][$j] = $input['creates'][$cnt];
                $cnt++;
            }
        }

        foreach ($outputs as $output) {

            Conection::create([
                'name' => $output[1],
                'title' => $output[2],
                'product' => $output[3],
                'nominal_current' => $output[4],
                'poles' => $output[5],
                'break_current' => $output[6],
                'outdoor_protection' => $output[7],
                'project_id' => $output[8]
            ]);
        }

        return redirect('/result');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Conection::findOrFail($id)->delete();

        return redirect('/result');

    }
    

    static public function power_calculation($current, $project_id, $title)
    {
        $current = $current*1.1;

        $current_start = $current * 8;

        $nominal = DB::table('power')
            ->where([['nominal_current', '>=', $current]])
            ->min('nominal_current');

        if($current>80){
            $inputs = DB::table('power')
                ->where([['nominal_current', '=', $nominal]])
                ->get();
        }
        else{
            $inputs = DB::table('power')
                ->where([['nominal_current', '=', $nominal], ['break_current', '>', ($current * 800) / 1000]])
                ->get();
        }

        foreach ($inputs as $input) {

            $input = json_decode(json_encode($input), true);
            $input['voltage'] = 380;
            $input['project_id'] = $project_id;
            $input['title'] = $title;
            $input['poles'] = 3;
            $cof = 12;

            if ($current_start < ($cof * $input['nominal_current'])) {
                $creates[] = $input;
            }

        }
        if (isset($creates))
            return $creates;

    }

    static public function calculation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:15',
            'electric_user'=>'required',
            'poles'=>'required',
            'voltage'=>'required',
            'capacity'=>'required|integer'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withRequest($request->all())->withErrors($validator);
        }

        $user = Auth::user();

        $check = $request->all();

        if ($request->electric_user == 1 && $request->voltage == 380) {
            $current = 1.1 * ($request->capacity / (1.73 * 380 * 0.9 * 0.9));
            $current_start = 8 * $current;
            $init = 1;
        }
        else{
            $current = 1.1 * ($request->capacity / $request->voltage);
            $init = 0;
        }

        $poles = $request->poles;

        $nominal = DB::table('breakcircuit')
            ->where([['nominal_current', '>=', $current],['nominal_current', '<', $current*2],['poles', '=', $poles]])
            ->min('nominal_current');

        $inputs = DB::table('breakcircuit')
            ->where([['nominal_current', '=', $nominal], ['poles', '=', $poles]])
            ->get();

        if (isset($check['section_cnt'])) {
            $project = $user->project->last();
            $title = $request->title;
        }
        else
        {
            $project = $user->project->where('name', 'temp')->first();
            $title = 'QF' . Project::get()->count();
            if (!isset($project)) {
                $project = Project::create(['name' => 'temp', 'user_id' => $user->id]);
            }

        }

        foreach ($inputs as $input) {

            $input = json_decode(json_encode($input), true);
            $input['voltage'] = $request->voltage;
            $input['project_id'] = $project->id;
            $input['title'] = $title;

            $results = explode(" ", $input['name']);

            foreach ($results as $result) {
                if ($result == 'B') {
                    $cof = 3;
                } else if ($result == 'C') {
                    $cof = 6;
                } else if ($result == 'D') {
                    $cof = 12;
                } else {
                    $cof = 3;
                }

            }
            if ($init == 1) {
                if ($current_start < ($cof * $input['nominal_current'])) {
                    $creates[] = $input;
                }
            }
            else
            {
                if (($cof == 3) || ($cof == 6)) {
                    $creates[] = $input;
                }
            }
        }

        if ($poles == 3){
            $creates_power = ConectionController::power_calculation($current, $project->id,$title);
        }

        if(isset($creates_power)){
            foreach ($creates_power as $create_power) {
                $creates[] = $create_power;
            }
        }


        if (isset($check['section_cnt'])) {
            return $creates;
        } else {
            return  view('conection.result', compact('creates'));
            
        }
    }

    static public function parents(Model $project)
    {
        //$user = Auth::user();
        //$project = $user->project->last();
        $conections = $project->conection->all();

        foreach ($conections as $conection) {
            if((strlen($conection->title))>5){
                $title_section[] = substr($conection->title, -4);
            }
            else{
                $title_section[] = substr($conection->title, -3);
            }
        }

        for($i=count($title_section)-1; $i>0; $i--){
            if($title_section[$i]==$title_section[$i-1]){
                unset($title_section[$i]);
            }
        }


        foreach($title_section as $conection){
            if((strlen($conection))>3){
                $titles[]= substr($conection, -2);
            }
            else{
                $titles[]= substr($conection, -1);
            }

        }

        $iterations = 0;
        
        foreach($titles as $title){
            if($iterations!=0){
                if($title==1)
                $result_sections[$iterations]=$titles[$iterations-1];
            }
            if($iterations==(count($titles)-1)){

                $result_sections[$iterations]=$title;
            }
            $iterations++;
        }

        $iterations = 1;

        foreach($result_sections as $sections){
            for($i=1;$i<($sections+1);$i++){
                foreach($conections as $conection){
                    if($conection->title == "QF$iterations.$i"){
                        if (!isset($currents[$iterations][$i])){
                            $currents[$iterations][$i]=$conection->nominal_current;
                        }
                        $poless[$iterations][] = $conection->poles;
                    }

                }
            }
            $poless[$iterations]= max($poless[$iterations]);
            $iterations++;
        }

        $result_current = Array();
        $poles = Array();
        for($i=1; $i<(count($currents)+1); $i++){
            $result_current[$i] =0;
            $titles[$i]="QF$i";
            $poles[$i]=$poless[$i];
            foreach($currents[$i] as $current){
                $result_current[$i] = $result_current[$i] + $current;
            }
            ConectionController::parents_calculate($result_current[$i], $poles[$i], $titles[$i], $project->id);
        }

        $master_current = 0;
        foreach($result_current as $current){
             $master_current = $master_current + $current;
        }
        $master_poles = max($poles);
        $title = 'QF0';
        ConectionController::parents_calculate($master_current, $master_poles, $title, $project->id);

    }

    static public function parents_calculate($current, $poles, $title, $project_id)
    {

        $current = 1.1 * $current;

        if ($poles == 3) {
            $nominal = DB::table('power')
                ->where([['nominal_current', '>=', $current]])
                ->min('nominal_current');

            if($title != 'QF0'){
                $inputs = DB::table('power')
                    ->where([['nominal_current', '=', $nominal], ['break_current', '>', ($current * 200) / 1000]])
                    ->get();
                $power_init = 1;
            }
            else{
                $inputs = DB::table('power')
                    ->where([['nominal_current', '=', $nominal]])
                    ->get();
                $power_init = 1;
            }

        }
        else if ($poles == 2)
        {
            $nominal = DB::table('breakcircuit')
                ->where([['nominal_current', '>=', $current],['nominal_current', '<', $current*2], ['poles', '=', $poles]])
                ->min('nominal_current');

            $inputs = DB::table('breakcircuit')
                ->where([['nominal_current', '=', $nominal], ['poles', '=', $poles]])
                ->get();
            $power_init = 0;

        }
        else
        {
            $nominal = DB::table('breakcircuit')
                ->where([['nominal_current', '>=', $current],['nominal_current', '<', $current*2], ['poles', '=', $poles]])
                ->min('nominal_current');

            $inputs = DB::table('breakcircuit')
                ->where([['nominal_current', '=', $nominal], ['poles', '=', $poles]])
                ->get();
            $power_init = 0;

        }
        foreach ($inputs as $input) {
            $input = json_decode(json_encode($input), true);
            if ($power_init == 1) {
                $input['poles'] = 3;
            }
            $input['title'] = $title;
            $input['project_id'] = $project_id;
            Conection::create($input);
        }

    }

}

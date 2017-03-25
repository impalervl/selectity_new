<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        
        return view('admin.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:15',
            'email'=>'required|unique:users',
            'role_id'=>'required',
            'password'=>'required',
            'confirm_password'=>'required|same:password'
        ]);

        if (($validator->fails())||($input['password']!=$input['confirm_password'])) {
            return redirect()->back()->withRequest($request->all())->withErrors($validator);
        }

        $input['password'] = bcrypt($request->password);

        User::create($input);

        return redirect('admin/users');

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
        $user = User::findOrFail($id);

        return view('admin.users.edit',compact('user'));
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:15',
            'email'=>'required|unique:users',
            'role_id'=>'required',
            'confirm_password'=>'same:password'
        ]);

        if ($validator->fails()){
            return redirect()->back()->withRequest($request->all())->withErrors($validator);
        }

        $user = User::findOrFail($id);

        $input = $request->all();

        if(isset($input['password'])){

            $input['password']= bcrypt($request->password);
        }
        else{
            $input['password']=$user->password;
        }

        $user->update($input);

        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::whereId($id)->delete();

        return redirect('/admin/users');

    }
}

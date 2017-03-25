@extends('layouts.app1')

@section('content')
    <div class="container-fluid">
        @include('layouts.adminleft')
        <div class="col-md-7 col col-md-offset-1" >
            <h1>Редактировать данные пользователя{{$user->name}}</h1>
            {!! Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id]]) !!}

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                {!! Form::label('name','Enter Name:') !!}
                {!! Form::text('name', null, ['class' =>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email','Email') !!}
                {!! Form::text('email', null, ['class' =>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('role_id','Role') !!}
                {!! Form::select('role_id',array(''=>'Role','1'=>'admin','2'=>'user'), null, ['class' =>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password','Password') !!}
                {!! Form::password('password', ['class' =>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('confirm_password','Confirm Password') !!}
                {!! Form::password('confirm_password', ['class' =>'form-control']) !!}
            </div>

            {!! Form::submit('Редактировать', ['class' =>'btn btn-success']) !!}

            {!! Form::close() !!}
            @include('includes.formerror')
            {!! Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id],'class'=>'pull-right']) !!}

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">

                {!! Form::submit('DELETE',['class'=>'btn btn-danger']) !!}

            </div>

            {!! Form::close() !!}
        </div>

    </div>

@stop
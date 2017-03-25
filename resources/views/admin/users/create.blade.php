@extends('layouts.app1')



@section('content')
    <div class="container-fluid">
        @include('layouts.adminleft')
        <div class="col-md-7 col col-md-offset-1" >
            <h1>Создать пользователя</h1>
            {!! Form::open(['method'=>'POST','action'=>'AdminUsersController@store']) !!}

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

            {!! Form::submit('Подтвердить', ['class' =>'btn btn-success']) !!}

            {!! Form::close() !!}
            @include('includes.formerror')
        </div>

    </div>


@stop
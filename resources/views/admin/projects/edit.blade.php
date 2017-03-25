@extends('layouts.app1')

@section('content')
    <div class="container-fluid">
        @include('layouts.adminleft')
        <div class="col-md-7 col col-md-offset-1" >
            <h1>Редактировать данные проекта {{$project->name}}</h1>

            {!! Form::model($project,['method'=>'PATCH','action'=>['AdminProjectsController@update',$project->id]]) !!}

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                {!! Form::label('name','Enter Name:') !!}
                {!! Form::text('name', null, ['class' =>'form-control']) !!}
            </div>


            {!! Form::submit('Редактировать', ['class' =>'btn btn-success']) !!}

            {!! Form::close() !!}
            @include('includes.formerror')
            {!! Form::open(['method'=>'DELETE','action'=>['AdminProjectsController@destroy',$project->id],'class'=>'pull-right']) !!}

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">

                {!! Form::submit('DELETE',['class'=>'btn btn-danger']) !!}

            </div>

            {!! Form::close() !!}
        </div>

    </div>

@stop
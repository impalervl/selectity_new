@extends('layouts.app1')

@section('content')
    <div class="container-fluid col-md-10 col-md-offset-1">
        <h1 class ="col-md-8 col-md-offset-4">Форма расчёта проекта</h1>
        <div class="form-group">
            {!! Form::open(['method'=>'POST','action'=>'ProjectController@children']) !!}

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                {!! Form::label('name','Название проекта') !!}
                {!! Form::text('name', null, ['class' =>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('parents','Количество шиносборок') !!}
                {!! Form::select('parents',array(''=>'Количество шиносборок','1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7'), null, ['class' =>'form-control']) !!}
            </div>

            {!! Form::submit('Подтвердить', ['class' =>'btn btn-success']) !!}

            {!! Form::close() !!}
            @include('includes.formerror')
        </div>
    </div>





@endsection
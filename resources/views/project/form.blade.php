@extends('layouts.app1')

@section('content')
    <h2 id="working" style="display: none;  position: absolute; opacity: 0.95; top: 40%; left: 35%">
        <img src="/images/ajax-loader.gif">
        Waiting for server...
    </h2>
<div class="container-fluid col-md-10 col-md-offset-1" id="container-form">

    <h1 class ="col-md-9 col-md-offset-3">Форма расчёта для присоединения
        <span id = "title"> </span>
    </h1>


    {!! Form::open(['id'=>'project-form']) !!}

    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">
        {!! Form::label('name','Enter Name:') !!}
        {!! Form::text('name', null, ['class' =>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('electric_user','Тип потребителя') !!}
        {!! Form::select('electric_user',array(''=>'Тип потребителя','1'=>'Асинхронный двигатель','2'=>'Другое'), null, ['class' =>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('poles','Количество фаз') !!}
        {!! Form::select('poles',array(''=>'Колличество фаз','1'=>'1','2'=>'2','3'=>'3'), null, ['class' =>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('voltage','Номинальное напряжение(B)') !!}
        {!! Form::select('voltage',array(''=>'Класс напряжения','220'=>'220','380'=>'380'), null, ['class' =>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('capacity','Номинальная мощность(Вт)') !!}
        {!! Form::text('capacity', null, ['class' =>'form-control']) !!}
    </div>



    @if(isset($section_array))
        <input type="hidden" name= "section_cnt" value="{{$i=1}}">
        <input type="hidden" name= "conections" value="">
        <div id = 'hidden'>
            @foreach($section_array as $section)
                <input type="hidden" id = "section{{$i++}}" value="{{$section}}">
            @endforeach
        </div>
    @endif

    <a class="btn btn-success" id = 'submit-form-button' role="button">Расчёт проекта</a>


    {!! Form::close() !!}
    <div  id ="errors" style="position: relative;">
        <ul></ul>
    </div>
</div>


@endsection
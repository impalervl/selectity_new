@extends('layouts.app1')

@section('content')
<div class="container-fluid" >

    <h1>Форма расчёта для присоединения<span id = "title"> </span></h1>

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

    <a class="btn btn-warning" id = 'submit-form-button' role="button">Расчёт проекта</a>


    {!! Form::close() !!}

</div>
<div  id ="errors">
    <ul></ul>
</div>

@endsection
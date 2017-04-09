@extends('layouts.app1')

@section('content')


<div class="container-fluid col-md-10 col-md-offset-1">

    <h1 class ="col-md-8 col-md-offset-3">Количество присоединений на шиносборках</h1>

    {!! Form::open(['method'=>'POST','action'=>'ProjectController@start']) !!}

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @if(isset($parents))
        @for($i=1; $i<$parents+1; $i++)
        <div class="form-group">
            {!! Form::label("section $i","Количество присоединений секции $i") !!}
            {!! Form::select(
                                "section$i",
                                array(''=>"Количество присоединений секции $i",'1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10'),
                                null, ['class' =>'form-control', 'id'=>"section$i"]) !!}
        </div>
        @endfor
            {!! Form::submit('Подтвердить', ['class' =>'btn btn-success', 'id' => 'children-submit-button']) !!}

    {!! Form::close() !!}
    @endif
    @include('includes.formerror')
</div>

@endsection
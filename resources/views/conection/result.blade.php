@extends('layouts.app1')
@section('content')


    <div class="container col-md-12 col-md-offset-0">
        <h1 class="col-md-6 col-md-offset-5">Результаты</h1>

        {!! Form::open(['method'=>'POST','action'=>'ConectionController@store']) !!}

        <table class="table table-condensed" id="conection-result">
            <thead>
            <tr>
                <th>Id</th>
                <th>Название</th>
                <th>Условное обозначение</th>
                <th>Производитель</th>
                <th>Номинальный ток</th>
                <th>Количество фаз</th>
                <th>Ток отсечки</th>
                <th>Степень защиты</th>
                <th>Время создания</th>
            </tr>
            </thead>

            @if(isset($creates))

                @foreach($creates as $create)
                    <tbody>
                    <tr>
                        <td>{{$create['id']}}</td>
                        <input type="hidden" name="creates[]" value="{{$create['id']}}">
                        <td>{{$create['name']}}</td>
                        <input type="hidden" name="creates[]" value="{{$create['name']}}">
                        <td>{{$create['title']}}</td>
                        <input type="hidden" name="creates[]" value="{{$create['title']}}">
                        <td>{{$create['product']}}</td>
                        <input type="hidden" name="creates[]" value="{{$create['product']}}">
                        <td>{{$create['nominal_current']}}</td>
                        <input type="hidden" name="creates[]" value="{{$create['nominal_current']}}">
                        <td>{{$create['poles']}}</td>
                        <input type="hidden" name="creates[]" value="{{$create['poles']}}">
                        <td>{{$create['break_current']}}</td>
                        <input type="hidden" name="creates[]" value="{{$create['break_current']}}">
                        <td>{{$create['outdoor_protection']}}</td>
                        <input type="hidden" name="creates[]" value="{{$create['outdoor_protection']}}">
                        <input type="hidden" name="creates[]" value="{{$create['project_id']}}">
                        <td>
                            <a class="btn btn-danger" id="button{{$create['id']}}" role="button">Удалить</a>
                        </td>

                    </tr>
                    @endforeach



                    </tbody>
                    @endif

        </table>


                <a class="btn btn-primary" href={{route('conection.create' )}} role="button">Расчёт нового присоединения</a>


        {!! Form::submit('Подтвердить', ['class' =>'btn btn-success']) !!}

        {!! Form::close() !!}
    </div>



@stop
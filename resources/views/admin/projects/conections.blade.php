@extends('layouts.app1')



@section('content')
    <div class="container-fluid">
        @include('layouts.adminleft')
        <h1>Результаты</h1>
        @if(isset($conections))
            <div class="col-md-10 col col-md-offset-0" >
                <table id ="results_list" class="table table-condensed">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Проект</th>
                        <th>Название</th>
                        <th>Условное обозначение</th>
                        <th>Производитель</th>
                        <th>Номинальный то</th>
                        <th>Количество фаз</th>
                        <th>Ток отсечки</th>
                        <th>Время создания</th>
                        <th>удалить</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($conections as $conection)
                        <tr>
                            <td>{{$conection->id}}</td>
                            <td><a href={{route('projects.edit',$conection->project_id)}}>{{$conection->project_id}}</a></td>
                            <td>{{$conection->name}}</td>
                            <td>{{$conection->title}}</td>
                            <td>{{$conection->product}}</td>
                            <td>{{$conection->nominal_current}}</td>
                            <td>{{$conection->poles}}</td>
                            <td>{{$conection->break_current}}</td>
                            <td>{{$conection->created_at}}</td>
                            <td>
                                {!! Form::open(['method'=>'DELETE','action'=>['AdminConectsController@destroy',$conection->id]]) !!}
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    {!! Form::submit('Удалить результат',['class'=>'btn btn-danger']) !!}
                                </div>
                                {!! Form::close() !!}
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>

            </div>
        @endif
    </div>


@stop
@extends('layouts.app1')

@section('content')

    <div class ="container-fluid">
        <div class="btn-group-vertical col-xs-3 col-sm-2 " id="left-column" >
            <ul class="sidebar-menu hidden" id = 'results-menu'>

            </ul>

        </div>
        <div class="col-md-10 col col-md-offset-0">
            @if(isset($conections))

                <h1 class="col-md-2 col col-md-offset-0">Результаты</h1>
                <div class='container alert alert-success col-md-3 col col-md-offset-0' id="mail-info" style="display: none" >
                    <h5></h5>
                </div>
                <div id="dialog-confirm" title="Удалить все результаты">
                    <p style="display: none"><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Результаты не смогут быть восстановлены, вы уверены?</p>
                </div>
                <div id="confirm-delete-project" title="Удалить проект">
                    <p style="display: none"><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Результаты не смогут быть восстановлены, вы уверены?</p>
                </div>
                <div class="col-md-0 col col-md-offset-6">
                    <a class="btn btn-success"  id="pdfDownload" role="button">Загрузить в Pdf</a>
                    <a class="btn btn-success " id="sendMail" role="button">Отпаравить на почту</a>
                    <a class="btn btn-danger " id="destroy-all" role="button">ОЧИСТИТЬ РЕЗУЛЬТАТЫ</a>
                </div>
                {!! Form::select('project_name', $project_names, null, ['class' =>'form-control', 'id'=>'project_name']) !!}

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
                    <th>Степень защиты</th>
                    <th>Время создания</th>
                    <th>удалить</th>
                </tr>
                </thead>
                <tbody>
                @foreach($conections as $conection)
                    <tr>
                        <td>{{$conection->id}}</td>
                        <td>{{$conection->project->name}}</td>
                        <td>{{$conection->name}}</td>
                        <td>{{$conection->title}}</td>
                        <td>{{$conection->product}}</td>
                        <td>{{$conection->nominal_current}}</td>
                        <td>{{$conection->poles}}</td>
                        <td>{{$conection->break_current}}</td>
                        @if($conection->outdoor_protection == 'NULL')
                            <td>Не указано</td>
                        @else
                            <td>{{$conection->outdoor_protection}}</td>
                        @endif
                        <td>{{$conection->created_at}}</td>
                        <td>
                            <a class="btn btn-danger" id="button{{$conection->id}}" role="button">Удалить</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
                <h3 class="col-md-9 col-md-offset-3">Пока ничего не посчитано</h3>
                <div class="container-fluid col-md-9 col-md-offset-1">
                    <a style="width: 300px" class="btn btn-primary" href={{route('conection.create')}} role="button">Расчитать первое присоединение </a>
                    <a style="width: 300px" class="btn btn-warning" href={{route('project.create')}} role="button">Расчитать первый проект</a>
                </div>
            @endif
        </div>
    </div>

@endsection
@extends('layouts.app1')



@section('content')
    <div class="container-fluid">
        @include('layouts.adminleft')

        @if(isset($projects))
            <div class="col-md-7 col col-md-offset-1" >
                <table id ="results_list" class="table table-condensed">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Имя</th>
                        <th>Владелец</th>
                        <th>Создан</th>
                        <th>Обновлен</th>
                        <th>Редактировать</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($projects as $project)
                        <tr>
                            <td>{{$project->id}}</td>
                            <td><a href={{route('projects.edit',$project->id)}}>{{$project->name}}</a></td>
                            <td><a href={{route('users.edit',$project->user->id)}}>{{$project->user->name}}</a></td>
                            <td>{{$project->created_at}}</td>
                            <td>{{$project->updated_at}}</td>
                            <td><a class="btn btn-primary" href={{route('projects.show',$project->id)}} role="button">Данные проекта</a></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                @endif
            </div>
    </div>


@stop
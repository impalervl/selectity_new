@extends('layouts.app1')



@section('content')
    <div class="container-fluid">
        @include('layouts.adminleft')

        @if(isset($users))
            <div class="col-md-7 col col-md-offset-1" >
                <table id ="results_list" class="table table-condensed">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Имя</th>
                        <th>Роль</th>
                        <th>Почта</th>
                        <th>Создан</th>
                        <th>Обновлен</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td><a href={{route('users.edit',$user->id)}}>{{$user->name}}</a></td>
                            <td>{{$user->role->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>{{$user->updated_at}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                @endif
            </div>
    </div>


@stop
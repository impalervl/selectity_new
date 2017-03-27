@component('mail::message')
<h1>Результаты</h1>.

@component('mail::table')
@if(isset($conections))
    <table>
        <thead>
        <tr>
            <th>Id</th>
            <th>Проект</th>
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
                <td>{{$conection->outdoor_protection}}</td>
                <td>{{$conection->created_at}}</td>
            </tr>

        @endforeach

        </tbody>
    </table>
@endif
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        div{
            font-family: "DejaVu Serif";
            max-width: 1100px;
        }
        table {
            width: 100%;
            font-family: "DejaVu Serif";
            font-size: 12px;
            border-collapse: collapse;
            text-align: center;
            table-layout: fixed
        }
        th, td:first-child {
            background: #AFCDE7;
            color: white;
            padding: 10px 20px;
        }
        th, td {
            border-style: solid;
            border-width: 0 1px 1px 0;
            border-color: white;
        }
        td {
            background: #D8E6F3;
        }
        th:first-child, td:first-child {
            text-align: left;
        }
    </style>
</head>
<body>
<div>
    <h1>Результаты</h1>
    @if(isset($conections))
        <table>
            <thead>
            <tr>

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
</body>
</div>

</html>
<div class="btn-group-vertical col-xs-3 col-sm-2 " role="group" aria-label="Vertical button group">
    <div class="btn-group" role="group">
        <button id="btnGroupVerticalDrop1" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Пользователи <span class="caret"></span> </button> <ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
            <li><a href="{{route('users.index')}}">Список пользователей</a></li>
            <li><a href="{{route('users.create')}}">Создать</a></li>
        </ul>
    </div>

    <div class="btn-group" role="group">
        <button id="btnGroupVerticalDrop2" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Проекты/Результаты <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
            <li><a href="{{route('projects.index')}}">Все проекты </a></li>
            <li><a href="{{route('conections.index')}}">Все результаты</a></li>
        </ul> </div> <div class="btn-group" role="group">
        <button id="btnGroupVerticalDrop3" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Dropdown
            <span class="caret"></span>
        </button> <ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop3">
            <li><a href="#">Dropdown link</a></li>
            <li><a href="#">Dropdown link</a></li>
        </ul>
    </div>
    <div class="btn-group" role="group">
        <button id="btnGroupVerticalDrop4" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Dropdown
            <span class="caret"></span> </button> <ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop4">
            <li><a href="#">Dropdown link</a></li>
            <li><a href="#">Dropdown link</a></li>
        </ul>
    </div>
</div>

@yield('content')
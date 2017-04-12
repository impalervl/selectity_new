@extends('layouts.app1')
@section('content')

    <div class="container">
            <div class="col-md-5 col-md-offset-0">

                    <div class="text-left">
                        <dl>
                            <dt><h2>Расчет проекта</h2></dt>

                            <dd>Приложение позволяет расчитать номиналы автоматических
                                выключателей для схемы  состоящей из 7ми секциЙ с зафиксироваными
                                10-ю присоединениями на каждой. Так же можно расчитать проект
                                для схемы с меньшим количеством присоединений/секций.
                                Проект может быть расчитан как для трехвазной сети, так и для
                                однофазной(разводка жилого дома) В форме расчета
                                присоединения (QF1.1-3 QF2.1-3 QF3.1-3 ...)
                                требуется ввести:
                            </dd>
                            <ul>
                                <li> название присоединения</li>
                                <li> тип потребителя (для отстройки
                                    от пусковых токов АД)</li>
                                <li> количество полюсов автомата</li>
                                <li> класс напряжения</li>
                                <li> суммарную мощность потребления</li>
                            </ul>
                            <br>
                            <dt>Секционный автомат QF1, QF2, QF3 ...</dt>
                            <dd>
                                Секционный автомат выбирается из условия
                                суммы токов автоматов присоединений
                                и учитывает максимальное количество
                                полюсов дочерних автоматов
                            </dd>
                            <br>
                            <dt>Вводной автомат QF0</dt>
                            <dd>
                                Вводной автомат выбирается из условия
                                суммы токов секционных автоматов
                                и учитывает максимальное количество
                                полюсов дочерних автоматов
                            </dd>
                        </dl>
                    </div>

            </div>

        <figure>
            <img style=" height: 320px; width: 600px" src="/images/selectity.png" alt="">
            <figcaption><br>Рис 1 - Однолинейная схема примера расчёта</figcaption>
        </figure>

        <a class="btn btn-primary col-md-offset-5"
           style="position: relative; top:180px"
           href={{route('project.create')}} role="button">Расчитать проект
        </a>

    </div>

@stop
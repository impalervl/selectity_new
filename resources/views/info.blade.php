@extends('layouts.app1')

@section('content')
    <div class="container">
        <h2 style="text-align: center">Устройство и принцип действия автоматического выключателя</h2>
        <div id="marked-image" class="col-md-4" >
            <br><br>
            <img src="/images/info/shema.jpg" alt="" style="height: 400px">
        </div>
        <div class="col-md-7 col-md-offset-1">
            <br><br>
            <p style="text-align: justify">
                Автоматический выключатель (автомат) служит для нечастых включений и отключений электрических цепей и
                защиты электроустановок от перегрузки и коротких замыканий, а также недопустимого снижения напряжения.
                По сравнению с плавкими предохранителями автоматический выключатель обеспечивает более эффективную защиту,
                особенно в трёхфазных цепях, так как в случае, например, короткого замыкания производится отключение всех фаз сети.
                Предохранители в этом случае, как правило,отключают одну или две фазы, что создаёт неполнофазный режим, который также является аварийным.
            </p>
            <ul style="list-style: decimal inside">
                <li>Механизм взвода</li>
                <li>Клеммы</li>
                <li>Силовые контакты</li>
                <li>Канал отвода газов</li>
                <li>Тепловой расцепитель</li>
                <li>Регулировочный винт теплового расцепителя</li>
                <li>Электромагнитный рацепитель</li>
                <li>Дугогасящая камера</li>
                <li>Механизм крепления на DIN-рейку</li>
            </ul>
        </div>

        <div id="carousel-info" class="col-md-12" style="top:50px">
            <div >

                <span class="col-md-10" style="text-align: justify">
                    <img src="/images/info/dugacamera.jpg" alt="" style="height: 230px" class="col-md-3">
                    Дугогасительная камера автомата находится в непосредственной близости к силовой контактной паре,
                    состоящей из неподвижного контакта, электрически соединенного с входной клеммой автомата и со специальным проводником,
                    подходящим к задней части дугогасительной камеры, и подвижного контакта, соединенного механически с механизмом взвода и расцепления,
                    а электрически с расцепителями и выходной клеммой автомата. Следует отметить, что при размыкании контактной пары,
                    напряжение остается только на неподвижном контакте (в случае обычного подключения питания сверху),
                    а на подвижном контакте и далее напряжения уже отсутствует, что является одним из обоснований необходимости подключения автомамата к
                    питанию сверху.
                </span>


            </div>
            <div>
                <p class="col-md-10" style="text-align: justify">
                    <img src="/images/info/elek-rascepitel.jpg" alt="" style="height: 230px" class="col-md-3">
                    Электромагнитный расцепитель автоматического выключателя представляет собой небольшую катушку
                    с обмоткой из медного изолированного провода и сердечником. Обмотка включается в цепь последовательно с контактами,
                    то есть по ней проходит ток нагрузки.
                    В случае возникновения короткого замыкания ток в цепи резко возрастает, в результате создаваемое
                    катушкой магнитное поле вызывает перемещение сердечника (втягивание в катушку или выталкивание из неё).
                    Сердечник при перемещении действует на отключающий механизм, который вызывает размыкание силовых контактов автоматического выключателя.
                    Существуют автоматические выключатели с полупроводниковыми расцепителями, реагирующими на максимальный ток.
                </p>
            </div>
            <div>
                <span class="col-md-11" style="text-align: justify">
                    <img src="/images/info/bimetall.jpg" alt="" style="height: 230px" class="col-md-3">
                    Тепловой расцепитель автоматического выкючателя представляет собой биметаллическую пластину,
                    изготовленную из двух металлов с различными коэффициентами линейного расширения, жестко соединенных между собой.
                    Пластина не является сплавом металлов, их соединение производится обычно прессованием.
                    Биметаллическая пластина включается в электрическую цепь последовательно с нагрузкой и нагревается электрическим током.
                    В результате нагрева происходит изгибание пластины в сторону металла с меньшим коэффициентом линейного расширения.
                    В случае возникновения перегрузки, то есть при небольшом (в несколько раз) увеличении тока в цепи по сравнению с
                    номинальным, биметаллическая пластина, изгибаясь, вызывает отключение автоматического выключателя.
                    Время срабатывания теплового расцепителя автоматического выключателя зависит не только от величины тока,
                    но и от температуры окружающей среды, поэтому в ряде конструкций предусмотрена температурная компенсация,
                    которая обеспечивает корректировку времени срабатывания в соответствии с температурой воздуха.
                </span>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app1')

@section('content')
    <div class="container" style="text-align: justify">
        <div id="carousel-header" class="col-md-10 col-md-offset-1">
            <div id="product1" >
                <img src="/images/products/abb1.jpeg" alt="" style="height: 200px">
            </div>
            <div id="product2" >
                <img src="/images/products/abb2.jpg" alt="" style="height: 200px">
            </div>
            <div id="product3" >
                <img src="/images/products/abb3.jpeg" alt="" style="height: 200px">
            </div>
            <div id="product4" >
                <img src="/images/products/eaton2.jpg" alt="" style="height: 200px">
            </div>
            <div id="product5">
                <img src="/images/products/eaton3.jpg" alt="" style="height: 200px">
            </div>
            <div id="product6">
                <img src="/images/products/hager.png" alt="" style="height: 200px">
            </div>
            <div id="product7">
                <img src="/images/products/promfactor.jpg" alt="" style="height: 200px">
            </div>
            <div id="product8">
                <img src="/images/products/snider.jpg" alt="" style="height: 200px">
            </div>
            <div id="product9">
                <img src="/images/products/IEK.jpg" alt="" style="height: 200px">
            </div>
        </div>
        <div class="row">
            <div class = "col-md-9 col-md-offset-1">
                <h1 class="text-primary text-center">Добро пожаловать на сайт для расчёта автоматических выключателей!<br></h1>
            </div>

            <div class="col-md-5 col-md-offset-0">

                <p>
                    Для проектирования надежного и бесперебойного электроснабжения электроустановок потребителей необходимо
                    учитывать селективность срабатывания защитных апаратов при повреждениях и ненормальных режимах работы электрических сетей.
                </p>
                <p >
                    Под селективностью понимают свойство защиты, обеспечивающее эффективное отключение только поврежденного участка системы при
                    коротких замыканиях(к.з.) и ненормальных режимах работы, посредством отключения автоматических выключателей(АВ).
                </p>
                <p>
                    Приложение позволяет подобрать рекомендуемый список автоматических выключателей по значению номинальных параметров
                    потребителя. Так же при помощи приложения можно расчитать подборку автоматических выключателей для разветвлённой сети из трёх
                    секций, класса напряжения до 0,4 кВ и необходимым количеством фаз. Приложение учитывает отстройку от пусковых токов ЭД и обеспечивает
                    "мнимую" селективность секционных и вводного атоматического выключателей. Для обеспечения более надёжных условий селективности
                    рекомендуется для секционных выключателей подбирать более "строгий" коофициент времятоковой характеристики.
                </p>
            </div>

            <img src="/images/common/schema.png" alt="" class="col-md-7 col-md-offset-0">

        </div>
        <br><br><br>

        <div class="row">

            <div class="col-md-4 col-md-offset-0" style="float: left">
                <img src="/images/common/current-time.jpg" alt="" style="width: 400px">
            </div>

            <div class="col-md-7 col-md-offset-1">

                <p>
                    <h3>ВЫБОР АВТОМАТИЧЕСКИХ ВЫКЛЮЧАТЕЛЕЙ.</h3> <br>
                    Для выбора автоматического выключателя, удовлетворяющего требованиям предъявляемым к автоматам защиты для каждого конкретного случая,
                    необходимо знать параметры и специфику защищаемой электропроводки, подключаемых к ней нагрузок и основные параметры электропитания.
                    На основании этих данных и требуемых параметров защиты, можно выбрать нужные автоматы для реализации схемы электрощита и всей системы токовой защиты.
                    Так как схема электрощита может быть достаточно сложной и быть не только глубокой, то есть состоять из нескольких ступеней защиты,
                    но и широкой, иметь несколько вводных линий и несколько отходящих линий, то для выбора автоматов в то или иное место электросхемы защиты нужно учитывать
                    так же указанные выше параметры смежных автоматов и других аппаратов защиты установленных до и после выбираемого автомата.
                </p>
                <p >
                    ВЫБОР НОМИНАЛЬНОГО РАБОЧЕГО ТОКА АВТОМАТИЧЕСКОГО ВЫКЛЮЧАТЕЛЯ.
                    Номинальный рабочий ток определяет максимальный ток, длительное протекание которорго по защищаемой электропроводке не приводитк ее выходу из строя.
                    Иными словами, номинальные токи, указываемые на автоматах должны соответствовать (не превышать) рабочих токов защищаемых электрических проводок.
                </p>
                <p>
                    ВЫБОР КОЛИЧЕСТВА ПОЛЮСОВ АВТОМАТИЧЕСКОГО ВЫКЛЮЧАТЕЛЯ.
                    Количество полюсов автомата выбирается в зависимости от типа защищаемого устройства.
                </p>
                <p>
                    ВЫБОР ВРЕМЯ-ТОКОВОЙ ХАРАКТЕРИСТИКИ АВТОМАТИЧЕСКОГО ВЫКЛЮЧАТЕЛЯ.
                    Время-токовая характеристика автоматического выключателя определяет параметры срабатывания автомата,
                    а именно скорость срабатывания в зависимости от превышения тока над номиналом автомата.
                </p>
                <p>
                    ВЫБОР НОМИНАЛЬНОЙ ОТКЛЮЧАЮЩЕЙ СПОСОБНОСТИ АВТОМАТИЧЕСКОГО ВЫКЛЮЧАТЕЛЯ.
                    Предельная отключающая способность автомата показывает максимальный ток, при котором автомат сработает и разомкнет цепь и снимет напряжение с защищаемой проводки.
                </p>
                <p>
                    ВЫБОР ПРОИЗВОДИТЕЛЯ И ЦЕНЫ АВТОМАТА.
                    производитель автомата Выбор производителя автомата производится по наличию у производителя необходимых для реализации защиты аппаратов.
                    Кроме того, в зависимости от ответственности защищаемой электропроводки можно выбирать
                    между производителями с продукцией по высокой цене и продукцией с невысокой ценой.
                </p>
            </div>

        </div>
        <a href="#" class="scrollToTop">^^^</a>
        <div class="row">

            <div class = 'col-md-12' id="abb">
                <h4>Автоматический выключатель фирмы ABB</h4>

                <img src="/images/products/abb3.jpeg" alt="" style="height: 250px" >

                <p class="col-md-9 col-md-offset-0" >

                    Внешний вид: компактный корпус из светло-серой негорючей пластмассы (действительно негорючей – проверено),
                    высота от задней стенки до верха клавиши – 75 мм, длина полюса 84 мм, выступ с клавишей – 45 мм.
                    Сама клавиша чёрного цвета, на верхней стороне имеется надпись "OFF", на нижней – "ON",
                    дополнительный индикатор состояния на корпусе отсутствует. На задней стенке расположен паз для крепления на дин-рейку (DIN-рейка),
                    ширина стандартная – 35 мм. Размер клеммы позволяет заводить жилу сечением до 25 мм²,
                    сама клемма если честно – болтающаяся и неудобная. В новом исполнении появились дополнительные разъёмы для крепления шины (ранее отсутствовали),
                    но клемма осталась на прежнем уровне. В общем, внешне обе серии различаются только маркировкой.

                    Внутри автоматических выключателей обеих серий находятся два вида расцепителей (тепловой из биметалла и электромагнитный из соленоида с сердечником),
                    дугогасительная камера из тринадцати пластин,
                    подвижный и неподвижный контакты с серебряными напайками,
                    регулировочный винт для теплового расцепителя.
                    Винт с неудобной для большинства пользователей шестигранной головкой, но это нельзя отнести к минусам,
                    поскольку большинству пользователей не нужно трогать этот винт. Серия автоматов S200 как и серия SH200L выпускаются в полном полюсном исполнении, от одного, до четырёх,
                    это отражается и в маркировке. Износостойкость (В-О) автоматических выключателей АББ нешуточная, 10 000 автоматических отключений и 20 000 механических.
                    Температурные характеристики поскромнее, нормальная рабочая температура для них начинается от -25°С и заканчивается 55°С,
                    что соответствует климатическому исполнению У3.
                </p>
            </div>
            <div class = 'col-md-12' id="asko">
                <h4>Автоматический выключатель фирмы ACKO</h4>

                <img src="/images/products/asko1.jpg" alt="" style="height: 250px" >
                <div class="col-md-9 col-md-offset-0">
                    <p>

                        Модульные автоматические выключатели компании АСКО-УКРЕМ применяют для защиты низковольтных электросетей и оборудования от токов короткого замыкания (КЗ) и продолжительных перегрузок. Также допускается использование их для оперативной коммутации электрической цепи.
                        Время срабатывания электромагнитной защиты этих приборов различается и определяется по кривым срабатывания:
                    </p>
                    <ul >
                        <li> кривая типа В - 3 In t> 0,1 c / 5 In t <0,1 c;</li>
                        <li>кривая типа С - 5 In t> 0,1 c / 8 In t <0,1 c;</li>
                        <li> кривая типа D - 8 In t> 0,1 c / 12 In t <0,1 c.</li>

                    </ul>
                    <p >
                        Доступны эти автоматы в 1, 2, 3 и 4 полюсном исполнении, а также предлагают изделия типа «фаза-нейтраль».
                        Поставляют такие изделия в картонных упаковках по 12 полюсов, а изделия серий ВА-2004 и ВА-2005 - в индивидуальных упаковках.
                        Приборы имеют простые и интуитивно понятные названия, в которых зашифрована основная необходимая
                        при выборе информация: ВА ХХХХ-Хр-ХХА, где первые четыре ХХХХ - это название серии, следующее Х -
                        количество полюсов, а остальные ХХ - номинальный ток электросети. Например, ВА 2003-3р-63А - выключатель
                        автоматической серии 2003, трехполюсной, рассчитан на работу в сети с номинальным напряжением 63 А.
                    </p>
                </div>
            </div>
            <div class = 'col-md-12' id="eaton">
                <h4>Eaton (Moeller)</h4>

                <img src="/images/products/eaton3.jpg" alt="" style="height: 250px" >
                <div class="col-md-9 col-md-offset-0">
                    <p>
                        <br><br><br>
                        Автоматические Moeller выключатели изготавливаются в Словакии и Австрии. В 2010 году Moeller бренд был выкуплен компанией американской Eaton,
                        вместе с производственными площадями.Автоматические выключатели Eaton (Moeller)|Автомат Мюллер (Итон) PL4 ― это серия бюджетного сегмента, которая отличается от остальных пониженной отключающей способностью ― 4,5 кА (предназначена для сетей с небольшими токами короткого замыкания). Обладают характеристикой отключения "C", от 1 до 3-х полюсов.
                        Монтируются автоматические выключатели Moeller на DIN-рейку.
                    </p>
                </div>
            </div>
            <div class = 'col-md-12' id="hager">
                <h4>Автоматический выключатель фирмы HAGER</h4>

                <img src="/images/products/hager.png" alt="" style="height: 250px; position:relative; top:80px" >
                <div class="col-md-9 col-md-offset-0">
                    <p>

                        Автоматические выключатели Hager – это современные приборы, служащие для защиты проводов и кабелей от токов короткого замыкания и перегрузки.
                        Все модульные изделия компании Hager изготавливаются во Франции.
                        Номинальная отключающая свойство этих приборов в зависимости от модели составляет 4,5 или 6 кА.
                        Наиболее востребованными эти автоматы являются в системах защиты и энергораспределения в общественном и жилом строительном секторе.
                        Производители отмечают, что их изделиях сделаны на базе лучших немецких инженерных решений, обеспечивающих безопасность использования, большую функциональность, высочайшее качество и удобство для монтажа.
                        Предлагают эти автоматы в нескольких сериях:

                    </p>
                    <ul >
                        <li>
                            MY - номинальная отключающая способность этих автоматов составляет 4,5 кА, времятоковая характеристика отключения С.
                            Они оборудованы металлической скобой для крепления на DIN-рейку;
                        </li>
                        <li>
                            MB - номинальная отключающая свойство изделий этой серии - 6 кА,
                            времятоковая характеристика типа В, монтаж осуществляется с помощью металлической скобы на DIN-рейку;
                        </li>
                        <li>
                            MC - номинальная отключающая способность таких автоматов - 6 кА.
                            Они имеют времятоковую характеристику отключения типа С и крепятся на DIN-рейку при помощи
                            металлической скобы;
                        </li>
                        <li>
                            MB - номинальная отключающая свойство изделий этой серии - 6 кА,
                            времятоковая характеристика типа В, монтаж осуществляется с помощью металлической скобы на
                            DIN-рейку;
                        </li>
                        <li>
                            MBS, MCS - номинальная отключающая способность этих приборов - 6 кА,
                            времятоковая характеристика срабатывания типа В и С.
                        </li>
                    </ul>
                    <p >
                        Автоматы оборудованы специальными пластиковыми креплениями на DIN-рейку, у них также предусмотрены прозрачные пластиковые
                        крышки для собственной маркировки. В приборах воплощена технология Quick Connect – самозажимные клеммы для электрических
                        соединений, которые значительно упрощают монтаж и делают его безопасным;
                    </p>
                </div>
            </div>
            <div class = 'col-md-12' id="iek">
                <h4>Автоматический выключатель фирмы IEK</h4>

                <img src="/images/products/iek3.jpg" alt="" style="height: 250px; position:relative; top:20px" >
                <div class="col-md-9 col-md-offset-0">
                    <p>
                        Под маркой ИЭК выпускается четыре вида "бытовых" автоматических выключателей, имеющих ряд общих характеристик и отличающихся по отдельным параметрам. Габариты автоматических выключателей ИЭК стандартные: 75 мм высота от задней стенки до верха клавиши, 84 мм длина вдоль полюса, 45 мм выступ с клавишей (рычажком/рукояткой – как угодно), и конечно же задний паз 35 мм – для крепления на дин-рейку (DIN-рейка). Цвет корпуса светло-серый, цвет клавиши – жёлтый, на лицевой панели имеется индикатор состояния: красный в положении "Вкл" и зелёный в положении "Выкл" (на старых моделях отсутствует).

                        Все 4 группы выключателей укомплектованы двумя видами расцепителей, тепловым и электромагнитным. Tипов мгновенного расцепления, у автоматов ИЭК три: B, C, и D.
                        Дугогасительная камера состоит из девяти пластин, расстояние между ними примерно два миллиметра,
                        что вполне соответствует стандартам. Клеммы у всех моделей так же одинаковы, рассчитаны на жилу сечением до 25 мм².
                        Климатическое исполнение всех групп – УХЛ4, что означает эксплуатацию в умеренном и холодном климате, но монтаж только в помещениях,
                        поскольку несмотря на то, что автоматы ИЭК не боятся ни жары ни холода (температурные характеристики от -40°С до +50°С), они боятся пыли, влаги и прямых солнечных лучей.
                        Заявленная износостойкость (В-О) автоматических выключателей поражает воображение: 6 000 автоматических отключений и 20 000 раз автомат ИЭК можно переключить вручную!
                        Так же к общим характеристикам можно отнести номинальное напряжение и частоту: 230/400 Вольт и 50 Герц соответственно.
                    </p>
                </div>
            </div>
            <div class = 'col-md-12' id="promfaktor">
                <h4>Автоматический выключатель фирмы ПРМФАКТОР</h4>

                <img src="/images/products/promfactor.jpg" alt="" style="height: 250px" >
                <div class="col-md-9 col-md-offset-0">
                    <ul >
                        <li>
                            Механика автомата обеспечена механизмом быстрого взведения;
                        </li>
                        <li>
                            Камера, которая гасит дугу состоит из 12 ребер, что дает надежный разрыв дуги и обепечит способность выключени 6кА;
                        </li>
                        <li>
                            Конструкция предусматривает возможность опломбировать автомат на включение или выключение автомата;
                        </li>
                        <li>
                            Автоматы АВ2000 устроены так, что к ним можно присоеденить дополнительные устройства. Они имеют специальные отверстия для быстрого присоединения;
                        </li>
                        <li>
                            Качественный корпус автомата изготовлен из абсолютно негорючего материала и при высокой температуре он плавится, но не горит.
                        </li>
                    </ul>
                    <p >
                        Автоматы Промфактор серии Стандарт можно монтировать без специального инструмента. На каждом автомате есть специальные фиксаторы с помощью которых их просто закрепить на стандвртную рейку 35х7,5.
                        На Двух или трехполюсных два фиксатора, на однополюсном один.
                    </p>
                </div>
            </div>
            <div class = 'col-md-12' id="snider">
                <h4>Автоматический выключатель фирмы Schneider-Electric</h4>

                <img src="/images/products/snider.jpg" alt="" style="height: 250px" >
                <div class="col-md-9 col-md-offset-0">
                    <ul >
                        <li>
                            Сплошная лицевая панель надежно защищает человека, находящегося перед аппаратом, от выхода раскаленных газов при слишком больших токах КЗ в случае деформации автомата;
                        </li>
                        <li>
                            Высокопрочный корпус из высококачественного пластика скреплен шестью клепками. Продуманный единообразный дизайн всей модульной линейки Easy9 от Шнейдер Электрик придает автоматам эстетичный внешний вид;
                        </li>
                        <li>
                            Удобная двухпозиционная защелка делает монтаж/демонтаж автоматического выключателя гораздо проще, удобнее и быстрее, чем монтаж обычного автомата даже одной рукой;
                        </li>
                        <li>
                            Простая, логичная и крупная маркировка позволяет идентифицировать автоматический выключатель Easy9 среди подобных по референсу, номинальному току, напряжению и отключающей способности;
                        </li>
                        <li>
                            Механизм быстрого (безынерционного) взведения позволяет мгновенно замкнуть контакты при взведении автомата. Скорость замыкания контактов не зависит от механической скорости взвода рукоятки. Это позволяет свести к минимуму возможное возникновение дуги, искрения, а как следствие, и подгорание контактов, а это означает что автоматический выключатель Easy9 служит в разы дольше обычных автоматов;
                        </li>
                        <li>
                            Расширенный температурный диапазон позволяет производить монтаж и работу с автоматами Easy9 при температуре -25 °С.
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
@endsection

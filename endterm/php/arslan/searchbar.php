<?php
    require_once dirname(dirname(dirname(__FILE__)))."/db.php";
?>

<script src="js/index.umd.min.js"></script>

<section class="search">
    <form class="search-form" action="search.php">
        <span>
            <input class="search-form-input depart" type="text" id="depart" autocomplete="off" placeholder="Город отправления" onkeyup="loadData(this.value, 0)" required>
            <input id="depart_city_id" name="depart_city_id" type="hidden">
            <div class="city-result" id="depart_city_result"></div>
        </span>
        <button class="search-form-button" onclick="citySwap(event)"><img width="30px" src="images/arslan/search/icon-change-dests_03.png" alt="change destionation"></button>
        <span>
            <input class="search-form-input dest" type="text" id="dest" autocomplete="off"  placeholder="Город прибытия" onkeyup="loadData(this.value, 1)" required>
            <input id="dest_city_id" name="dest_city_id" type="hidden">
            <div class="city-result" id="dest_city_result"></div>
        </span>
        <span>
            <div class="search-form-date">
                <input id="datepicker" class="search-form-input date" class="search-form-date" autocomplete="off"  type="text" placeholder="Дата туда/обратно" required readonly>
                <input id="datepickerRange" class="search-form-input date" class="search-form-date" autocomplete="off"  type="hidden" placeholder="Дата туда/обратно" required readonly>
                <input id="there-date" name="there-date" type="hidden">
                <input id="back-date" name="back-date" type="hidden">
                <div class="date-icon"></div>
            </div>
            <div class="calendar" id="calendar"></div>
        </span>
        <input class="search-form-input type-search" type="hidden" placeholder="1 взр, 0 дет, 0 млад" name="type" id="" readonly>
        <div class="type-form-input">
            <p class="type-form-input-type">Обычный, Эконом-класс</p>
            <p class="type-form-input-number">1 взр, 0 дет, 0 млад</p>
        </div>
        <button class="form-button search-button" type="submit">Найти</button>
    </form>
</section>

<script>
    //Date picker
    function pickerControlButtons(){
        //For the first one
        const easepickerModule1 = document.getElementsByClassName('easepick-wrapper')[0];
        const easepickerModuleRoot1 = easepickerModule1 && easepickerModule1.shadowRoot;
        var easepickButtons1 = '<div class="datepicker-buttons"><button class="datepicker-btn" onclick="twoWay(event)">Туда-обратно</button><button class="datepicker-btn active" onclick="oneWay(event)">Только туда</button><div>';
        easepickerModuleRoot1.children[0].children[0].innerHTML = easepickButtons1;
        //for the second one
        const easepickerModule2 = document.getElementsByClassName('easepick-wrapper')[1];
        var easepickButtons2 = '<div class="datepicker-buttons"><button class="datepicker-btn active" onclick="twoWay(event)">Туда-обратно</button><button class="datepicker-btn" onclick="oneWay(event)">Только туда</button><div>';
        const easepickerModuleRoot2 = easepickerModule2 && easepickerModule2.shadowRoot;
        easepickerModuleRoot2.children[0].children[0].innerHTML = easepickButtons2;
    }

    $(document).ready(function(){
        pickerControlButtons();
    });

    const pickerRange = new easepick.create({
        element: document.getElementById('datepickerRange'),
        css: [
            'https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.0/dist/index.css',
            'styles/arslan/datepicker.css'
        ],
        plugins: ['RangePlugin', 'LockPlugin'],
        LockPlugin: {
            minDate: new Date(),
        },
        RangePlugin: {
            tooltip: false,
        },
        lang: "ru-RU",
        grid: 2,
        calendars: 2,
        header: true,
        format: "DD MMM",
        zIndex: 1001,
        setup(picker) {
            picker.on('select', (e) => {
                const { start, end } = e.detail;
                var tzoffsetStart = start.getTimezoneOffset()*60000;
                var tzoffsetEnd = start.getTimezoneOffset()*60000;

                document.getElementById("there-date").value = (new Date(start - tzoffsetStart)).toISOString().split('T')[0];
                document.getElementById("back-date").value = (new Date(end - tzoffsetEnd)).toISOString().split('T')[0];
            });
            picker.on('render', (e) => {
                pickerControlButtons();
            });
        },
    });

    const pickerSolo = new easepick.create({
        element: document.getElementById('datepicker'),
        css: [
            'https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.0/dist/index.css',
            'styles/arslan/datepicker.css'
        ],
        plugins: ['LockPlugin'],
        LockPlugin: {
            minDate: new Date(),
        },
        lang: "ru-RU",
        grid: 2,
        calendars: 2,
        header: true,
        format: "DD MMM",
        zIndex: 1001,
        setup(picker) {
            picker.on('select', (e) => {
                const { date} = e.detail;
                var tzoffset = date.getTimezoneOffset()*60000;
                document.getElementById("there-date").value = (new Date(date - tzoffset)).toISOString().split('T')[0];
            });
            picker.on('render', (e) => {
                pickerControlButtons();
            });
        },
    });
    
    function twoWay(e){ 
        e.preventDefault();
        document.getElementById('datepicker').setAttribute('type', 'hidden');
        document.getElementById('datepickerRange').setAttribute('type', 'text');
        document.getElementById('datepickerRange').click();

        pickerSolo.clear();
        document.getElementById("there-date").value = '';
        document.getElementById("back-date").value = '';
    }

    function oneWay(e){ 
        e.preventDefault();
        document.getElementById('datepickerRange').setAttribute('type', 'hidden');
        document.getElementById('datepicker').setAttribute('type', 'text');
        document.getElementById('datepicker').click();
       
        pickerRange.clear();
        document.getElementById("there-date").value = '';
        document.getElementById("back-date").value = '';
    }

    //Swap city
    function citySwap(e){
        e.preventDefault();
        var depart = document.getElementById("depart").value;
        var dest = document.getElementById("dest").value;
        document.getElementById("depart").value = dest;
        document.getElementById("dest").value = depart;

        var departId = document.getElementById("depart_city_id").value;
        var destId = document.getElementById("dest_city_id").value;
        document.getElementById("depart_city_id").value = destId;
        document.getElementById("dest_city_id").value = departId;
    }

    
    //Autocomplete function for CITY CHOICE
    function getText(event, ok, id){
        var string = event;
        if(ok == 0){
            document.getElementById("depart").value = string;
            document.getElementById("depart_city_id").value = id;
            document.getElementById("depart_city_result").innerHTML = "";
        }
        else{
            document.getElementById("dest").value = string;
            document.getElementById("dest_city_id").value = id;
            document.getElementById("dest_city_result").innerHTML = "";
        }
    }

    function loadData(query, ok){
        if(query.length > 1){
            var form_data = new FormData();
            form_data.append("query", query);

            var ajax_request = new XMLHttpRequest();
            ajax_request.open("POST", "../../../endterm/php/arslan/search_autocomplete.php")
            ajax_request.send(form_data);

            ajax_request.onreadystatechange = function(){
                if(ajax_request.readyState == 4 && ajax_request.status == 200){
                    var response = JSON.parse(ajax_request.responseText);
                    var html = "";
                    if(response.length > 0){
                        html += '<ul style="list-style:none; padding: 0; margin: 0;">';
                        for(var count = 0; count < response.length; count++){
                            var id = response[count].id;
                            html += '<li class="city-li" id="'+response[count].name+'" onclick="getText(this.attributes[\'id\'].value,'+ok+','+id+')"><span>'+response[count].name+'</span><span>'+response[count].code+ '</span></li>';
                        }
                        html += '</ul>';
                    }
                    if(ok == 0){
                        document.getElementById('depart_city_result').innerHTML = html;
                    }
                    else{
                        document.getElementById('dest_city_result').innerHTML = html;
                    }
                }
            }
        }
        else{
            if(ok == 0){
                document.getElementById("depart_city_result").innerHTML = "";
            }
            else{
                document.getElementById("dest_city_result").innerHTML = "";
            }
        }
    }
</script>
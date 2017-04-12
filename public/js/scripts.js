$(document).ready(function() {
    $('#conection-result tr').each(function(index){
       var id = $(this).find('td:eq(0)').text();
        $('#button'+id).click(function(){
            $(this).parent().parent().remove();
        });
    });
    $('#pdfDownload').click(pdfRequest);
    $('#destroy-all').click(destroyAll);
    $('#sendMail').click(sendMail);
    $('#results_list tr').each(function () {

        var id = $(this).find('td:eq(0)').text();
        $('#button'+id).click(deleteOne(id));
    });
    
    $('#project_name').change(function () {
        var name = $(this).val();
        var titles_parent =[];
        var titles_children =[];
        $('#results_list tr').show();
        if (name == -1) {
            $('#results-menu').addClass('hidden');
            $('#results_list tr').show();
            $('#left-column #delete-project').remove();

            return false;
        }
        else {
            var cnt = 0;
            $('#results_list tr').each(function (index) {

                if (name == $(this).find("td:eq(1)").text()) {
                    if(($(this).find('td:eq(3)').text().length)>4)
                    titles_children[cnt] = $(this).find('td:eq(3)').text().substring(2,5);
                    if(($(this).find('td:eq(3)').text().length)>5)
                    titles_children[cnt] = $(this).find('td:eq(3)').text().substring(2,6);
                    cnt++;
                }
                if ((index > 0) && (name != $(this).find("td:eq(1)").text()))
                    $(this).hide();
            });

            var sections = setSections(titles_children);

            $('#left-column #delete-project').remove();
            $('#left-column ').append('<a class="btn btn-danger " id="delete-project" role="button">Удалить проeкт</a>')
            $('#left-column  #delete-project').click(function(){
                var data = {};
                data[1] = $('#project_name').val();
                deleteProject(data);
            });

            $('#results-menu').empty();
            $('#results-menu').removeClass('hidden');
            $('#results-menu').append('<li class="sidebar-header">MAIN NAVIGATION</li>');

            $('#results-menu').append('<li id = "all"></li>');
            $('#results-menu #all').append('<a href="#"></a>');
            $('#results-menu #all a')
                .append('<i class="fa fa-circle"></i>')
                .append('<span>Все результаты</span>');
            $('#results-menu #all a').click( function() {
                selectResultAll();
            });

            $('#results-menu').append('<li id = "enter"></li>');
            $('#results-menu #enter').append('<a href="#"></a>');
            $('#results-menu #enter a')
                .append('<i class="fa fa-circle"></i>')
                .append('<span>Вводной</span>');
            $('#results-menu #enter a').click( function() {
                var parent_id = 0;
                selectResultParent(parent_id);
            });

           sections.forEach(function(item, i, arr) {
                $('#results-menu').append('<li id = "section'+i+'"></li>');
                $('#results-menu #section'+i).append('<a href="#" id="parent'+(i+1)+'"></a>');
                $('#results-menu #section'+i+' a')
                    .append('<i class="fa fa-circle"></i>')
                    .append('<span>Секция '+(i+1)+'</span>')
                    .append('<i class="fa fa-angle-left pull-right"></i>');
               $('#results-menu #section'+i+' a').click( function() {
                   var parent_id = this.id.charAt(6);
                   selectResultSection(parent_id);
               });

               $('#results-menu #section'+i).append('<ul class="sidebar-submenu"> </ul>');
               $('#results-menu #section'+i+' .sidebar-submenu').append('<li id="master'+(i+1)+'"></li>');
               $('#results-menu #section'+i+' .sidebar-submenu #master'+(i+1))
                   .append('<a href="#"><i class="fa"></i>Секционный</a>');
               $('#results-menu #section'+i+' .sidebar-submenu #master'+(i+1)).click( function() {

                   var id = this.id.charAt(6);
                   selectResultParent(id);
               });

               for(var j=0; j<item; j++){
                   $('#results-menu #section'+i+' .sidebar-submenu').append('<li id="conection'+(j+1)+'"></li>');
                   $('#results-menu #section'+i+' .sidebar-submenu #conection'+(j+1))
                       .append('<a href="#"><i class="fa"></i>Присоединение '+(j+1)+'</a>');
                   $('#results-menu #section'+i+' .sidebar-submenu #conection'+(j+1)).click( function() {
                       if(this.id.length>10){
                           id = this.id.substring(9,11);
                       }
                       else{
                           var id = this.id.charAt(9);
                       }

                       var parent_id = $('#section'+i).attr('id').charAt(7);
                       parent_id = parseInt(parent_id);
                       selectResultConection(id,(parent_id+1));
                   });
               }
            });

        }
        function selectResultAll(){
            $('#results_list tr').each(function (index) {
                var name = $('#project_name').val();
                if ((index > 1) && (name == $(this).find("td:eq(1)").text()))
                    $(this).show();
            });
        }
        function selectResultSection(id){

            $('#results_list tr').each(function (index) {
                var name = $('#project_name').val();
                if ((index > 1) && (name == $(this).find("td:eq(1)").text()))
                    $(this).show();
                var parent_title = $(this).find("td:eq(3)").text().charAt(2);
                if ((index > 1) && (id != parent_title))
                    $(this).hide();
            });
        }
        function selectResultConection(id,parent_id){
            var needle = 'QF'+parent_id + '.'+ id;

            $('#results_list tr').each(function (index) {
                var name = $('#project_name').val();
                if ((index > 0) && (name == $(this).find("td:eq(1)").text()))
                    $(this).show();
                var title = $(this).find("td:eq(3)").text();

                if ((index > 0)&& (needle != title))
                    $(this).hide();

            });
        }
        function selectResultParent(parent_id){
            var needle = 'QF'+parent_id;

            $('#results_list tr').each(function (index) {
                var name = $('#project_name').val();
                if ((index > 0) && (name == $(this).find("td:eq(1)").text()))
                    $(this).show();
                var title = $(this).find("td:eq(3)").text();

                if ((index > 0)&& (needle != title))
                    $(this).hide();

            });
        }
    });

});

function destroyAll(){
    
    $("#dialog-confirm p").show();
    $("#dialog-confirm").dialog({
        resizable:false,
        modal:true,
        buttons:{
            "Удалить": function(){
                $.ajax({
                    type: "GET",
                    url: "result/destroyAll",
                    cache: false,
                    success: function(){
                        location="/result";
                    }
                });
                $(this).dialog( "close" );
            },
            Cancel: function(){
                $(this).dialog( "close" );
            }
        }
    });
}

function deleteProject(data){

    $("#confirm-delete-project p").show();
    $("#confirm-delete-project").dialog({
        resizable:false,
        modal:true,
        buttons:{
            "Удалить": function(){
                $.ajax({
                    type: "GET",
                    url: "result/destroy",
                    cache: false,
                    data: data,
                    beforeSend: function(request) {
                        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                    },
                    success: function(){
                        $("#project_name option[value=" + data[1] + "]").hide();
                        $('#project_name').val(-1).change();
                        $('#results_list tr').each(function (){
                            if ((data[1] == $(this).find("td:eq(1)").text())){
                                $(this).hide();
                            }
                        });
                    }
                });
                $(this).dialog( "close" );
            },
            Cancel: function(){
                $(this).dialog( "close" );
            }
        }
    });

}

function deleteOne(id){

    var data = {};
    data[1] = id;
    $('#button'+id).click(function(){
        $.ajax({
            type: "GET",
            url: "result/destroyOne",
            cache: false,
            data: data,
            beforeSend: function(request) {
                return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
            },
            success: function(data){
                showAlert(data);
                $('#button'+id).parent().parent().remove();
            }
        });

    });
}
function setSections(titles_children) {
    var i = titles_children.length;
    for(i;i>0;i--){
        if(titles_children[i]==titles_children[i-1]){
            delete titles_children[i];
        }
    }
    var titles =[];
    var cnt_sections =0;
    titles_children.forEach(function(item, i, arr) {
        if(item.length>3){
            titles[cnt_sections] = item.substring(2,4);
            cnt_sections++;
        }
        else{
            titles[cnt_sections] = item.charAt(2);
            cnt_sections++;
        }





    });

    var sections =[];
    cnt_sections =0;
    var iterations =0;

    titles.forEach(function(item, i, arr) {

        if(iterations != 0){
            if(item == 1){
                sections[cnt_sections] = arr[i-1];
                cnt_sections++;
            }
        }
        if(iterations == (arr.length-1)){
            sections[cnt_sections]=item;
        }
        iterations++;
    });
    return sections;
}

function pdfRequest() {
    
    var ids = [];

    $('#results_list tr:visible').each(function (index) {
        ids.push($(this).find("td:eq(0)").text());
    });

    ids = ids.join();
    
    location="/conection/getpdf?ids="+ids;

    /*$.ajax({
        type: "GET",
        url: "conection/getpdf",
        cache: false,
        data: ids,
        dataType: "json",
        beforeSend: function(request) {
            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
        },
        success: showAlert

    });*/
    
}

function sendMail(){
    var ids = {};

    $('#results_list tr:visible').each(function (index) {
        ids[index] = ($(this).find("td:eq(0)").text());
    });

    $.ajax({
        type: "POST",
        url: "conection/mail",
        cache: false,
        data: ids,
        dataType: "json",
        beforeSend: function(request) {
            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
        },
        success: showMailStatus,
        error: function (data) {
            var info = $('#mail-info');
            if(data.status == 500){
                info.removeClass('alert-success');
                info.addClass('alert-danger');
                info.show();
                $('#mail-info h5').text('Ошибка отправки, попробуйте позже');
                $('#mail-info').delay(5000).fadeOut('fast');
            }
        }
    })
}

function showMailStatus(data){

    $('#mail-info').show().slideDown('slow');
    $('#mail-info h5').text(data);
    $('#mail-info').delay(5000).fadeOut('fast');
}

var titleArea = '#title';

var hidden = '#hidden input';
var sections = new Array($(hidden).length);
var cnt_sections = 0;
var conections = 0;


$(hidden).each(function() {
    sections[cnt_sections] = ($( this ).val() );
    conections = conections + Number(sections[cnt_sections]);
    cnt_sections++;
});

var CONECTIONS = conections;
var parent = sections.length;

var titles = new Array(parent);

for( var i = 0; i<parent; i++){
    titles[i] = new Array(sections[i]);
    for(var j=0; j<sections[i]; j++){
            titles[i][j] = 'QF'+ (i+1) +'.'+ (j+1);
    }

}
function getFormData(form){
    var unindexed_array = form.serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function(n, i){
        indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
}

var data;
var current_title = titles[0][0];

function request(){

    var loadArea = '#working';
    $('#errors ul').empty();
    $(loadArea).show();
    $("#container-form").css("opacity", "0.8");
    var form = $("#project-form");
    data = getFormData(form);
    data.title = current_title;
    data.conections = conections;
    form[0].reset();
    $.ajax({
        url: "calculate",
        dataType: 'json',
        type: "POST",
        data: data,
        success: setTitle,
        complete: function(){

            $("#container-form").removeAttr("style");
            $(loadArea).hide();
        },
        error: function (data) {
            var info = $('#errors');

            if(data.status == 500){
                info.addClass('alert-danger');
                info.find('ul').append('<li>Ошибка сервера, попробуйте ввести другие данные</li>');
            }
            else{
                error = jQuery.parseJSON(data.responseText);
                info.addClass('alert-danger');
                for(var k in error.message){
                    if(error.message.hasOwnProperty(k)){

                        error.message[k].forEach(function(val){

                            info.find('ul').append('<li>' + val + '</li>');
                        });
                    }
                }
                info.slideDown();
            }

        }
    });

}
var cnt_title_parent=0;
var cnt_title_children=0;

function setTitle(data){
    cnt_title_children++;
    conections = data.conections;

    if(conections>0){
        var children = sections[cnt_title_parent];

        if((CONECTIONS - children) < data.conections){

            current_title = titles[cnt_title_parent][cnt_title_children];
            $(titleArea).text(current_title);
        }
        else{
            cnt_title_parent++;
            cnt_title_children = -1;
            CONECTIONS = CONECTIONS - children;
            setTitle(data);
        }
    }
    else{
        location="/result";
    }

}

function showAlert(data){
    console.log(data);
}

$(function () {
    $('#submit-form-button').click(request);

    $(titleArea).text(current_title);
});

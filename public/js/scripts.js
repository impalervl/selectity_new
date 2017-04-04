$(document).ready(function() {

    $('#project_name').change(function () {
        var name = $(this).val();
        $('#results_list tr').show();
        if (name == -1) {
            $('#results_list tr').show();
            return false;
        }
        $('#results_list tr').each(function(index) {
            console.log(index);
            if ((index > 1) && (name != $(this).find("td:eq(1)").text()))
                $(this).hide();
        });
    });

    $('#title').keyup(function () {
        var searchText = $(this).val().toLowerCase();
        console.log(searchText);
        $('#results_list tr').show();

        $('#results_list tr').each(function(index) {
            var component = $(this).find("td:eq(3)").text().toLowerCase();
            if ((index > 1) && component.indexOf(searchText) == -1)
                $(this).hide();
        });
    });

});

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
    var form = $("#project-form");
    data = getFormData(form);
    data.title = current_title;
    data.conections = conections;

   // form[0].reset();
    $.ajax({
        url: "calculate",
        dataType: 'json',
        type: "POST",
        data: data,
        success: setTitle,
        error: function (data) {
            var error = jQuery.parseJSON(data.responseText);
            var info = $('#errors');

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
    });
}
var cnt_title_parent=0;
var cnt_title_children=0;

function setTitle(data){
    
    if(data.conections == 0){
        document.location.href = "/conection";
    }
    else{
        cnt_title_children++;
        conections = data.conections;
        console.log(data);
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
    
}





function showAlert(data){
    console.log(data);
}

function requestChildrenServer(){
    
}

$(function () {
    $('#submit-form-button').click(request);

    $(titleArea).text(current_title);

});
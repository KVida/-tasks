$( document ).ready(function() {
    $("#btn-submit").click(
        function(){
            sendAjaxForm('result_form', 'form.ajax_form', 'action_ajax_form.php');
            return false;
        }
    );
});

function sendAjaxForm(result_form, ajax_form, url) {
    $.ajax({
        url:     url, //url страницы
        type:     "POST", //метод отправки
        dataType: "json", //формат возращаемых данных
        data: $( "form" ).on( "submit", function( event ) {
            event.preventDefault();
            //$( ajax_form ).serialize();
            $( this ).serialize();
        }),
        //data: $(ajax_form).serialize(),  // Сеарилизуем объект

        success : function(data) {
            alert(data)
        },
        error: function(data) {
            alert(data)
        }

       /* success: function(response) { //Данные отправлены успешно
            result = $.parseJSON(response);
            $('#result_form').html('URL: '+result.short_url);
        },
        error: function(response) { // Данные не отправлены
            $('#result_form').html('Ошибка. Данные не отправлены.');
        }*/
    });
}
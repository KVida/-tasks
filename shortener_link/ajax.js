const formModel = {
    str_url: ''
};

$( document ).ready(function() {
    $('#ajax_form input').change(function () {
        formModel[this.name] = $(this).val();
    });

    $("#btn-submit").click(
        function(){
            sendAjaxForm('result_form', formModel, 'action_ajax_form.php');
            //sendAjaxForm('result_form', '#ajax_form', 'action_ajax_form.php');
            return false;
        }
    );
});

function sendAjaxForm(result_form, ajax_form, url) {
    $.ajax({
        url:     url, //url страницы
        type:     "POST", //метод отправки
        dataType: "json", //формат возращаемых данных

        data: ajax_form,
        //data: $(ajax_form).serialize(),  // Сеарилизуем объект

       success: function(response) { //Данные отправлены успешно
            $('#result_form').html('URL: '+response.short_url);
        },
        error: function(response) { // Данные не отправлены
            $('#result_form').html('Ошибка. Данные не отправлены.');
        }
    });
}
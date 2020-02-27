<?php
var_dump($_POST);
if (isset($_POST["str_url"])) {
    $short_url = $_POST["str_url"];

    // Формируем массив для JSON ответа
    $result = [
        'short_url' => $short_url
    ];
    // Переводим массив в JSON
    echo json_encode($result);
}

?>
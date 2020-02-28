<?php
include "mysql.php";

if (isset($_POST["str_url"])) {

    $link = $_POST['str_url'];

    $sql = "
        SELECT
            id,
            url,
            short_url
        FROM
            table_short_url
        WHERE
            url LIKE ('$link')
    ";

    $res = $db_mysqli->query($sql);
    if ($res->num_rows > 0) {
        $res->data_seek(0);
        $row = $res->fetch_assoc();

        $id = $row['id'];
        $flag = false;
    } else {
        $flag = true;
    }

    $short_url = fnShortUrl();

    $db_mysqli->autocommit(false);
    try {
        if ($flag) {
            $sql_insert = "
                INSERT INTO table_short_url(url,short_url) VALUES ('$link', '$short_url')
            ";
            $res_insert = $db_mysqli->query($sql_insert);
        } else {
            $sql_update = "
                UPDATE
                    table_short_url
                SET 
                   short_url =  '$short_url'
                WHERE 
                    id = $id
            ";
            $res_update = $db_mysqli->query($sql_update);
        }

        $db_mysqli->commit();
    } catch (Exception $e) {
        $db_mysqli->rollback();
        throw new Exception( $e->getMessage());
    }


    // Формируем массив для JSON ответа
    $result = [
        'short_url' => $short_url
    ];

    // Переводим массив в JSON
    echo json_encode($result);
}


function fnShortUrl() {
    $date= new DateTime();
    $date_time = $date->format('U');

    $short_url = 'http://' . $_SERVER['HTTP_HOST'] . '/-' . $date_time;

    return $short_url;
}
?>
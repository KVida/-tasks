<?php
include "config.php";

// подключаемся к серверу
$db_mysqli = new mysqli($host, $user, $password, $database, $port);

if ($db_mysqli->connect_errno) {
    echo "Connection MySQL error: (" . $db_mysqli->connect_errno . ") " . $db_mysqli->connect_error;
}
$db_mysqli->set_charset("utf8");
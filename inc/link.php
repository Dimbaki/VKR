<?php
session_start();
$link = mysqli_connect("localhost","root", "","tex");

if (!$link){
    echo 'Ошибка: '. mysqli_connect_error();
}

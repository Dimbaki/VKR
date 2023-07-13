<?php
include '../inc/link.php';
include '../menu.php';
?>
<style>
    table {
        margin-top: 100px;
        width: 100%;
        border: none;
        margin-bottom: 20px;
        border-collapse:collapse;
    }
    table thead th {
        padding: 10px;
        font-weight: 500;
        font-size: 16px;
        line-height: 20px;
        text-align: left;
        color: #444441;
        border-top: 2px solid #716561;
        border-bottom: 2px solid #716561;
    }
    table tbody td {
        padding: 10px;
        font-size: 14px;
        line-height: 20px;
        color: #444441;
        border-top: 1px solid #716561;
    }
    table img{
        width: 500px;

    }
    .img{
        width: 30px;
    }
    button {
        color: #000000;
        width: 100px;
        height: 50px;
        background: #fff;
        border-radius: 5px;
        border-color: black;
        align-items: center;
    }
</style>
<?php

if($_SESSION['ID_PROBLEM']==NULL){$_SESSION['ID_PROBLEM']=$_POST['ID_PROBLEM'];} else {$_SESSION['ID_PROBLEM']=$_POST['ID_PROBLEM'];};

$sql = "SELECT * FROM problem WHERE ID='{$_SESSION['ID_PROBLEM']}' ";


if ($sql= mysqli_query($link, $sql)) {

    foreach ($sql as $sql1) {
        $sql2 = "SELECT * FROM users WHERE ID = '{$sql1['ID_USERS']}'";
        if ($sql2= mysqli_query($link, $sql2)){
            foreach ($sql2 as $sql3){
                $ID_USERS = $sql3["NAME"]." ".$sql3["SURNAME"]." ".$sql3["MIDDLE_NAME"];
            }
        }
        $sql2 = "SELECT * FROM problem_type WHERE ID = '{$sql1['PROBLEM_TYPE']}'";
        if ($sql2= mysqli_query($link, $sql2)){
            foreach ($sql2 as $sql3){
                $PROBLEM_TYPE = $sql3["PROBLEM"];
                $CLARIFICATION = $sql3["CLARIFICATION"];
            }
        }

        echo "<table border='1'>

        <tr>
        <td>ID задачи </td> 
        <td>Пользователь </td> 
        <td>Проблема </td> 
        <td>Подробнее </td> 
        <td>Комментарий </td> 
        <td>Время начала </td> 
        <td>Скриншот </td> 
        <td>Время начало </td> 
        <td>Статус </td>
        <td>Действие </td>
        </tr>";
        echo "<td>" . $sql1["ID"] . "</td>";
        echo "<td>" . $ID_USERS . "</td>";
        echo "<td>" . $PROBLEM_TYPE . "</td>";
        echo "<td>" . $CLARIFICATION. "</td>";
        echo "<td>" . $sql1["COMMENT"] . "</td>";
        echo "<td>" . $sql1["TIME"] . "</td>";
        if ($sql1["IMG"]) {echo "<td>  <img src=".$sql1["IMG"]."> </td>";}else {echo "<td></td>";}
        echo "<td>";
            if($sql1["TIME_START"]==NULL){
                echo "Не начато";
            }else{
                echo $sql1["TIME_START"];
            }
            echo "</td><td>";
        if($sql1["STATUS"]==1){
            echo "<img class='img' src='../inc/img/red.png'>";
        }elseif($sql1["STATUS"]==2) {
            echo "<img class='img' src='../inc/img/yellow.png'>";
        }elseif($sql1["STATUS"]==3){
            echo "<img class='img' src='../inc/img/green.png'>";
        }
        echo "</td>";
        echo "<td> <form method='POST' action='solution.php'>";
               if($sql1["STATUS"]==1){echo "<button type='submit' name='start' value=". $sql1["ID"] .">Начать</button>";}
               if($sql1["STATUS"]==2){echo "<button type='submit' name='end' value=". $sql1["ID"] .">Закончить</button>";}
               if($sql1["STATUS"]==3){echo "<button type='submit' name='stop' value=". $sql1["ID"] .">Отмена</button>";}
//

           echo "</form></td></tr></table>";
        }

} else{
    echo "Ошибка: " . mysqli_error($link);
}
if (isset($_POST['start'])) {
    $STAT=$_SESSION['ID_PROBLEM'];
    $time= date("Y-m-d H:i:s");
    $sql="UPDATE problem SET ID_USERS_EXECUTOR = '{$_SESSION["ID"]}', TIME_START = '$time', STATUS = '2'
                WHERE ID='{$_POST['start']}'";
    if (mysqli_query($link, $sql)) {

        echo "Данные успешно добавлены";
        header('Location: http://vkr/support/problem.php');
    } else {
        echo "Ошибка: " . mysqli_error($link);
    }
}
if (isset($_POST['end'])) {
    $time= date("Y-m-d H:i:s");
    $sql="UPDATE problem SET TIME_END = '$time', STATUS = '3'
                WHERE ID='{$_POST['end']}'";
    if (mysqli_query($link, $sql)) {
        echo "Данные успешно добавлены";
        header('Location: http://vkr/support/problem.php');

    } else {
        echo "Ошибка: " . mysqli_error($link);
    }
}
if (isset($_POST['stop'])) {
    $time= date("Y-m-d H:i:s");
    $sql="UPDATE problem SET TIME_END = '$time', STATUS = '4'
                WHERE ID='{$_POST['stop']}'";
    if (mysqli_query($link, $sql)) {
        echo "Данные успешно добавлены";
        header('Location: http://vkr/support/problem.php');
    } else {
        echo "Ошибка: " . mysqli_error($link);
    }
}

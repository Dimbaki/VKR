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
        width: 30px;

    }

</style>
<table class="table">
    <thead>
        <th>id</th>
        <th>Пользователь</th>
        <th>Исполнитель</th>
        <th>Тип задачи</th>
        <th>Коментарий</th>
        <th>Время</th>
        <th>Cтатус</th>
        <th>Начать задание</th>
    </thead>
    <tbody>
<?php
$sql = "SELECT * FROM problem ";
if ($sql= mysqli_query($link, $sql)) {
    foreach ($sql as $sql1) {
        $sql2 = "SELECT * FROM users WHERE ID = '{$sql1['ID_USERS']}'";
        if ($sql2= mysqli_query($link, $sql2)){
            foreach ($sql2 as $sql3){
                $ID_USERS = $sql3["NAME"]." ".$sql3["SURNAME"]." ".$sql3["MIDDLE_NAME"];
            }
        }
        $sql2 = "SELECT * FROM users WHERE ID = '{$sql1['ID_USERS_EXECUTOR']}'";
        if ($sql2= mysqli_query($link, $sql2)){
            foreach ($sql2 as $sql3){
                $ID_USERS_EXECUTOR = $sql3["NAME"]." ".$sql3["SURNAME"]." ".$sql3["MIDDLE_NAME"];
            }
        }
        $sql2 = "SELECT * FROM problem_type WHERE ID = '{$sql1['PROBLEM_TYPE']}'";
        if ($sql2= mysqli_query($link, $sql2)){
            foreach ($sql2 as $sql3){
                $PROBLEM_TYPE = $sql3["PROBLEM"];
            }
        }
        echo "<tr>";
            echo "<td>" . $sql1["ID"] . "</td>";
            echo "<td>" . $ID_USERS. "</td>";
            echo "<td>" . $ID_USERS_EXECUTOR . "</td>";
            echo "<td>" . $PROBLEM_TYPE . "</td>";
            echo "<td>" . $sql1["COMMENT"] . "</td>";
            echo "<td>" . $sql1["TIME"] . "</td> <td>";
            if($sql1["STATUS"]==1){
                echo "<img src='../inc/img/red.png'>";
            }elseif($sql1["STATUS"]==2) {
                echo "<img src='../inc/img/yellow.png'>";
            }elseif($sql1["STATUS"]==3){
                echo "<img src='../inc/img/green.png'>";
            }
            echo "</td>";

            echo "<td> <form method='POST' action='solution.php'>";
            if ($sql1["STATUS"]==1){ echo   "<button type='submit' name='ID_PROBLEM' value=" . $sql1["ID"] .">Начать</button> ";}
            if ($sql1["STATUS"]>=2){ echo   "<button type='submit' name='ID_PROBLEM' value=" . $sql1["ID"] .">Подробнее</button> 

                
              
            </form>
            </tbody>
        </td>";
        echo "</tr>";
    }
}
} else {
        echo "Ошибка: " . mysqli_error($link);
    }
    ?>

</table>
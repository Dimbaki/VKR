<?php
include '../inc/link.php';
include '../menu.php';
include '../inc/check_admin.php';
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
<table>
    <thead>
        <td>ID</td>
        <td>Имя</td>
        <td>Фамилия</td>
        <td>Отчество</td>
        <td>Логин</td>
        <td>Права пользователя</td>
        <td>Изменить</td>

    </thead>
    <tbody>
    <?php
    $sql = "SELECT * FROM users";
    if ($sql= mysqli_query($link, $sql)){
        foreach($sql as $sql1){
            echo "<tr>";
            echo "<td>" . $sql1["ID"] . "</td>";
            echo "<td>" . $sql1["NAME"] . "</td>";
            echo "<td>" . $sql1["SURNAME"] . "</td>";
            echo "<td>" . $sql1["MIDDLE_NAME"] . "</td>";
            echo "<td>" . $sql1["LOGIN"] . "</td>";
            echo "<td>" . $sql1["ACCESS"] . "</td>";
            echo "<td> <form method='POST' action='modification.php'>
                    <button type='submit' name='register' value=".$sql1["ID"].">Изменить</button>
                    </form>
                    </td>";
            echo "</tr>";
            echo "</tr>";
        }
    }


    ?>
    </tbody>
</table>

<?php
include '../inc/link.php';
include '../menu.php';
include '../inc/check_admin.php';


?>
<style>
    form {
        width: 450px;
        min-height: 500px;
        height: auto;
        border-radius: 5px;
        margin: 100px auto;
        box-shadow: 0 9px 50px hsla(0, 0%, 0%, 0.31);
        padding: 2%;

    }
    header {
        margin: 2% auto 10% auto;
        text-align: center;
    }
    header h2 {
        font-size: 250%;
        font-family: 'Playfair Display', serif;
        color: #3e403f;
    }
    header p {letter-spacing: 0.05em;}
    input[class="form-input"]{
        width: 240px;
        height: 50px;
        margin-top: 2%;
        padding: 15px;
        font-size: 16px;
        font-family: 'Abel', sans-serif;
        color: #5E6472;
        outline: none;
        border: none;
        border-radius: 0px 5px 5px 0px;
        transition: 0.2s linear;
    }
    input:focus {
        transform: translateX(-2px);
        border-radius: 5px;
    }
    button {
        display: grid;
        color: #000000;
        width: 280px;
        height: 50px;
        padding: 0 20px;
        background: #fff;
        border-radius: 5px;
        border-color: black;
        margin: 7% auto;
        align-items: center;
    }
    table {

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
<form method="POST" action="/admin/add_error.php">
    <div class="container">
        <h1>Добавление типов ошибок</h1>

        <hr>
        <h3>Тип ошибки</h3>
        <select name="PROBLEM" required="required">
            <option value="WMS">WMS</option>
            <option value="UPP">UPP</option>
            <option value="Роздница">Роздница</option>
            <option value="Техника">Техника</option>
        </select>

        <h3>Подробнее</h3>
        <input type="text" class="form-input"  placeholder="Конкретизация" name="CLARIFICATION" required>
        <h3>Путь картинки.</h3>
        <input type="text" class="form-input"  placeholder="Путь картинки" name="IMG" required>
        <hr>
        <button type="submit" name="add" value="1">Добавить</button>
    </div>


</form>
<?php

if (isset($_POST['add'])) {
        $sql="INSERT INTO problem_type (PROBLEM, CLARIFICATION, IMG ) 
                VALUES ('{$_POST['PROBLEM']}', '{$_POST['CLARIFICATION']}', '{$_POST['IMG']}')";
        if (mysqli_query($link, $sql)) {
            echo "Данные успешно добавлены";
        } else {
            echo "Ошибка: " . mysqli_error($link);
        }
}


?>



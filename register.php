<?php
include 'inc/link.php';
include 'menu.php';

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


</style>
<form method="POST" action="/register.php">
    <div class="container">
        <h1>Register</h1>
        <hr>
        <h2>Имя</h2>
            <input  class="form-input"  type="text" placeholder="Имя" name="NAME" required>
        <h2>Фамилия</h2>
            <input class="form-input"  type="text" placeholder="Фамилия" name="SURNAME" required>
        <h2>Отчество</h2>
            <input class="form-input"  type="text" placeholder="Отчество" name="MIDDLE_NAME" required>
        <h2>Логин</h2>
            <input class="form-input"  type="text" placeholder="Логин" name="LOGIN" required>
        <h2>Пароль</h2>
            <input  class="form-input"  type="password" placeholder="Enter Password" name="PASSWORD" required>
        <h2>Права пользователя</h2>
            <select name="ACCESS" required="required">
                <option value="2">Пользователь</option>
                <option value="3">Работник</option>
                <option value="1">Администратор</option>
            </select>
        <hr>
        <button type="submit" name="register" value="1">Регистрировать</button>
        <?php

        if (isset($_POST['register'])) {
            $sql = "SELECT * FROM users WHERE LOGIN = '{$_POST['LOGIN']}'";
            $sql = mysqli_query($link, $sql);
            if ((mysqli_num_rows($sql)==0)) {
                $_POST['PASSWORD'] = password_hash($_POST['PASSWORD'],PASSWORD_DEFAULT);
                $sql="INSERT INTO users (NAME, SURNAME, MIDDLE_NAME, LOGIN, ACCESS, PASSWORD ) 
                VALUES ('{$_POST['NAME']}', '{$_POST['SURNAME']}', '{$_POST['MIDDLE_NAME']}','{$_POST['LOGIN']}','{$_POST['ACCESS']}','{$_POST['PASSWORD']}')";
                if (mysqli_query($link, $sql)) {
                    echo "Данные успешно добавлены";
                } else {
                    echo "Ошибка: " . mysqli_error($link);
                }
            }else{
                echo "Такой логин существует.";
            }
        }
        ?>

    </div>


</form>



<?php
include 'inc/link.php';
session_start();


?>
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        background-attachment: fixed;
        background-repeat: no-repeat;
        font-family: 'Vibur', cursive;
        opacity: .95;
    }

    form {
        width: 450px;
        min-height: 500px;
        height: auto;
        border-radius: 5px;
        margin: 2% auto;
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
<div class="registration-cssave">
    <form method="POST" >
        <header class="head-form">
            <h2>Форма входа</h2>
        </header>
            <input class="form-input"  name="LOGIN" placeholder="Логин" required>
            <input class="form-input"  type="password" name="PASSWORD" placeholder="Пароль" required>
            <button class="" type="submit" name="LOG_IN">Вход в аккаунт</button>
        <?php
        if (isset($_POST['LOG_IN'])) {
            $sql = "SELECT * FROM users WHERE LOGIN = '{$_POST['LOGIN']}'";
            $sql = mysqli_query($link, $sql);
            if ((mysqli_num_rows($sql)==1)) {
                foreach ($sql as $sql1){
                    if (password_verify($_POST['PASSWORD'],$sql1['PASSWORD'])){
                        session_start();
                        $_SESSION['ID']=$sql1['ID'];
                        $_SESSION['NAME']=$sql1['NAME'];
                        $_SESSION['SURNAME']=$sql1['SURNAME'];
                        $_SESSION['MIDDLE_NAME']=$sql1['MIDDLE_NAME'];
                        $_SESSION['LOGIN']=$sql1['LOGIN'];
                        $_SESSION['ACCESS']=$sql1['ACCESS'];
                        header('Location: http://vkr/user/tech.php');
                    }
                    else{
                        echo "Неверный логин или пароль";
                    }
                }
            } else {
                echo "Неверный логин или пароль";
            }
        }
        ?>
    </form>

</div>




<style>
    *, *:before, *:after{
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        padding: 0;
        margin: 0;
        font-family: 'Lato', sans-serif;
    }
    nav{
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background: #fff;
        box-shadow: 0 3px 10px -2px rgba(0,0,0,.1);
        border: 1px solid rgba(0,0,0,.1);
    }
    nav ul{
        list-style: none;
        position: relative;
        float: right;
        margin-right: 100px;
        display: inline-table;
    }
    nav ul li{
        float: left;
        -webkit-transition: all .2s ease-in-out;
        -moz-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;
    }

    nav ul li:hover{background: rgba(0,0,0,.15);}
    nav ul li:hover > ul{display: block;}
    nav ul li{
        float: left;
        -webkit-transition: all .2s ease-in-out;
        -moz-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;
    }
    nav ul li a{
        display: block;
        padding: 30px 20px;
        color: #222;
        font-size: .9em;
        letter-spacing: 1px;
        text-decoration: none;
        text-transform: uppercase;
    }
    nav ul ul{
        display: none;
        background: #fff;
        position: absolute;
        top: 100%;
        box-shadow: -3px 3px 10px -2px rgba(0,0,0,.1);
        border: 1px solid rgba(0,0,0,.1);
    }
    nav ul ul li{float: none; position: relative;}
    nav ul ul li a {
        padding: 15px 30px;
        border-bottom: 1px solid rgba(0,0,0,.05);
    }
    nav ul ul ul {
        position: absolute;
        left: 100%;
        top:0;
    }
</style>
<nav>
    <ul>
        <li><a href="http://vkr/user/Error_WMS.php">Ошибки WMS</a></li>
        <li><a href="http://vkr/user/Error_UPP.php">Ошибки UPP</a></li>
        <li><a href="http://vkr/user/Error_Retail.php">Ошибки Роздница</a></li>
        <li><a href="http://vkr/user/tech.php">Проблемы с техникой</a></li>
        <?php if ($_SESSION['ACCESS']>2){?> <li><a href="http://vkr/register.php">Регистрация</a></li><?}?>
        <?php if ($_SESSION['ACCESS']>1){?> <li><a href="http://vkr/support/problem.php">Заявки</a></li><?}?>
        <?php if ($_SESSION['ACCESS']>2){?> <li><a href="http://vkr/admin/users.php">Пользователи</a></li><?}?>
        <li><a href="http://vkr/admin/add_error.php">Добавление новых заявок</a></li>
        <li><a href="http://vkr/index.php">Выход</a></li>
    </ul>
</nav>
<?php

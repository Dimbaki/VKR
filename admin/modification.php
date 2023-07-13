<?php
include '../inc/link.php';
include '../menu.php';
include '../inc/check_admin.php';

$sql = "SELECT * FROM users";

if ($sql= mysqli_query($link, $sql)){
    foreach($sql as $sql1){
        if($_POST['register']==$sql1["ID"]){
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
    <form method='POST' >
    <table >
        <tr>
            <td>ID:</td>
            <td><input class="form-input" type="text" name="ID" value="<?=$sql1["ID"]?>" readonly> </td>
        </tr>
        <tr>
            <td>Имя:</td>
            <td><input class="form-input" type="text" name="NAME" value="<?=$sql1["NAME"]?>"></td>
        </tr>
        <tr>
            <td>Фамилия:</td>
            <td><input class="form-input" type="text" name="SURNAME" value="<?=$sql1["SURNAME"]?>"></td>
        </tr>
        <tr>
            <td>Отчество:</td>
            <td><input class="form-input" type="text" name="MIDDLE_NAME" value="<?=$sql1["MIDDLE_NAME"]?>"></td>
        </tr>
        <tr>
            <td>Логин:</td>
            <td><input class="form-input" type="text" name="LOGIN"  value="<?=$sql1["LOGIN"]?>"></td>
        </tr>
        <tr>
            <td>Новый пароль:</td>
            <td><input class="form-input" placeholder="Введите новый пароль"  type="text" name="PASSWORD">
                <br>
                <button type='submit' name='password' value='password'>Изменить пароль</button>
            </td>
        </tr>
        <tr>
            <td>Права:</td>
            <td>
                <select name="ACCESS" >
                    <option value="1" <? if ($sql1["ACCESS"]=1){?>selected<?}?>>Администратор</option>
                    <option value="2" <? if ($sql1["ACCESS"]=2){?>selected<?}?>>Пользователь</option>
                    <option value="3" <? if ($sql1["ACCESS"]=3){?>selected<?}?>>Работник</option>
                </select>
            </td>
        </tr>
    </table>
        <button type='submit' name='back' value='back'>Назад</button>
        <button type='submit' name='change' value='change'>Изменить</button>
        <button type='submit' name='delete' value='delete'>Удалить</button>
    </form>
    <table border="1">
        <?php
        }
    }
}

if(isset($_POST['change'])){
    $sql="UPDATE users SET NAME = '{$_POST['NAME']}', SURNAME='{$_POST['SURNAME']}', MIDDLE_NAME='{$_POST['MIDDLE_NAME']}', ACCESS='{$_POST['ACCESS']}', LOGIN='{$_POST['LOGIN']}'
                WHERE ID='{$_POST['ID']}'";
    if(mysqli_query($link, $sql)){
        echo "Данные успешно редактированы";
        header('Location: http://vkr/admin/users.php');
    } else{
        echo "Ошибка: " . mysqli_error($link);
    }
}
if(isset($_POST['password'])){
    $_POST['PASSWORD'] = password_hash($_POST['PASSWORD'],PASSWORD_DEFAULT);
    $sql="UPDATE users SET PASSWORD ='{$_POST['PASSWORD']}'
                  WHERE ID='{$_POST['ID']}'";
    if(mysqli_query($link, $sql)){

        echo "Данные успешно редактированы";
        header('Location: http://vkr/admin/users.php');
    } else{
        echo "Ошибка: " . mysqli_error($link);
    }
}
if(isset($_POST['delete'])){
    $sql = "DELETE FROM users WHERE ID ='{$_POST['ID']}'";
    if(mysqli_query($link, $sql)){
        echo "Данные успешно редактированы";
        header('Location: http://vkr/admin/users.php');
    } else{
        echo "Ошибка: " . mysqli_error($link);
    }
}
if(isset($_POST['back'])){
    header('Location: http://vkr/admin/users.php');
}


    ?>

</table>

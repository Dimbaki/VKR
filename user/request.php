<?php
include '../inc/link.php';
include '../menu.php';
if ($_POST['add_tex']) {
    $_SESSION['ID_PROBLEM']=$_POST['add_tex'];
}


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
<form method="POST" action="request.php" enctype="multipart/form-data">
    Комментарий : <textarea name="COMMENT"></textarea>
    Название ПК : <input class="form-input"  type="text" placeholder="Название ПК" name="ID_PC" >
    Скриншот : <input type="file" name="img" accept=".jpg, .jpeg, .png">
        <button type="submit" name="add" value="">Отправить</button>
    <?php
    var_dump($_POST);
    var_dump($_SESSION);

    if (isset($_POST['add'])) {
        $path = '../user/img/';
        $time= date("Y-m-d H:i:s");
        if($_FILES['img']['size']>0) {
            $ext = array_pop(explode('.', $_FILES['img']['name']));
            $new_name = time() . '.' . $ext;
            $full_path = $path . $new_name;
            if ($_FILES['img']['error'] == 0) {
                if (move_uploaded_file($_FILES['img']['tmp_name'], $full_path)) {
                    $sql="INSERT INTO problem (ID_USERS, PROBLEM_TYPE, COMMENT, ID_PC, IMG, TIME)
                VALUES ('{$_SESSION['ID']}', '{$_SESSION['ID_PROBLEM']}', '{$_POST['COMMENT']}','{$_POST['ID_PC']}','{$full_path}','{$time}')";
                    if (mysqli_query($link, $sql)) {
                        echo "Данные успешно добавлены";
                        $_SESSION['ID_PROBLEM']=NULL;
                    } else {
                        echo "Ошибка: " . mysqli_error($link);
                    }
                }
            }
        }
        else{
            $sql="INSERT INTO problem (ID_USERS, PROBLEM_TYPE, COMMENT, ID_PC, TIME)
                VALUES ('{$_SESSION['ID']}', '{$_SESSION['ID_PROBLEM']}', '{$_POST['COMMENT']}','{$_POST['ID_PC']}','{$time}')";
            if (mysqli_query($link, $sql)) {
                echo "Данные успешно добавлены";
                $_SESSION['ID_PROBLEM']=NULL;
            } else {
                echo "Ошибка: " . mysqli_error($link);
            }
        }
    }
    ?>
</form>

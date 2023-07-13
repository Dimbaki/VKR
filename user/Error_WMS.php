<?php
include '../inc/link.php';
include '../menu.php';

?>
<style>
    .container{
        margin-top: 4%;
        display: grid;
        margin-left: 100px;
        margin-right: 100px;
    }
    .flex-box{
        display: flex;
        margin-top: 15px;
        width: auto;
        height: 500px;
        box-shadow: 0 9px 50px hsla(0, 0%, 0%, 0.31);
    }
    .flex-box img{
        width: 400px;
        height: 400px;
        margin: 10px;
    }
    .flex-item{
        display: grid;
        width: 100%;
        text-align: center;
        align-items: center;
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
        margin: auto;
        align-items: center;
    }
</style>
<div class="container">
    <?php
    $sql = "SELECT * FROM problem_type";
    if ($sql= mysqli_query($link, $sql)){
        foreach ($sql as $sql1){
            if($sql1["PROBLEM"]=="WMS"){
                ?>
                <form method="post" action="request.php" >
                    <div class="flex-box">
                        <div class="flex-item"><img src="<?=$sql1["IMG"]?> "></div>
                        <div class="flex-item"><h3><?=$sql1["CLARIFICATION"]?></h3></div>
                        <div class="flex-item"> <button type="submit" name="add_tex" value="<?=$sql1['ID']?>">Добавить</button></div>
                    </div>
                </form>

            <?php }}}
    if (isset($_POST['add_tex"'])) {
        $_SESSION['ID_PROBLEM']=$_POST['add_tex'];
    }
    ?>
</div>

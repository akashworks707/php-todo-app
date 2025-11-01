<?php
    include "../config/database.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "DELETE FROM tasks WHERE id=$id";
        $result = mysqli_query($con, $sql);

        if($result){
            header("location:list.php");
        }
    }
?>
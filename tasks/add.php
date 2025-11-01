<?php
    include "../config/database.php";

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $title = $_POST['title'];
        $desc = $_POST['description'];

        $sql = "INSERT INTO `tasks` (title, description) values('$title', '$desc')";
        $result = mysqli_query($con, $sql);

        if($result){
            header("location: list.php");
        }
    }
?>

<?php include('../includes/header.php'); ?>

<h2>Add New Task</h2>
<form method="POST">
    <label>Task Title:</label><br>
    <input type="text" name="title" required><br><br>

    <label>Description:</label><br>
    <textarea name="description"></textarea><br><br>

    <button type="submit">Add Task</button>
</form>

<?php include('../includes/footer.php'); ?>
<?php
include('../config/database.php');
$id = $_GET['id'];
$result = mysqli_query($con, "SELECT * FROM tasks WHERE id=$id");
$task = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $status = isset($_POST['is_completed']) ? 1 : 0;

    $query = "UPDATE tasks SET title='$title', description='$desc', is_completed=$status WHERE id=$id";
    mysqli_query($con, $query);

    header('Location: list.php');
}
?>

<?php include('../includes/header.php'); ?>

<h2>Edit Task</h2>
<form method="POST">
    <label>Task Title:</label><br>
    <input type="text" name="title" value="<?= htmlspecialchars($task['title']) ?>" required><br><br>

    <label>Description:</label><br>
    <textarea name="description"><?= htmlspecialchars($task['description']) ?></textarea><br><br>

    <label>
        <input type="checkbox" name="is_completed" <?= $task['is_completed'] ? 'checked' : '' ?>> Mark as Completed
    </label><br><br>
    <button type="submit">Update Task</button>
</form>

<?php include('../includes/footer.php'); ?>

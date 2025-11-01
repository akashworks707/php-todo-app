<?php
    include "../config/database.php";

    $sql = "SELECT * FROM tasks ORDER BY id DESC";
    $result = mysqli_query($con, $sql);
?>

<?php include('../includes/header.php'); ?>

<h2>All Tasks</h2>
<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['title']) ?></td>
            <td><?= htmlspecialchars($row['description']) ?></td>
            <td><?= $row['is_completed'] ? '✅ Done' : '❌ Pending' ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> | 
                <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this task?')">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

<?php include('../includes/footer.php'); ?>
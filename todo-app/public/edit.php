<?php
include '../includes/db_config.php';
include '../includes/todo-functions.php';

// Mengambil ID tugas yang akan diedit
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $task = getTaskById($id);
}

// Menangani pembaruan tugas
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['task'])) {
    $task_name = $_POST['task'];
    updateTask($id, $task_name); // Memperbarui tugas di database
    header("Location: index.php"); // Kembali ke halaman utama setelah berhasil diperbarui
}

// Fungsi untuk mendapatkan tugas berdasarkan ID
function getTaskById($id) {
    global $conn;
    $query = "SELECT * FROM todo_list WHERE id = $id";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="edit-container">
        <h1>Edit Task</h1>

        <form method="POST" action="edit.php?id=<?php echo $task['id']; ?>">
            <input type="text" name="task" value="<?php echo htmlspecialchars($task['task']); ?>" required>
            <button type="submit">Update Task</button>
        </form>

        <div class="cancel-btn">
            <a href="index.php">Cancel</a>
        </div>
    </div>
</body>
</html>

<?php
include '../includes/db_config.php';
include '../includes/todo-functions.php';

// Menangani penambahan tugas
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['task'])) {
    $task = $_POST['task'];
    addTask($task); // Menambahkan tugas ke database
    echo "<script type='text/javascript'>alert('Task added successfully!');</script>";
}

// Mengambil semua tugas
$tasks = getTasks();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>To-Do List</h1>

        <!-- Form untuk menambah tugas -->
        <div class="task-form">
            <form method="POST" action="index.php">
                <input type="text" name="task" placeholder="Tambah tugas baru" required>
                <button type="submit">Tambah Tugas</button>
            </form>
        </div>

        <!-- Kolom untuk tugas yang sudah dimasukkan -->
        <div class="task-list">
            <h2>Tugas yang sudah dimasukkan:</h2>
            <?php if (count($tasks) > 0): ?>
                <ul>
                    <?php foreach ($tasks as $task): ?>
                        <li>
                            <strong><?php echo htmlspecialchars($task['task']); ?></strong>
                            <div class="task-actions">
                                <!-- Tombol Edit (akan membuka form edit pada halaman berbeda) -->
                                <a href="edit.php?id=<?php echo $task['id']; ?>" class="edit-btn">Edit</a>
                                
                                <!-- Link untuk menghapus tugas -->
                                <a href="delete.php?id=<?php echo $task['id']; ?>" class="delete-btn">Delete</a>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Tidak ada tugas yang dimasukkan.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="footer">
        <p>Created By: Duwi Mulyanto</p>
    </footer>
</body>
</html>

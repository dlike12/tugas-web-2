<?php
include 'db_config.php';

// Fungsi untuk menambah tugas
function addTask($task) {
    global $conn;
    $sql = "INSERT INTO todo_list (task) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $task);

    if ($stmt->execute()) {
        return "Task added successfully!";
    } else {
        return "Error: " . $stmt->error;
    }
}

// Fungsi untuk mengambil semua tugas
function getTasks() {
    global $conn;
    $sql = "SELECT * FROM todo_list ORDER BY created_at DESC";
    $result = $conn->query($sql);

    $tasks = [];
    while ($row = $result->fetch_assoc()) {
        $tasks[] = $row;
    }

    return $tasks;
}

// Fungsi untuk memperbarui tugas
function updateTask($id, $task) {
    global $conn;
    $sql = "UPDATE todo_list SET task = ?, updated_at = CURRENT_TIMESTAMP WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $task, $id);

    if ($stmt->execute()) {
        return "Task updated successfully!";
    } else {
        return "Error: " . $stmt->error;
    }
}

// Fungsi untuk menghapus tugas
function deleteTask($id) {
    global $conn;
    $sql = "DELETE FROM todo_list WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        return "Task deleted successfully!";
    } else {
        return "Error: " . $stmt->error;
    }
}
?>

<?php
// Menyertakan file konfigurasi dan fungsi CRUD
include '../includes/db_config.php';
include '../includes/todo-functions.php';

// Menangani permintaan GET (untuk mengambil tugas)
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    header('Content-Type: application/json');
    $tasks = getTasks();
    echo json_encode($tasks);
}

// Menangani permintaan POST (untuk menambah tugas)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    if (isset($data['task'])) {
        echo json_encode(['message' => addTask($data['task'])]);
    } else {
        echo json_encode(['message' => 'Task is required']);
    }
}

// Menangani permintaan PUT (untuk memperbarui tugas)
if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $data = json_decode(file_get_contents("php://input"), true);
    if (isset($data['id']) && isset($data['task'])) {
        echo json_encode(['message' => updateTask($data['id'], $data['task'])]);
    } else {
        echo json_encode(['message' => 'ID and task are required']);
    }
}

// Menangani permintaan DELETE (untuk menghapus tugas)
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $data = json_decode(file_get_contents("php://input"), true);
    if (isset($data['id'])) {
        echo json_encode(['message' => deleteTask($data['id'])]);
    } else {
        echo json_encode(['message' => 'ID is required']);
    }
}
?>

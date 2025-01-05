<?php
include '../includes/db_config.php';
include '../includes/todo-functions.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteTask($id);
    header("Location: index.php");
    exit();
}
?>

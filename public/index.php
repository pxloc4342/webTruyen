<?php
require_once '../config/config.php';
require_once '../controllers/StoryController.php';

$controller = new StoryController($pdo); // <-- phải truyền $pdo vào đây

$page = $_GET['page'] ?? 1;
$search = $_GET['search'] ?? '';
$id = $_GET['id'] ?? null;
$so_chuong = $_GET['chuong'] ?? null;

if ($id && $so_chuong) {
    $controller->read($id, $so_chuong);
} elseif ($id) {
    $controller->detail($id);
} else {
    $controller->index($page, $search);
}
?>
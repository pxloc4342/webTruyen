<?php
$host = 'localhost';
$db   = 'webtruyen';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Helper function để xử lý đường dẫn tài nguyên
function asset($path) {
    // Xác định base URL dựa trên môi trường
    $baseUrl = '';
    
    // Nếu đang chạy qua XAMPP (localhost/webTruyen/public/)
    if (strpos($_SERVER['REQUEST_URI'], '/webTruyen/') !== false) {
        $baseUrl = '/webTruyen/public/';
    }
    // Nếu đang chạy qua VS Code PHP Server hoặc localhost trực tiếp
    else {
        $baseUrl = '/';
    }
    
    return $baseUrl . $path;
}
?>
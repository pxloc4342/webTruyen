<?php
session_start();
// Khởi tạo dữ liệu truyện mẫu nếu chưa có trong session
if (!isset($_SESSION['stories'])) {
    $_SESSION['stories'] = [
        ["id" => 1, "ten" => "Truyện A", "tacgia" => "Tác giả A", "anh" => "public/assets/uploads/truyen_a.jpg"],
        ["id" => 2, "ten" => "Truyện B", "tacgia" => "Tác giả B", "anh" => "public/assets/uploads/truyen_b.jpg"],
    ];
}
$stories = $_SESSION['stories'];

// Xử lý đăng nhập
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username === 'admin' && $password === 'admin123') {
        $_SESSION['admin'] = true;
        header('Location: admin.php');
        exit;
    } else {
        $error = 'Sai tài khoản hoặc mật khẩu!';
    }
}

// Xử lý đăng xuất
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_destroy();
    header('Location: admin.php');
    exit;
}

// Xử lý xoá truyện (giả lập)
if (isset($_GET['action']) && $_GET['action'] === 'delete_story' && isset($_GET['id'])) {
    // Ở đây chỉ giả lập, thực tế sẽ xoá trong CSDL
    $stories = array_filter($stories, function($story) {
        return $story['id'] != $_GET['id'];
    });
    $msg = 'Đã xoá truyện (giả lập)!';
}

// Xử lý thêm truyện mới (giả lập)
if (isset($_GET['action']) && $_GET['action'] === 'add_story' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $ten = $_POST['ten'];
    $tacgia = $_POST['tacgia'];
    $mota = $_POST['mota'];
    // Xử lý upload ảnh (giả lập)
    $anh = "public/assets/uploads/default.jpg";
    if (isset($_FILES['anh']) && $_FILES['anh']['error'] == 0) {
        $anh = "public/assets/uploads/" . basename($_FILES['anh']['name']);
        move_uploaded_file($_FILES['anh']['tmp_name'], $anh);
    }
    $new_id = count($stories) ? max(array_column($stories, 'id')) + 1 : 1;
    $stories[] = [
        "id" => $new_id,
        "ten" => $ten,
        "tacgia" => $tacgia,
        "anh" => $anh
    ];
    $_SESSION['stories'] = $stories;
    header("Location: admin.php?action=list_story");
    exit;
}

// Kiểm tra đăng nhập
if (!isset($_SESSION['admin'])) {
    // Hiển thị form đăng nhập
    ?>
    <!DOCTYPE html>
    <html lang="vi">
    <head>
      <meta charset="UTF-8">
      <title>Đăng nhập Admin</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="/public/assets/css/admin.css">
    </head>
    <body>
      <div class="admin-login-container">
        <form method="post" class="admin-login-form">
          <h2>Đăng nhập Admin</h2>
          <input type="text" name="username" placeholder="Tên đăng nhập" required>
          <input type="password" name="password" placeholder="Mật khẩu" required>
          <button type="submit">Đăng nhập</button>
          <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
        </form>
      </div>
    </body>
    </html>
    <?php
    exit;
}

// Hiển thị dashboard hoặc các chức năng khác
$action = $_GET['action'] ?? 'dashboard';

?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>TRUYỆN VN - Đọc truyện miễn phí</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/public/assets/css/main.css">
</head>
<body>
  <!-- Header -->
  <header class="header">
    <div class="logo"><img src="/public/assets/img/logo.png" alt="TRUYỆN VN"> TRUYỆN VN</div>
    <form class="search-bar" method="get" action="index.php">
      <input type="text" name="search" placeholder="Tìm truyện...">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
    <div class="user-menu">
      <a href="#"><i class="fa fa-user"></i> Tài khoản</a>
    </div>
  </header>

  <!-- Menu -->
  <nav class="main-menu">
    <a href="#"><i class="fa fa-home"></i></a>
    <a href="#">Thể loại</a>
    <a href="#">Xếp hạng</a>
    <a href="#">Truyện chữ</a>
    <a href="#">Phân loại theo chương</a>
  </nav>

  <!-- Slider truyện hot -->
  <section class="slider">
    <h2>Truyện Hot</h2>
    <div class="slider-list">
      <?php foreach ($stories as $story): ?>
        <div class="slider-item">
          <img src="/<?= $story['anh'] ?>" alt="<?= $story['ten'] ?>">
          <div class="slider-title"><?= $story['ten'] ?></div>
        </div>
      <?php endforeach; ?>
      <!-- Thêm nút chuyển trái/phải nếu muốn -->
    </div>
  </section>

  <!-- Danh sách truyện chữ -->
  <section class="story-list">
    <h2>Truyện Chữ</h2>
    <div class="story-grid">
      <?php foreach ($stories as $story): ?>
        <div class="story-card">
          <img src="/<?= $story['anh'] ?>" alt="<?= $story['ten'] ?>">
          <div class="story-title"><?= $story['ten'] ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- Bảng xếp hạng -->
  <aside class="ranking">
    <h2>Bảng Xếp Hạng</h2>
    <ul>
      <?php foreach ($stories as $i => $story): ?>
        <li>
          <span><?= str_pad($i+1, 2, '0', STR_PAD_LEFT) ?></span>
          <img src="/<?= $story['anh'] ?>" alt="">
          <span><?= $story['ten'] ?></span>
        </li>
      <?php endforeach; ?>
    </ul>
  </aside>

  <!-- Truyện mới cập nhật -->
  <section class="story-new">
    <div class="header1">
      <h2>Truyện Mới Cập Nhật</h2>
      <a href="#" class="view-all">Xem Tất Cả</a>
    </div>
    <div class="story-grid">
      <?php foreach ($stories as $story): ?>
        <div class="story-card">
          <img src="/<?= $story['anh'] ?>" alt="<?= $story['ten'] ?>">
          <div class="story-title"><?= $story['ten'] ?></div>
        </div>
      <?php endforeach; ?>
    </div>
    <!-- Phân trang -->
    <div class="pagination">
      <a href="#">&laquo;</a>
      <a href="#" class="active">1</a>
      <a href="#">2</a>
      <a href="#">3</a>
      <a href="#">&raquo;</a>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="footer-left">
      <h2>Liên hệ đặt quảng cáo</h2>
      <p>Email: loc1tulem2@gmail.com</p>
      <p>Copyright © 2024 TruyenVN</p>
      <h3>Miễn trừ trách nhiệm</h3>
      <p>Trang web của chúng tôi chỉ cung cấp dịch vụ đọc truyện tranh online với mục đích giải trí...</p>
    </div>
    <div class="footer-tags">
      <span>Truyện Hot</span>
      <span>Truyện cổ tích Việt Nam</span>
      <span>Truyện chữ</span>
      <!-- ... -->
    </div>
  </footer>
</body>
</html>
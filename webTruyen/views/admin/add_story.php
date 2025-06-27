<!-- views/admin/add_story.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Thêm truyện</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/public/assets/css/admin.css">
</head>
<body>
  <div class="admin-dashboard">
    <nav>
      <a href="admin.php?action=list_story">Quản lý truyện</a>
      <a href="admin.php?action=dashboard">Dashboard</a>
      <a href="admin.php?action=logout">Đăng xuất</a>
    </nav>
    <main>
      <h2>Thêm truyện mới</h2>
      <form method="post" enctype="multipart/form-data">
        <input type="text" name="ten" placeholder="Tên truyện" required>
        <input type="text" name="tacgia" placeholder="Tác giả">
        <textarea name="mota" placeholder="Mô tả truyện"></textarea>
        <input type="file" name="anh" accept="image/*" required>
        <button type="submit">Thêm truyện</button>
        <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
      </form>
    </main>
  </div>
</body>
</html>
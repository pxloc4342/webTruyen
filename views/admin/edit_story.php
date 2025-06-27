<!-- views/admin/edit_story.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Sửa truyện</title>
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
      <h2>Sửa truyện</h2>
      <form method="post" enctype="multipart/form-data">
        <input type="text" name="ten" value="<?= htmlspecialchars($story['ten']) ?>" required>
        <input type="text" name="tacgia" value="<?= htmlspecialchars($story['tacgia']) ?>">
        <textarea name="mota"><?= htmlspecialchars($story['mota']) ?></textarea>
        <img src="/<?= $story['anh'] ?>" alt="" style="height:80px"><br>
        <input type="file" name="anh" accept="image/*">
        <button type="submit">Cập nhật</button>
        <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
      </form>
    </main>
  </div>
</body>
</html>
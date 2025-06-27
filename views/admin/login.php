<!-- views/admin/login.php -->
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
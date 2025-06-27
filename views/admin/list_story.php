<!-- views/admin/list_story.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Quản lý truyện</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/public/assets/css/admin.css">
</head>
<body>
  <div class="admin-dashboard">
    <nav>
      <a href="admin.php?action=dashboard">Dashboard</a>
      <a href="admin.php?action=add_story">Thêm truyện</a>
      <a href="admin.php?action=logout">Đăng xuất</a>
    </nav>
    <main>
      <h2>Danh sách truyện</h2>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Ảnh</th>
            <th>Tên truyện</th>
            <th>Tác giả</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($stories as $story): ?>
            <tr>
              <td><?= $story['id'] ?></td>
              <td><img src="/<?= $story['anh'] ?>" alt="" style="height:50px"></td>
              <td><?= htmlspecialchars($story['ten']) ?></td>
              <td><?= htmlspecialchars($story['tacgia']) ?></td>
              <td>
                <a href="admin.php?action=edit_story&id=<?= $story['id'] ?>">Sửa</a> |
                <a href="admin.php?action=delete_story&id=<?= $story['id'] ?>" onclick="return confirm('Xoá truyện này?')">Xoá</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </main>
  </div>
</body>
</html>
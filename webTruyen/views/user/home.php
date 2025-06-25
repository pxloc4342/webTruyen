<!-- views/user/home.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang chủ</title>
  <link rel="stylesheet" href="/public/assets/css/main.css">
  <link rel="stylesheet" href="/public/assets/css/3_slide.css">
  <link rel="stylesheet" href="/public/assets/css/base.css">
  <link rel="stylesheet" href="/public/assets/css/DkDn.css">
  <link rel="stylesheet" href="/public/assets/css/ket.css">
  <link rel="stylesheet" href="/public/assets/css/menu_dacap.css">
  <link rel="stylesheet" href="/public/assets/css/truyenChu.css">
  <link rel="stylesheet" href="/public/assets/css/truyenMoiCapNhat.css">
  <link rel="stylesheet" href="/public/assets/css/cheDoToi.css">
  <link rel="stylesheet" href="/public/assets/fonts/fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/css/all.css">
</head>
<body>
  <div class="app">
    <!-- Menu và header giữ nguyên phần HTML gốc của bạn ở đây -->

    <nav class="web-truyen">
      <div class="container">
        <div class="story-list">
          <h2>Truyện Chữ</h2>
          <div class="stories">
            <?php foreach ($stories as $story): ?>
              <div class="story">
                <a href="detail.php?id=<?= $story['id'] ?>">
                  <img src="/<?= $story['anh'] ?>" alt="<?= $story['ten'] ?>" class="story-image">
                  <p class="story-title"><?= $story['ten'] ?></p>
                </a>
              </div>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="ranking">
          <h2>Bảng Xếp Hạng</h2>
          <div class="ranking-tabs">
            <div class="ranking-tab active" data-tab="month">Top Tháng</div>
            <div class="ranking-tab" data-tab="week">Top Tuần</div>
            <div class="ranking-tab" data-tab="day">Top Ngày</div>
          </div>

          <!-- Top Tháng -->
          <ul class="ranking-list active" id="month">
            <?php foreach ($stories as $index => $story): ?>
              <li class="ranking-item">
                <span class="ranking-number">0<?= $index + 1 ?></span>
                <a href="detail.php?id=<?= $story['id'] ?>">
                  <div class="ranking-image">
                    <img src="/<?= $story['anh'] ?>" alt="<?= $story['ten'] ?>">
                  </div>
                  <div class="ranking-details">
                    <p class="ranking-title"><?= $story['ten'] ?> (Tháng)</p>
                    <p class="ranking-chapters"><?= rand(10, 30) ?> Chapters</p>
                  </div>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>

          <!-- Top Tuần -->
          <ul class="ranking-list" id="week">
            <?php foreach ($stories as $index => $story): ?>
              <li class="ranking-item">
                <span class="ranking-number">0<?= $index + 1 ?></span>
                <a href="detail.php?id=<?= $story['id'] ?>">
                  <div class="ranking-image">
                    <img src="/<?= $story['anh'] ?>" alt="<?= $story['ten'] ?>">
                  </div>
                  <div class="ranking-details">
                    <p class="ranking-title"><?= $story['ten'] ?> (Tuần)</p>
                    <p class="ranking-chapters"><?= rand(5, 20) ?> Chapters</p>
                  </div>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>

          <!-- Top Ngày -->
          <ul class="ranking-list" id="day">
            <?php foreach ($stories as $index => $story): ?>
              <li class="ranking-item">
                <span class="ranking-number">0<?= $index + 1 ?></span>
                <a href="detail.php?id=<?= $story['id'] ?>">
                  <div class="ranking-image">
                    <img src="/<?= $story['anh'] ?>" alt="<?= $story['ten'] ?>">
                  </div>
                  <div class="ranking-details">
                    <p class="ranking-title"><?= $story['ten'] ?> (Ngày)</p>
                    <p class="ranking-chapters"><?= rand(3, 10) ?> Chapters</p>
                  </div>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>

        <script>
          const tabs = document.querySelectorAll('.ranking-tab');
          const lists = document.querySelectorAll('.ranking-list');

          tabs.forEach(tab => {
            tab.addEventListener('click', () => {
              tabs.forEach(t => t.classList.remove('active'));
              lists.forEach(list => list.classList.remove('active'));
              tab.classList.add('active');
              const tabId = tab.getAttribute('data-tab');
              document.getElementById(tabId).classList.add('active');
            });
          });
        </script>

        <div class="container1">
          <div class="header1">
            <h2>Truyện Mới Cập Nhật</h2>
            <a href="./trang1.html" class="view-all">Xem Tất Cả</a>
          </div>
          <div class="grid1">
            <?php foreach ($stories as $story): ?>
              <div class="story1">
                <a href="detail.php?id=<?= $story['id'] ?>">
                  <img src="/<?= $story['anh'] ?>" alt="<?= $story['ten'] ?>">
                  <p class="story-title1"><?= $story['ten'] ?> <br> Chương <?= rand(1, 15) ?></p>
                </a>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </nav>

    <!-- Footer giữ nguyên của bạn -->
  </div>
</body>
</html>

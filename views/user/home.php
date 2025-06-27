<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Truyện Hay - Đọc truyện miễn phí</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="<?php echo asset('assets/css/home-modern.css'); ?>">
</head>
<body>
  <header class="main-header">
    <div class="container header-flex" style="justify-content: space-between; align-items: center;">
      <div class="logo"><i class="fas fa-book-open"></i> <span>Truyện Hay</span></div>
      <form class="search-bar" method="get" action="index.php">
        <input type="text" name="search" placeholder="Tìm truyện...">
        <button type="submit"><i class="fas fa-search"></i></button>
      </form>
      <nav class="main-nav">
        <a href="#">Thể loạii</a>
        <a href="#">Xếp hạng</a>
        <a href="#">Truyện mới</a>
        <a href="#"><i class="fas fa-user"></i> Tài khoản</a>
      </nav>
    </div>
  </header>

  <section class="slider-section">
    <h2>Truyện Hot</h2>
    <div class="slider">
      <button class="slider-btn left" onclick="moveSlider(-1)"><i class="fas fa-chevron-left"></i></button>
      <div class="slider-container">
        <div class="slider-list" id="sliderList">
          <!-- 10 truyện hot -->
          <div class="slider-item">
            <img src="<?php echo asset('assets/img/1.jpg'); ?>" alt="Truyện 1">
            <div class="slider-title">Nhật ký trong tù</div>
          </div>
          <div class="slider-item">
            <img src="<?php echo asset('assets/img/2.jpg'); ?>" alt="Truyện 2">
            <div class="slider-title">Tấm Cám</div>
          </div>
          <div class="slider-item">
            <img src="<?php echo asset('assets/img/3.jpg'); ?>" alt="Truyện 3">
            <div class="slider-title">Vợ nhặt</div>
          </div>
          <div class="slider-item">
            <img src="<?php echo asset('assets/img/1.jpg'); ?>" alt="Truyện 4">
            <div class="slider-title">Truyện Kiều</div>
          </div>
          <div class="slider-item">
            <img src="<?php echo asset('assets/img/2.jpg'); ?>" alt="Truyện 5">
            <div class="slider-title">Chí Phèo</div>
          </div>
          <div class="slider-item">
            <img src="<?php echo asset('assets/img/3.jpg'); ?>" alt="Truyện 6">
            <div class="slider-title">Số đỏ</div>
          </div>
          <div class="slider-item">
            <img src="<?php echo asset('assets/img/1.jpg'); ?>" alt="Truyện 7">
            <div class="slider-title">Lão Hạc</div>
          </div>
          <div class="slider-item">
            <img src="<?php echo asset('assets/img/2.jpg'); ?>" alt="Truyện 8">
            <div class="slider-title">Cô bé bán diêm</div>
          </div>
          <div class="slider-item">
            <img src="<?php echo asset('assets/img/3.jpg'); ?>" alt="Truyện 9">
            <div class="slider-title">Dế Mèn phiêu lưu ký</div>
          </div>
          <div class="slider-item">
            <img src="<?php echo asset('assets/img/1.jpg'); ?>" alt="Truyện 10">
            <div class="slider-title">Đất rừng phương Nam</div>
          </div>
        </div>
      </div>
      <button class="slider-btn right" onclick="moveSlider(1)"><i class="fas fa-chevron-right"></i></button>
    </div>
  </section>

  <main class="container main-content">
    <section class="story-list-section">
      <h2>Truyện Mới Cập Nhật</h2>
      <div class="story-grid">
        <!-- Lặp PHP để render truyện mới -->
        <div class="story-card">
          <img src="<?php echo asset('assets/img/2.jpg'); ?>" alt="Truyện 2">
          <div class="story-info">
            <h3 class="story-title">Tấm Cám</h3>
            <div class="story-meta">Tác giả: <span>Việt Nam</span> | 20 chương</div>
          </div>
        </div>
        <!-- ... -->
      </div>
    </section>
    <aside class="ranking-section">
      <h2>Bảng Xếp Hạng</h2>
      <ol class="ranking-list">
        <li>
          <img src="<?php echo asset('assets/img/3.jpg'); ?>" alt="Truyện 3">
          <span>Vợ nhặt</span>
        </li>
        <!-- ... -->
      </ol>
    </aside>
  </main>

  <footer class="main-footer">
    <div class="container">
      <div class="footer-left">
        <h3>Liên hệ</h3>
        <p>Email: contact@truyenhay.vn</p>
        <p>© 2024 TruyenHay.vn</p>
      </div>
      <div class="footer-tags">
        <span>Truyện Hot</span>
        <span>Truyện Ngắn</span>
        <span>Tiểu Thuyết</span>
        <span>Truyện Cổ Tích</span>
        <!-- ... -->
      </div>
    </div>
  </footer>

  <script>
    let currentSlide = 0;
    const totalSlides = 10;
    const visibleSlides = 5;
    let autoSlideInterval;
    let isAnimating = false;

    function moveSlider(direction) {
      if (isAnimating) return;
      isAnimating = true;
      currentSlide += direction;
      if (currentSlide > totalSlides - visibleSlides) {
        currentSlide = 0;
      } else if (currentSlide < 0) {
        currentSlide = totalSlides - visibleSlides;
      }
      updateSlider();
      setTimeout(() => { isAnimating = false; }, 800);
    }

    function updateSlider() {
      const sliderList = document.getElementById('sliderList');
      const sliderItem = sliderList.querySelector('.slider-item');
      if (!sliderItem) return;
      const itemWidth = sliderItem.offsetWidth;
      const gap = parseFloat(window.getComputedStyle(sliderList).gap || 0);
      const translateX = -(currentSlide * (itemWidth + gap));
      sliderList.style.transform = `translateX(${translateX}px)`;
    }

    function startAutoSlide() {
      stopAutoSlide();
      autoSlideInterval = setInterval(() => {
        if (!isAnimating) moveSlider(1);
      }, 3000);
    }
    function stopAutoSlide() {
      if (autoSlideInterval) clearInterval(autoSlideInterval);
    }
    document.addEventListener('DOMContentLoaded', function() {
      setTimeout(() => {
        updateSlider();
        startAutoSlide();
      }, 200);
      const sliderContainer = document.querySelector('.slider-container');
      sliderContainer.addEventListener('mouseenter', stopAutoSlide);
      sliderContainer.addEventListener('mouseleave', startAutoSlide);
      window.addEventListener('resize', updateSlider);
    });
  </script>
</body>
</html>
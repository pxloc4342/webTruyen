<?php
require_once __DIR__ . '/../models/StoryModel.php';

class StoryController {
    private $model;
    public function __construct($pdo) {
        $this->model = new StoryModel($pdo);
    }

    public function index($page = 1, $search = '') {
        $limit = 10;
        $offset = ($page - 1) * $limit;
        // Lấy các danh sách truyện cho từng mục
        $storiesHot = $this->model->getStories(6, 0); // Truyện Hot
        $storiesRank = $this->model->getStories(6, 0); // Bảng xếp hạng (giả lập)
        $storiesNew = $this->model->getStories(12, 0); // Truyện mới cập nhật
        require __DIR__ . '/../views/user/home.php';
    }

    public function detail($id) {
        $story = $this->model->getStoryById($id);
        $chapters = $this->model->getChapters($id);
        require __DIR__ . '/../views/user/detail.php';
    }

    public function read($id, $so_chuong) {
        $chapter = $this->model->getChapter($id, $so_chuong);
        require __DIR__ . '/../views/user/read.php';
    }
}
?>
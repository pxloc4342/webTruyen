<?php

class StoryModel {
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getStories($limit = 10, $offset = 0, $search = '') {
        $sql = "SELECT * FROM stories";
        if ($search) {
            $sql .= " WHERE ten LIKE :search";
        }
        $sql .= " ORDER BY id DESC LIMIT :limit OFFSET :offset";
        $stmt = $this->pdo->prepare($sql);
        if ($search) $stmt->bindValue(':search', "%$search%");
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getStoryById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM stories WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function getChapters($story_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM chapters WHERE story_id = ? ORDER BY so_chuong ASC");
        $stmt->execute([$story_id]);
        return $stmt->fetchAll();
    }

    public function getChapter($story_id, $so_chuong) {
        $stmt = $this->pdo->prepare("SELECT * FROM chapters WHERE story_id = ? AND so_chuong = ?");
        $stmt->execute([$story_id, $so_chuong]);
        return $stmt->fetch();
    }
}
?>
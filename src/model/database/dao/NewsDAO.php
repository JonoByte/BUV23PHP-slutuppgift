<?php
class NewsDAO {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function insertNews(News $news): void {
        $stmt = $this->pdo->prepare("INSERT INTO news (title, author, publishDate, content, image, url, source, address) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$news->getTitle(), $news->getAuthor(), $news->getPublishDate()->format('Y-m-d H:i:s'), $news->getContent(), $news->getImage(), $news->getUrl(), $news->getSource(), $news->getAddress()]);
    }
    
    
    public function getAllNews(): array {
        $stmt = $this->pdo->query("SELECT * FROM news");
        $newsList = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $news = new News();
            $news->setTitle($row['title']);
            $news->setAuthor($row['author']);
            $news->setPublishDate(new DateTime($row['publishDate']));
            $news->setContent($row['content']);
            $news->setImage($row['image']);
            $news->setUrl($row['url']);
            $news->setSource($row['source']);
            $news->setAddress($row['address']);
            $newsList[] = $news;
        }
        return $newsList;
    }

    public function getArticle($title): array 
    {
        $stmt = $this->pdo->prepare("SELECT * FROM news WHERE title= :title");
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->execute();
    
        $articleList = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $news = new News();
            $news->setTitle($row['title']);
            $news->setAuthor($row['author']);
            $news->setPublishDate(new DateTime($row['publishDate']));
            $news->setContent($row['content']);
            $news->setImage($row['image']);
            $news->setUrl($row['url']);
            $news->setSource($row['source']);
            $news->setAddress($row['address']);
            $articleList[] = $news;
        }
        
        return $articleList;
    }
    
    

}
?>

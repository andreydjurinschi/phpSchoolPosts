<?php 
    namespace repositories;

    require_once __DIR__ . '/../../database/dbConnector.php';
    use database\dbConnector;
    use DateTime;

    class PostRepository{
        private $connection;

        public function __construct(){
            $db = new dbConnector();
            $this->connection = $db->getConnection();
        }


        /**
         * Возвращает ассоциативный массив всех постов из базы данных.
         *
         * Метод выполняет SQL-запрос для получения всех постов из таблицы "posts"
         * и возвращает их в виде ассоциативного массива.
         * 
         *
         * @return array Ассоциативный массив всех постов, где ключи - названия столбцов,
         *               а значения - соответствующие данные постов.
         */
        public function getAllPosts() : array{
            $query = "SELECT * FROM posts";
            $result = mysqli_query($this->connection, $query);
            $posts = [];
            foreach($result as $post){
                $posts[] = $post;
            }
            return $posts;
        }


        /**
         * Метод выполняет SQL-запрос для вставки нового поста в таблицу "posts".
         *
         * @param int|null $cat_id Идентификатор категории поста.
         * @param string $title Заголовок поста.
         * @param string $content Содержимое поста.
         * @return bool Возвращает true, если пост успешно создан, иначе false.
         */
        public function createPost(?int $cat_id = null, string $title, string $content) : bool{
            $query = "INSERT INTO posts (cat_id, title, content, created_at) VALUES (?, ?, ?, ?)";
            $statement = $this->connection->prepare($query); 
            $created_at = (new DateTime())-> format('Y-m-d H:i:s');
            $statement->bind_param("isss", $cat_id, $title, $content, $created_at);
            return $statement->execute();
    }

    /**
     * Получает пост по переданному Id
     *
     * @param $postId
     *
     * @return array
     */
        public function getPostById($postId) {
            $query = "SELECT * FROM posts WHERE id = ?";
            $statement = $this->connection->prepare($query);
            $statement->bind_param("i", $postId);
            $statement->execute();
            return $statement->get_result()->fetch_assoc();
        }

}
?>
<?php
    namespace repositories;
    require_once __DIR__ . '/../../database/dbConnector.php';
    use database\dbConnector;
    class CategoryRepository{


        private $connection;
        private $postRepository;
        
        public function __construct(){
            $this->postRepository = new PostRepository();
            $this->connection = (new dbConnector())->getConnection();
        }


/*        public function addCategoryToPost($postId, $catId){
            $post = $this->postRepository->getPostById($postId);
            $category = $this->getCategoryById($catId);
            if($post && $category){
                $query = "UPDATE posts SET cat_id = ? WHERE id = ?";
                $statement = $this->connection->prepare($query);
                $statement->bind_param("ii", $catId, $postId);
                return $statement->execute();
            }
            return false;
        }*/

        public function getAllCategories() : array{
            $query = "SELECT * FROM categories";
            $result = mysqli_query($this->connection, $query);
            $categories = [];
            foreach($result as $category){
                $categories[] = $category;
            }
            return $categories;
        }

        public function getCategoryName($id){
            $category = $this->getCategoryById($id);
            return $category["cat_name"];
        }


        public function getCategoryById(int $cat_id) : array{
            $query = "SELECT * FROM categories WHERE cat_id = ?";
            $statement = $this->connection->prepare($query);
            $statement->bind_param("i", $cat_id);
            $statement->execute();
            $result = $statement->get_result();
            return $result->fetch_assoc();
        }

    }
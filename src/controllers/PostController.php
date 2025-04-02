<?php 


namespace src;

require_once __DIR__ . "/../services/PostService.php";
use services\PostService;



class PostController{
    private $postService;
    private $message;

    /**
     * конструктор, внедряющий зависимость сервиса
     */
    public function __construct(){
        $this->postService = new PostService();
    }


    /***
     * получене всех постов
     * @return array
     */
    public function getPosts(){
        return $this->postService->getAllPosts();
    }

    /***
     * получения поста по id
     * @param $postId
     * @return array
     */
    public function getPostById($postId){
        return $this->postService->getPostById($postId);
    }

    /***
     * создание поста
     * @return array|string
     */
    public function createPost(){
        $cat_id = $_POST['cat_id'] ?? 0;
        $title = $_POST['title'] ?? '';
        $content = $_POST['content'] ?? '';
        $createdPost = $this->postService->createPost($cat_id, $title, $content);
        if(is_array($createdPost)){
            $message = ["message" => "Post created"];
        } else {
            $message = ["error" => $createdPost];
        }
        return $createdPost;
    }
}


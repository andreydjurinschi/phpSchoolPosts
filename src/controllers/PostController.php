<?php 


namespace controllers;

require_once __DIR__ . "/../services/PostService.php";
use services\PostService;



class PostController{
    private $postService;

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
     * @return array
     */
    public function createPost(){
        $cat_id = isset($_POST['cat_id']) && $_POST['cat_id'] !== '' ? (int) $_POST['cat_id'] : null;
        $title = $_POST['title'] ?? '';
        $content = $_POST['content'] ?? '';
        $createdPost = $this->postService->createPost($cat_id, $title, $content);
        return [
            key($createdPost) => $createdPost[key($createdPost)],
        ];
    }

    public function getCategoryNameById($categoryId){

    }
}


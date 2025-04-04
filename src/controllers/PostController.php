<?php 


namespace controllers;

require_once __DIR__ . "/../services/PostService.php";
require_once __DIR__ . "/../paginator/Paginator.php";
use services\PostService;
use paginator\Paginator;



class PostController{
    private $postService;
    private $paginator;

    /**
     * конструктор, внедряющий зависимость сервиса
     */
    public function __construct(){
        $this->postService = new PostService();
        $this->paginator = new Paginator();
    }


    /***
     * получене всех постов
     * @return array
     */
    public function getPosts(){
        $paginatedPosts = $this->paginator->createPagination();
        return $paginatedPosts['posts'];
    }
    public function getPaginationData()
    {
        return $this->paginator->createPagination();
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


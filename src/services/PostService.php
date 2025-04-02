<?php

namespace services;
require_once __DIR__ . '/../repositories/PostRepository.php';
require_once __DIR__ . '/../handlers/formValidator.php';


use repositories\PostRepository;
use handlers\formValidator;

class PostService
{
    private $postRepository;
    private $validator;

    public function __construct()
    {
        $this->postRepository = new PostRepository();
        $this->validator = new formValidator();
    }

    /**
     * Реализует метод получения всех постов из репозитория
     * @return array
     */
    public function getAllPosts(): array
    {
        return $this->postRepository->getAllPosts();
    }
    /**
     * реализует метод получения поста по Id из репощитория
     *
     * @param $id
     *
     * @return array
     */

    public function getPostById(int $id){
        return $this->postRepository->getPostById($id);
    }


    /***
     * реализует метод создания поста
     *
     * @param int $cat_id
     * @param string $title
     * @param string $content
     * @return array|string
     *
     */
    public function createPost(int $cat_id, string $title, string $content): array|string{
        if(!$this->validator->requiredField($title) || !$this->validator->requiredField($content)){
            return "All fields are required";
        }
        if(!$this ->validator->validateLength($title, 3, 100) || !$this->validator->validateLength($content, 10, 500)){
            return "Title must be between 5 and 100 characters and content must be between 10 and 500 characters";
        }
        return ["success" => $this->postRepository->createPost($cat_id, $title, $content)];
    }


}
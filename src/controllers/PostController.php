<?php 
namespace src;
require_once __DIR__ . "/../repositories/PostRepository.php";
require_once __DIR__ . "/../handlers/formHandler.php";
use repositories\PostRepository;
use handlers\formHandler;

class PostController{
    private $postRepository;
    private $formHandler;

    /**
     * Конструктор класса PostController.
     * 
     * Инициализирует экземпляры классов PostRepository и formHandler.
     */
    public function __construct(){
        $this->postRepository = new PostRepository();
        $this->formHandler = new formHandler();
    }

    /**
     * Получает все посты из репозитория.
     * 
     * @return array Ассоциативный массив всех постов.
     */
    public function getAllPosts(){
        return $this->postRepository->getAllPosts();
    }

    public function getCategoryNameById(int $cat_id) : string{
        $category = $this->postRepository->getCategoryById($cat_id);
        return $category['cat_name'];
    }

    /**
     * Создает новый пост.
     * 
     * @param int $cat_id Идентификатор категории поста.
     * @param string $title Заголовок поста.
     * @param string $content Содержимое поста.
     * 
     * @return bool true, если пост успешно создан, иначе false.
     */
    public function createPost(int $cat_id, string $title, string $content){
        if(!$this->formHandler->requiredField($cat_id) || !$this->formHandler->requiredField($title) || !$this->formHandler->requiredField($content))
        {
            echo "All fields are required.";
            return false;
        }
        if(!$this->formHandler->validateLength($title, 5, 100) || !$this->formHandler->validateLength($content, 10, 500))
        {
            echo "Title must be between 5 and 100 characters and content must be between 10 and 500 characters.";
            return false;
        }

        $created = $this->postRepository->createPost($cat_id, $title, $content);
        return $created ? "Post is succeflkm added" : "Post is not added, pls try again";
    }
}


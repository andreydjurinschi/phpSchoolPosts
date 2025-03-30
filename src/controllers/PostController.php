<?php 
namespace src;
require_once __DIR__ . "/../repositories/PostRepository.php";
require_once __DIR__ . "/../repositories/CategoryRepository.php";
require_once __DIR__ . "/../handlers/formValidator.php";
use repositories\PostRepository;
use repositories\CategoryRepository;
use handlers\formValidator;

class PostController{
    private $postRepository;
    private $categoryRepository;
    private $formValidator;

    /**
     * Конструктор класса PostController.
     * 
     * Инициализирует экземпляры классов PostRepository и formValidator.
     */
    public function __construct(){
        $this->postRepository = new PostRepository();
        $this->categoryRepository = new CategoryRepository();
        $this->formValidator = new formValidator();
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
        $category = $this->categoryRepository->getCategoryById($cat_id);
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
    public function createPost(){
        $cat_id = $_POST['cat_id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        if(!$this->formValidator->requiredField($cat_id) || !$this->formValidator->requiredField($title) || !$this->formValidator->requiredField($content))
        {
            return "All fields are required.";
        }
        if(!$this->formValidator->validateLength($title, 5, 100) || !$this->formValidator->validateLength($content, 10, 500))
        {
            
            return "Title must be between 5 and 100 characters and content must be between 10 and 500 characters.";
        }

        $created = $this->postRepository->createPost($cat_id, $title, $content);
        
        return $created ? " " : "Post is not added, pls try again";
    }
}


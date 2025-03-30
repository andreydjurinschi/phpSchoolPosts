<?php 
namespace src;
require_once __DIR__ . "/../repositories/CategoryRepository.php";
require_once __DIR__ . "/../handlers/formValidator.php";
use repositories\CategoryRepository;
use handlers\formValidator;

class CategoryController{
    private $categoryRepository;
    private $formValidator;

    /**
     * Конструктор класса CategoryController.
     * 
     * Инициализирует экземпляры классов CategoryRepository и formValidator.
     */
     public function __construct()
     {
        $this->categoryRepository = new CategoryRepository();
        $this->formValidator = new formValidator();
     }

     public function getAllCategories() : array{
        return $this->categoryRepository->getAllCategories();
     }

     public function getCategoryById(int $cat_id) : array{
        return $this->categoryRepository->getCategoryById($cat_id);
     }
}

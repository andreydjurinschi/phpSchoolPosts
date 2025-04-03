<?php

namespace services;

require_once __DIR__ . '/../repositories/CategoryRepository.php';
//require_once __DIR__ . '/../handlers/formValidator.php';

use repositories\CategoryRepository;
class CategoryService
{
    private $categoryRepository;

    public function __construct(){
        $this->categoryRepository = new CategoryRepository();
    }

    public function getAllCategories(): array{
        return $this->categoryRepository->getAllCategories();
    }

    public function getCategoryName(int $cat_id): string{
        return $this->categoryRepository->getCategoryName($cat_id);
    }



/*    public function addCategoryToPost($postId, $catId){
        $result = $this->categoryRepository->addCategoryToPost($postId, $catId);
        if($result){
            return ["success" => "Successfully added new category"];
        }
        return "Failed to add new category";
    }*/
}
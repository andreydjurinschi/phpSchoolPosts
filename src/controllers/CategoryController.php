<?php 
namespace controllers;
require_once __DIR__ . "/../services/CategoryService.php";

use services\CategoryService;


class CategoryController{
    private $categorySevice;

    public function __construct(){
        $this->categorySevice = new CategoryService();
    }

    public function getAllCategories(): array{
        return $this->categorySevice->getAllCategories();
    }

    public function getCategory(int $cat_id): string{
        return $this->categorySevice->getCategoryName($cat_id);
    }
/*    public function addCategoryToPost(): array|string
    {
        $catId = $_POST['cat_id'];
        $postId = $_POST['post_id'];
        $result = $this->categorySevice->addCategoryToPost($postId, $catId);
        if(is_array($result)){
            return [key($result) => array_values($result)[0]];
        }
        return $result;
    }*/
}

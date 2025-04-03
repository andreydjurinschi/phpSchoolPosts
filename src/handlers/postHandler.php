<?php

require_once __DIR__ . "/../controllers/postController.php";
require_once __DIR__ . "/../controllers/CategoryController.php";

use controllers\CategoryController;
use controllers\PostController;

$postController = new PostController();
$categoryController = new CategoryController();
$message = array();

if(isset($_POST["action"]) && $_POST["action"] === "createPost") {
    $message = $postController->createPost();
    if(key($message) === "success") {
    $_POST = [];
    header('Location: http://localhost/lab04/public/post/index.php');
    exit;
    }
}
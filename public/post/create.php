<?php
require_once __DIR__ . "/../../src/handlers/postHandler.php";
require_once __DIR__ . "/../../src/controllers/postController.php";
require_once __DIR__ . "/../../src/controllers/categoryController.php";
require_once __DIR__ . "/../../includes/header.php";

use controllers\PostController;
use controllers\CategoryController;

$postController = new PostController();
$categoryController = new CategoryController();
$categories = $categoryController->getAllCategories();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Post</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="create-container">
    <h2 style="font-size: 30px">Create a New Post</h2>
    <h2>Enter the post details below</h2>
    <form method="POST">
        <input type="hidden" name="action" value="createPost">
        <div class="row">
            <div class="col-25">
                <label for="title">Title</label>
            </div>
            <div class="col-75">
                <input type="text" id="title" name="title" placeholder="Enter the title..." >
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="content">Content</label>
            </div>
            <div class="col-75">
                <textarea id="content" name="content" placeholder="Enter the content..." style="height:200px" ></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="cat_id">Category</label>
            </div>
            <div class="col-75">
                <select id="cat_id" name="cat_id" >
                    <option value="">--Select a category--</option>
                    <?php foreach($categories as $category): ?>
                        <option value="<?= htmlspecialchars($category['cat_id']) ?>"><?= htmlspecialchars($category['cat_name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <input type="submit" value="Create Post">
        </div>
    </form>
    <div class="row">
        <a href="/../lab04/public/post/index.php" class="btn-go-back">Back to Posts</a>
    </div>
    <?php if (!empty($message)): ?>
        <div class="row">
            <p style="color: red;">
                <?php foreach ($message as $key => $value): ?>
                    <?= htmlspecialchars($key) ?>: <?= htmlspecialchars($value) ?><br>
                <?php endforeach; ?>
            </p>
        </div>
    <?php endif; ?>
</div>
</body>
</html>

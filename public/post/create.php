<?php 
    require_once __DIR__ . "/../../database/dbConnector.php";
    require_once __DIR__ . "/../../src/controllers/PostController.php";
    require_once __DIR__ . "/../../src/controllers/CategoryController.php";
    use database\dbConnector;
    use src\PostController; 
    use src\CategoryController;
    $db = new dbConnector();
    $postController = new PostController();
    $categoryController = new CategoryController();
    $connection = $db->getConnection();
    $count = count($postController->getAllPosts());
    $categories = $categoryController->getAllCategories();
    $message = '';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = $postController->createPost();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create post</title>
</head>
<body>
<div style="display: flex; justify-content: center; align-items: center; height: 100vh; flex-direction: column; gap: 20px;">
    <div style="text-align: center;">
        <h1>Post creating</h1>
        <h2>Input all post data below</h2>
    </div>
    <div>
        <form method="POST" style="display: flex; flex-direction: column; max-width: 400px; gap: 10px; width: 100%;">
            <input type="text" name="title" placeholder="Title" required style="padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px;">
            <textarea name="content" rows="10" placeholder="Content" required style="padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px; resize: vertical;"></textarea>
            <select name="cat_id" id="">
                <option value="">--select category gor this post--</option>
                <?php foreach($categories as $category) { ?> 
                    <option value="<?= $category['cat_id'] ?>"><?= $category['cat_name'] ?></option>
                <?php } ?>
            </select>
            <button type="submit" style="padding: 10px; font-size: 16px; background-color: #007BFF; color: white; border: none; border-radius: 5px; cursor: pointer;">Create post</button>
            <a type="submit" href="/../lab04/public/post/index.php"  style="padding: 10px; font-size: 16px; background-color:rgb(255, 51, 0); color: white; border: none; border-radius: 5px; cursor: pointer;">Back to posts</a>
            <?php if (!empty($message)): ?>
                <p style="color: red; font-size: 16px"><?= $message ?></p>
            <?php endif; ?>
        </form>

    </div>
</div>
</body>
</html>
<?php
    require_once __DIR__ . "/../src/controllers/PostController.php";
    require_once __DIR__ . "/../src/controllers/CategoryController.php";

use controllers\CategoryController;
use controllers\PostController;


    $postController = new PostController();
    $posts = $postController->getPosts();
    $categoryController = new CategoryController();
    $two = array_slice($posts, -2, 2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Post Website</title>
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
    <header>
        <h1>Welcome to Students Post Website</h1>
    </header>
    <div class="container">
        <h2>About Us</h2>
        <p>Students Post Website is a platform where students can share their thoughts, ideas, and experiences.
        Our mission is to create a community where students can connect, learn, and grow together.</p>
        <p>Whether you're looking to share your latest project, seek advice, or simply connect with like-minded individuals,
        this is the place for you. Join us and be part of a vibrant student community!</p>
        <a href="/../lab04/public/post/index.php">View posts</a>
    </div>
    <div class="container">
        <h2>Latest Posts</h2>
        <p>Check out our latest posts and stay updated with the latest news and trends in the student community.</p>
    <div class="post-container">
        <?php foreach($two as $post) { ?>
        <div class="post-card">
                <h2> <?= $post['title'] ?></h2>
                <p> <strong>Content: </strong><?= $post['content'] ?></p>
                <p><strong>Date:</strong> <?= $post['created_at'] ?></p>
                <p><strong>Category:</strong>
                    <?php if ($post['cat_id'] === null)
                    {
                        echo "No Category";
                    }else{
                        $name = $categoryController->getCategory($post['cat_id']);
                        echo $name;
                    }
                    ?></p>
        </div>
        <?php } ?>
        </div>
</body>
</html>
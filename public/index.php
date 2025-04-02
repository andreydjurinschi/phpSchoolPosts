<?php //
//    require_once __DIR__ . "/../database/dbConnector.php";
//    require_once __DIR__ . "/../src/controllers/PostController.php";
//    require_once __DIR__ . "/../src/controllers/CategoryController.php";
//    use database\dbConnector;
//    use src\PostController;
//    use src\CategoryController;
//    $db = new dbConnector();
//    $connection = $db->getConnection();
//    $postController = new PostController();
//    $categoryController = new CategoryController();
//    $posts = $postController->getAllPosts();
//    $two = array_slice($posts, -2, 2);
//?>
<!---->
<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <title>Students Post Website</title>-->
<!--    <link rel="stylesheet" href="assets/css/style.css">-->
<!--    -->
<!--</head>-->
<!--<body>-->
<!--    <header>-->
<!--        <h1>Welcome to Students Post Website</h1>-->
<!--    </header>-->
<!--    <div class="container">-->
<!--        <h2>About Us</h2>-->
<!--        <p>Students Post Website is a platform where students can share their thoughts, ideas, and experiences. -->
<!--        Our mission is to create a community where students can connect, learn, and grow together.</p>-->
<!--        <p>Whether you're looking to share your latest project, seek advice, or simply connect with like-minded individuals, -->
<!--        this is the place for you. Join us and be part of a vibrant student community!</p>-->
<!--    </div>-->
<!--    <div class="container">-->
<!--        <h2>Latest Posts</h2>-->
<!--        <p>Check out our latest posts and stay updated with the latest news and trends in the student community.</p>-->
<!--    <div class="post-container">-->
<!--        --><?php //foreach($two as $post) { ?><!-- -->
<!--        <div class="post-card">-->
<!--                <h2> --><?php //= $post['title'] ?><!--</h2>-->
<!--                <p> <strong>Content: </strong>--><?php //= $post['content'] ?><!--</p>-->
<!--                <p><strong>Date:</strong> --><?php //= $post['created_at'] ?><!--</p>-->
<!--                <p><strong>Category:</strong> --><?php //$name = $postController->getCategoryNameById($post['cat_id']); echo $name?><!--</p>-->
<!--        </div>-->
<!--        --><?php //} ?>
<!--        </div>-->
<!--</body>-->
<!--</html>-->
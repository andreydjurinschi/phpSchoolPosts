<?php  
        require_once __DIR__ . "/../../database/dbConnector.php";
        require_once __DIR__ . "/../../src/controllers/PostController.php";
        use database\dbConnector;
        use src\PostController; 
        $db = new dbConnector();
        $postController = new PostController();
        $connection = $db->getConnection();

        $posts = $postController->getAllPosts();

?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>All Posts</title>
        <link rel="stylesheet" href="../assets/css/post.css">
</head>
<body>
        <h1>All Posts</h1>
        <h2>Discover the latest updates and stories from our website</h2>

        <div class="post-container">
        <?php foreach($posts as $post) { ?> 
        <div class="post-card">
                <h2> <?= $post['title'] ?></h2>
                <p> <strong>Content: </strong><?= $post['content'] ?></p>
                <p><strong>Date:</strong> <?= $post['created_at'] ?></p>
                <p><strong>Category:</strong> <?php $name = $postController->getCategoryNameById($post['cat_id']); echo $name?></p>
        </div>
        <?php } ?>
        </div>
        
        <div style="text-align: center; margin-top: 20px;">
            <a class="btn-create" href="/../lab04/public/post/create.php">Create new post</a>
            <br>
            <a class="btn-go-back" href="/../lab04/public">Back to principal page</a>
        </div>
</body>
</html>
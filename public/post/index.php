<?php  
    require_once __DIR__ . "/../../src/controllers/PostController.php";
    require_once __DIR__ . "/../../src/controllers/CategoryController.php";
require_once __DIR__ . "/../../includes/header.php";
    use controllers\PostController;
    use controllers\CategoryController;
    $postController = new PostController();
    $categoryController = new CategoryController();
    $posts = $postController->getPosts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>All Posts</title>
        <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
        <div class="container">
        <h1>All Posts</h1>
            <div class="post-container">
                <?php foreach($posts as $post) { ?>
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
        </div>

        <div style="text-align: center; margin-top: 20px;">
            <a class="btn-create" href="/../lab04/public/post/create.php">Create new post</a>
            <br>
            <br>
            <a class="btn-go-back" href="/../lab04/public/index.php">Back to principal page</a>
        </div>
</body>
</html>
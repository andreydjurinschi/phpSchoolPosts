<?php
    require_once __DIR__ . "/../../src/controllers/PostController.php";
    require_once __DIR__ . "/../../src/controllers/CategoryController.php";
require_once __DIR__ . "/../../includes/header.php";
    use controllers\PostController;
    use controllers\CategoryController;
    $postController = new PostController();
    $categoryController = new CategoryController();
    $paginationData = $postController->getPaginationData();
    $posts = $paginationData['posts'];
    $totalPages = $paginationData['totalPages'];
    $currentPage = $paginationData['currentPage'];
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
    <h1 style="color: #444;">All Posts</h1>
    <a class="btn-create" href="/../lab04/public/post/create.php" style="display: inline-block; padding: 10px 20px; background-color: #28a745; color: #fff; text-decoration: none; border-radius: 5px; transition: background-color 0.3s ease;">Create new post</a>
    <div class="post-container">
        <?php foreach($posts as $post) { ?>
            <div class="post-card">
                <h2> <?= $post['title'] ?></h2>
                <p> <strong>Content: </strong><?= $post['content'] ?></p>
                <p><strong>Date:</strong> <?= $post['created_at'] ?></p>
                <p><strong>Category:</strong>
                    <?php
                    if ($post['cat_id'] === null) {
                        echo "No Category";
                    } else {
                        $name = $categoryController->getCategory($post['cat_id']);
                        echo $name;
                    }
                    ?>
                </p>
            </div>
        <?php } ?>
    </div>


    <div class="pagination" style="display: flex; justify-content: center; margin-top: 20px;">
        <?php if($currentPage > 1): ?>
            <a href="?page=<?= $currentPage - 1 ?>" style="margin: 0 5px; padding: 10px 15px; background-color: #333; color: #fff; text-decoration: none; border-radius: 5px;">Previous</a>
        <?php endif; ?>

        <?php for($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?page=<?= $i ?>" <?= $i == $currentPage ? 'class="active"' : '' ?> style="margin: 0 5px; padding: 10px 15px; background-color: <?= $i == $currentPage ? '#28a745' : '#333' ?>; color: #fff; text-decoration: none; border-radius: 5px;"><?= $i ?></a>
        <?php endfor; ?>

        <?php if($currentPage < $totalPages): ?>
            <a href="?page=<?= $currentPage + 1 ?>" style="margin: 0 5px; padding: 10px 15px; background-color: #333; color: #fff; text-decoration: none; border-radius: 5px;">Next</a>
        <?php endif; ?>
    </div>

</div>

<div style="text-align: center; margin-top: 20px;">
    <br><br>
    <a class="btn-go-back" href="/../lab04/public/index.php">Back to principal page</a>
</div>
</body>
</html>
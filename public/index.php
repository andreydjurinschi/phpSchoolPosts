<?php 
    require_once __DIR__ . "/../database/dbConnector.php";
    use database\dbConnector;
    $db = new dbConnector();
    $connection = $db->getConnection();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Post Website</title>
    <link rel="stylesheet" href="assets/style.css">
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
    </div>

    <div class="recent-posts">
        <h2>Recent Posts</h2>
        
    </div>
</body>
</html>
<?php


namespace paginator;
require_once __DIR__ . "/../../database/dbConnector.php";
use database\dbConnector;

class Paginator
{
    private $connection;

    public function __construct()
    {
        $this->connection = (new dbConnector())->getConnection();
    }

    public function createPagination(){

        if(isset($_GET["page"])){
            $pageNumber = $_GET["page"];
        } else {
            $pageNumber = 1;
        }

        $limit = 5;
        $currentPage = ($pageNumber - 1) * $limit;


        $query = "SELECT * FROM posts";
        $result = mysqli_query($this->connection, $query);
        $totalPosts = mysqli_num_rows($result);

        $totalPages = ceil($totalPosts / $limit);

        $query = "SELECT * FROM posts LIMIT $currentPage, $limit";
        $posts = mysqli_query($this->connection, $query);
        $postArray = mysqli_fetch_all($posts, MYSQLI_ASSOC);

        return [
            'posts' => $postArray,
            'totalPages' => $totalPages,
            'currentPage' => $pageNumber
        ];
    }
}

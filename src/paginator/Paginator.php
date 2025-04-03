<?php


namespace paginator;
require_once __DIR__ . "/../../database/dbConnector.php";
use database\dbConnector;
class Paginator
{

    private $connection;
    private $itemsPerPage;
    private $currentPage;
    private $totalItems;
    private $query;

    public function __construct(){
        $this->connection = new dbConnector()->getConnection();
        $this->currentPage = 1; // Default current page
        $this->itemsPerPage = 10; // Default items per page
    }
}
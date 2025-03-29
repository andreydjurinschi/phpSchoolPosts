<?php  
        require_once __DIR__ . "/../../database/dbConnector.php";
        use database\dbConnector;
        $db = new dbConnector();
        $connection = $db->getConnection();
?>
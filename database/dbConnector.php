<?php

namespace database;
require_once __DIR__ . '/config/databaseConfig.php';
use mysqli;


/**
 * Класс dbConnector предназначен для подключения к базе данных MySQL с использованием MySQLi.
 */
class dbConnector {
    private $connection;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        $this->connection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

        if ($this->connection->connect_error) {
            die("Ошибка подключения: " . $this->connection->connect_error);
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}

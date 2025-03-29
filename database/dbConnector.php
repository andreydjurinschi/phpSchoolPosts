<?php 

    namespace database;
    require_once  'config/databaseConfig.php';
    use mysqli;
    use Exception;
    /**
     * Класс dbConnector предназначен для подключения к базе данных MySQL с использованием расширения MySQLi.
     * Он инкапсулирует логику подключения и предоставляет метод для получения соединения.
     */
    class dbConnector
    {
        var $connection;

        public function __construct()
        {
            $this->connection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        }

        public function getConnection(){
            try{
                //echo "Successfully connected to the database!";
                return $this->connection;
            }catch (Exception $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
        
    }

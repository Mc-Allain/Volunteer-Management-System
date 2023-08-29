<?php
    require_once __DIR__ .'/../Config/constants.php';

    class Database {
        private $connection;
        private $connected;
        private $error;

        public function __construct() {
            $dsn = 'mysql:host='. DB_HOST .';dbname='. DB_NAME;
            $options = array(PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

            try {
                $this->connection = new PDO($dsn, DB_USER, DB_PASS, $options);
                $this->connected = true;
            } catch(PDOException $error){
                $this->error = $error;
                $this->connected = false;
            }
        }

        public function get_details() {
            return [
                'connection' => $this->connection,
                'connected' => $this->connected,
                'error' => $this->error,
            ];
        }

        public function get_connection() {
            return $this->connection;
        }

        public function is_connected() {
            return $this->connected;
        }

        public function get_error() {
            return $this->error;
        }
    }
?>
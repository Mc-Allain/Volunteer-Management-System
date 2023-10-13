<?php
    class Controller {
        protected $connection;
        protected $connected;
        protected $error;
        
        protected $statement;

        public function __construct($Database) {
            $this->connection = $Database->get_connection();
            $this->connected = $Database->is_connected();
            $this->error = $Database->get_error();
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

        public function start_statement($query) {
            $this->statement = $this->connection->prepare($query);
        }

        public function bind_value($binder, $value) {
            $this->statement->bindValue($binder, $value);
        }

        public function execute() {
            $this->statement->execute();
        }

        public function execute_fetch() {
            $this->statement->execute();

            $fetch_result = $this->statement->fetch(PDO::FETCH_ASSOC);
            return $fetch_result;
        }

        public function execute_fetch_all() {
            $this->statement->execute();

            $fetch_result = $this->statement->fetchAll(PDO::FETCH_ASSOC);
            return $fetch_result;
        }
        
        public function get_statement() {
            return $this->statement;
        }

        public function end_statement() {
            $this->statement->closeCursor();
        }
    }

?>
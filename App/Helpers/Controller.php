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

        private function parse_insert_values($values = []) {
            $parsed_values = '';

            foreach ($values as $key => $value) {
                
                if (is_array($value)) {
                    if (count($value) > 1) {
                        $value = ':'.$value[0];
                    } else {
                        if (empty(trim($value[0]))) {
                            $value = 'DEFAULT';
                        } else {
                            $value = ':'.$key;
                        }
                    }
                }

                if ($key !== 0) {
                    $parsed_values .= ', ';
                }

                $parsed_values .= $value;
            }

            return $parsed_values;
        }

        private function set_parameter_values($values = []) {
            foreach ($values as $key => $value) {
                if (is_array($value)) {
                    /** 
                     * Check if the parameter is an array 
                     * since it was enclosed by a square bracket. 
                     * */

                    /** 
                     * By default, 
                     * the array key of the parameter is the parameter name and 
                     * the first value of the parameter is the parameter value. 
                     * */
                    $parameter_name = $key;
                    $parameter_value = $value[0];

                    if (count($value) > 1) {
                        /** 
                         * If the array has two or more values, 
                         * the first value is the parameter name and 
                         * the second value is the parameter value.
                         * */ 
                        $parameter_name = $value[0];
                        $parameter_value = $value[1];
                    }

                    if (!empty(trim($parameter_value))) {
                        /**
                         * If the parameter value is empty, 
                         * don't set it as a value of the parameter name.
                         */
                        $this->bind_value(':'.$parameter_name, $parameter_value);
                    }
                }
            }
        }

        public function create_insert_query($table_name = '', $values = []) {
            $parsed_values = $this->parse_insert_values($values);

            $query = 'INSERT INTO '.$table_name.' VALUES ('.$parsed_values.')';

            $this->start_statement($query);

            $this->set_parameter_values($values);

            return $query;
        }

        public function start_statement($query) {
            $this->statement = $this->connection->prepare($query);
        }

        public function bind_value($binder, $value) {
            if (empty(trim($value))) {
                $value = null;
            }

            $this->statement->bindValue($binder, $value);
        }
        
        public function get_statement() {
            return $this->statement;
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

        public function end_statement() {
            $this->statement->closeCursor();
        }
    }

?>
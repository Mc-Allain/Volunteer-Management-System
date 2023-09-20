<?php
    require_once __DIR__ .'/../Helpers/Controller.php';

    class EmergencyController extends Controller {
        public function get_emergency_count() {
            $data = null;
            
            $query = 'SELECT COUNT(*) AS value
                    FROM emergencies';

            $this->statement = $this->connection->prepare($query);

            $fetched_result = $this->execute_fetch();
            $this->end_statement();

            if ($fetched_result) {
                $data = $fetched_result;
            }

            return $data;
        }

        public function get_emergency_count_in_last_seven_days() {
            $data = null;
            
            $query = 'SELECT COUNT(*) AS value
                    FROM emergencies';

            $this->statement = $this->connection->prepare($query);

            $fetched_result = $this->execute_fetch();
            $this->end_statement();

            if ($fetched_result) {
                $data = $fetched_result;
            }

            return $data;
        }
    }

?>
<?php
    require_once __DIR__ .'/../Helpers/Controller.php';

    class VolunteerController extends Controller {
        public function get_volunteer_count() {
            $data = null;
            
            $query = 'SELECT COUNT(*) AS value
                    FROM volunteers';

            $this->statement = $this->connection->prepare($query);

            $fetched_result = $this->execute_fetch();
            $this->end_statement();

            if ($fetched_result) {
                $data = $fetched_result;
            }

            return $data;
        }

        public function get_average_volunteer_count_per_emergency() {
            $data = null;
            
            $query = 'SELECT FORMAT(COALESCE(AVG(value), 0), 2) AS value
                    FROM (
                        SELECT e.label, COALESCE(ev.value, 0) AS value
                        FROM emergencies e
                        LEFT JOIN (
                            SELECT emergency_id, COUNT(*) AS value
                            FROM emergency_volunteers
                        ) ev
                        ON e.id = ev.emergency_id
                    ) average_volunteer_count_per_emergency';

            $this->statement = $this->connection->prepare($query);

            $fetched_result = $this->execute_fetch();
            $this->end_statement();

            if ($fetched_result) {
                $data = $fetched_result;
            }

            return $data;
        }

        public function get_volunteers() {
            $data = null;
            
            $query = 'SELECT id, last_name, first_name, barangay, city, mobile_number, mobile_number_alt, email_address
                    FROM volunteers
                    ORDER BY last_name';

            $this->statement = $this->connection->prepare($query);

            $fetched_result = $this->execute_fetch_all();
            $this->end_statement();

            if ($fetched_result) {
                $data = $fetched_result;
            }

            return $data;
        }
    }

?>
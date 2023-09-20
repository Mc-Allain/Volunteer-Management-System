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
            
            $query = 'SELECT CAST(COALESCE(AVG(value), 0) AS INT) AS value
                    FROM (
                        SELECT e.label AS emergency, COUNT(*) AS value
                        FROM volunteers v
                        JOIN emergency_volunteers ev
                        ON v.id = ev.volunteer_id
                        JOIN emergencies e
                        ON e.id = ev.emergency_id
                        GROUP BY e.id
                    ) average_volunteer_count_per_emergency';

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
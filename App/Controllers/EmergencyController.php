<?php
    require_once __DIR__ .'/../Helpers/Controller.php';
    require_once __DIR__ .'/../Assets/Carbon/autoload.php';

    use Carbon\Carbon;

    class EmergencyController extends Controller {
        public function get_emergency_count() {
            $data = null;
            
            $query = 'SELECT COUNT(*) AS value
                    FROM emergencies';

            $this->start_statement($query);

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
                    FROM emergencies
                    WHERE date_created >= :date_created';

            $this->start_statement($query);
                    
            $this->bind_value(":date_created", Carbon::now()->subDays(7));

            $fetched_result = $this->execute_fetch();
            $this->end_statement();

            if ($fetched_result) {
                $data = $fetched_result;
            }

            return $data;
        }
    }

?>
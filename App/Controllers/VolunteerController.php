<?php
    require_once __DIR__ .'/../Helpers/Controller.php';

    class VolunteerController extends Controller {
        public function get_volunteer_count() {
            $data = null;
            
            $query = 'SELECT COUNT(*) AS value
                    FROM volunteers';

            $this->start_statement($query);

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

            $this->start_statement($query);

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

            $this->start_statement($query);

            $fetched_result = $this->execute_fetch_all();
            $this->end_statement();

            if ($fetched_result) {
                $data = $fetched_result;
            }

            return $data;
        }

        public function create_volunteer($request) {
            $last_name = $request['last_name'];
            $first_name = $request['first_name'];

            $barangay = $request['barangay'];
            $city = $request['city'];

            $mobile_number = $request['mobile_number'];
            $alt_mobile_number = $request['alt_mobile_number'];
            $email_address = $request['email_address'];

            $query = 'INSERT INTO volunteers
                    VALUES (
                        null, :last_name, :first_name,
                        :barangay, :city,
                        :mobile_number, :alt_mobile_number, :email_address,
                        DEFAULT, DEFAULT
                    )';

            $this->start_statement($query);
            
            $this->bind_value(":last_name", $last_name);
            $this->bind_value(":first_name", $first_name);
            
            $this->bind_value(":barangay", $barangay);
            $this->bind_value(":city", $city);
            
            $this->bind_value(":mobile_number", $mobile_number);
            $this->bind_value(":alt_mobile_number", $alt_mobile_number);
            $this->bind_value(":email_address", $email_address);

            $this->execute();

            $this->end_statement();

            $fetched_result = $this->get_last_volunteer_from_table();

            if ($fetched_result) {
                $data = $fetched_result;
            }

            return $data;
        }

        private function get_last_volunteer_from_table() {
            $data = null;
            
            $query = 'SELECT * FROM volunteers ORDER BY id DESC LIMIT 1';

            $this->start_statement($query);

            $fetched_result = $this->execute_fetch();
            $this->end_statement();

            if ($fetched_result) {
                $data = $fetched_result;
            }

            return $data;
        }
    }

?>
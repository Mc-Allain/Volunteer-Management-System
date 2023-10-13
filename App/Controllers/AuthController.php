<?php
    require_once __DIR__ .'/../Helpers/Controller.php';

    class AuthController extends Controller {
        public function login($request) {
            $successful = false;
            $data = null;
            
            $this->get_admin_by_username_and_password_imp($request);

            $fetched_result = $this->execute_fetch();
            $this->end_statement();

            if ($fetched_result) {
                $successful = true;
                $data = $fetched_result;
            }

            return [
                'successful' => $successful,
                'data' => $data,
            ];
        }

        public function get_admin_by_username_and_password($request) {
            $data = null;

            $this->get_admin_by_username_and_password_imp($request);

            $fetched_result = $this->execute_fetch();
            $this->end_statement();

            if ($fetched_result) {
                $data = $fetched_result;
            }

            return $data;
        }

        private function get_admin_by_username_and_password_imp($request) {
            $username = $request['username'];
            $password = $request['password'];

            $query = 'SELECT id, last_name, first_name, username, role
                    FROM administrators
                    WHERE username = :username AND password = :password';

            $this->start_statement($query);
            
            $this->bind_value(":username", $username);
            $this->bind_value(":password", md5($password));
        }

        public function get_by_id($id) {
            $data = null;
            
            $this->get_by_id_imp($id);

            $fetched_result = $this->execute_fetch();
            $this->end_statement();

            if ($fetched_result) {
                $data = $fetched_result;
            }

            return $data;
        }

        private function get_by_id_imp($id) {
            $query = 'SELECT id, last_name, first_name, username, role
                    FROM administrators
                    WHERE id = :id';

            $this->start_statement($query);
            
            $this->bind_value(":id", $id);
        }

        public function store_auth_cookie($request) {
            $user_id = $request['user_id'];
            $cookie_value = $request['cookie_value'];

            $query = 'INSERT INTO auth_cookies VALUES (null, :cookie_value, :user_id)';

            $this->start_statement($query);
            
            $this->bind_value(":cookie_value", $cookie_value);
            $this->bind_value(":user_id", $user_id);

            $fetched_result = $this->execute();
            $this->end_statement();

            $query = 'SELECT * FROM auth_cookies WHERE cookie_value = :cookie_value AND user_id = :user_id';

            $this->start_statement($query);
            
            $this->bind_value(":cookie_value", $cookie_value);
            $this->bind_value(":user_id", $user_id);

            $fetched_result = $this->execute_fetch();
            $this->end_statement();

            if ($fetched_result) {
                $data = $fetched_result;
            }

            return $data;
        }

        public function get_user_using_cookie($cookie_value) {
            $query = 'SELECT ad.id, last_name, first_name, username, role
                    FROM administrators ad, auth_cookies ac
                    WHERE ad.id = ac.user_id AND cookie_value = :cookie_value';

            $this->start_statement($query);
            
            $this->bind_value(":cookie_value", $cookie_value);

            $fetched_result = $this->execute_fetch();
            $this->end_statement();

            if ($fetched_result) {
                $data = $fetched_result;
            }

            return $data;
        }
    }

?>
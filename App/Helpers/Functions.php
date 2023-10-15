<?php
    function redirect($location) {
        header("Location: ".$location);
    }

    function generate_random_string($length) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $random_string = '';
    
        for ($i = 0; $i < $length; $i++) {
            $random_string .= $characters[rand(0, strlen($characters) - 1)];
        }
    
        return $random_string;
    }

    function parse_to_datatable_columns($columns) {
        $result = [];

        foreach ($columns as $key => $value) {
            array_push($result, ['title' => $value]);
        }

        return $result;
    }

    function array_to_csv($array) {
        $result = '';
        
        foreach ($array as $key => $value) {
            if ($key !== 0) {
                $result .= ',';
            }

            $result .= $value;
        }

        return $result;
    }

    function csv_to_array($csv) {
        $result = explode(',', $csv);

        return $result;
    }

    function get_field_label($field_labels, $key) {
        $result = $key;

        /**
         * Get the field label if there is any.
         * Else, set its value as the key.
         * For the validation error field labeling.
         */
        if (array_key_exists($key, $field_labels)) {
            $result = $field_labels[$key];
        }

        return $result;
    }

    function validate($data = [], $validations = [], $field_labels = []) {
        $errors = [];

        foreach ($data as $key => $value) {
            $field_errors = [];

            /**
             * Get the field label if there is any.
             * Else, set its value as the key.
             * For the validation error field labeling.
             */
            $field_label = get_field_label($field_labels, $key);

            if (array_key_exists($key, $validations)) {
                // Destructure of string value;
                $validation = explode('|', $validations[$key]);
                
                if (in_array('required', $validation)) {
                    // Checking of the required field.

                    if (empty(trim($value))) {
                        $error = $field_label.' is required.';
                        array_push($field_errors, $error);
                    }
                }

                if (!empty(trim($value)) || in_array('required', $validation)) {
                    /**
                     * Further validation if the field is required or
                     * if it has a value even not required.
                     */

                    foreach ($validation as $validation_key => $validation_value) {
                        if (str_contains($validation_value, 'char_min:')) {
                            // Checking of the character's minimum length.
                            $min_value = explode(':', $validation_value)[1];
    
                            if (strlen(trim($value)) < $min_value) {
                                $error = $field_label.' must be at min of '.$min_value.' characters.';
                                array_push($field_errors, $error);
                            }
                        }
    
                        if (str_contains($validation_value, 'char_max:')) {
                            // Checking of the character's maximum length.
                            $max_value = explode(':', $validation_value)[1];
    
                            if (strlen(trim($value)) > $max_value) {
                                $error = $field_label.' must be at max of '.$max_value.' characters.';
                                array_push($field_errors, $error);
                            }
                        }
                    }
                    
                    if (in_array('phone', $validation)) {
                        // Checking of the valid phone number.
                        $phone_digits = 11;

                        if (strlen(trim($value)) != $phone_digits) {
                            $error = $field_label.' must be at exact '.$phone_digits.' digits.';
                            array_push($field_errors, $error);
                        }
                        
                        if (!preg_match('/09[0-9]+/', $value)) {
                            $error = $field_label.' must be a valid phone number.';
                            array_push($field_errors, $error);
                        }
                    }
                    
                    if (in_array('email', $validation)) {
                        // Checking of the valid email address.

                        if (!preg_match('/^[A-Za-z0-9._%-]+@[A-Za-z0-9-]{2,}\.[A-Za-z.]{2,}$/', $value)) {
                            $error = $field_label.' must be a valid email address.';
                            array_push($field_errors, $error);
                        }
                    }
                }
            }

            if (count($field_errors) > 0) {
                $errors[$key] = $field_errors;
            }
        }
        
        $status = count($errors) == 0 ? 'SUCCESS' : 'FAILED';

        $validation_results = [
            'data' => $data,
            'errors' => $errors,
            'status' => $status,
        ];

        return $validation_results;
    }
?>
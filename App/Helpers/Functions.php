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

    function validate($data = [], $validations = []) {
        $errors = [];

        $index = 0;
        foreach ($data as $key => $value) {
            $field_errors = [];

            if (array_key_exists($key, $validations)) {
                $validation = explode('|', $validations[$key]);
                
                if (in_array('required', $validation)) {
                    if (empty(trim($value))) {
                        $error = $key.' is required';
                        array_push($field_errors, $error);
                    }
                }

                foreach ($validation as $validation_key => $validation_value) {
                    if (str_contains($validation_value, 'char_min')) {
                        $min_value = explode(':', $validation_value)[1];

                        if (strlen(trim($value)) < $min_value) {
                            $error = $key.' must be at min of '.$min_value.' characters';
                            array_push($field_errors, $error);
                        }
                    }

                    if (str_contains($validation_value, 'char_max')) {
                        $max_value = explode(':', $validation_value)[1];

                        if (strlen(trim($value)) > $max_value) {
                            $error = $key.' must be at max '.$max_value.' characters';
                            array_push($field_errors, $error);
                        }
                    }
                }
            }

            array_push($errors, $field_errors);

            $index++;
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
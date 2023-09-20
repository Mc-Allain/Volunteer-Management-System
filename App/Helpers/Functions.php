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
?>
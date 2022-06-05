<?php

    /*
    *   HELPER FILE
    *   this file contains functions to simplify system use
    */

    function ajaxres($value){
        return json_encode(array("status" => $value));
    }

    function numshort($n, $prefix = 1){
        if ($n < 900) {
            $n_format = number_format($n, $precision);
            $suffix = '';
        } else 
        if ($n < 900000) {
            $n_format = number_format($n / 1000, $precision);
            $suffix = ' Rb';
        } else 
        if ($n < 900000000) {
            $n_format = number_format($n / 1000000, $precision);
            $suffix = ' Jt';
        } else 
        if ($n < 900000000000) {
            $n_format = number_format($n / 1000000000, $precision);
            $suffix = ' M';
        } else {
            $n_format = number_format($n / 1000000000000, $precision);
            $suffix = ' T';
        }

        if($prefix > 0){
            $dotzero = '.'. str_repeat( '0', $prefix );
            $n_format = str_replace( $dotzero, '', $n_format );
        }
        return $n_format . $suffix;
    }

    function sizeshort($size){
        $units = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        $power = $size > 0 ? floor(log($size, 1024)) : 0;
        return number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
    }

    function unique_file($path, $filename) {
        $file_parts = explode(".", $filename);
        $ext = array_pop($file_parts);
        $name = implode(".", $file_parts);

        $i = 1;
        while (file_exists($path . $filename)) {
            $filename = $name . '-' . ($i++) . '.' . $ext;
        }
        return $filename;
    }

    /*
    *   follow me : 
    *   - https://www.facebook.com/refkinscallv
    *   - https://www.github.com/refkinscallv
    *   - http://refkinscallv.site/
    */
<?php

    /*
    *   HELPER FILE
    *   this file contains functions to simplify system use
    */

    function query($sql){
        global $_db;

        return mysqli_query($_db, $sql);
    }

    function query_object($sql){
        global $_db;

        $query  = mysqli_query($_db, $sql);
        while($data = mysqli_fetch_object($query)){
            $result[] = $data;
        }

        return $result;
    }

    function redirect($url){
        echo "<script>window.location.href='". $url ."'</script>";
    }

    function setdata($cookie_name, $cookie_value, $cookie_time = 86400){
        return setcookie($cookie_name, $cookie_value, time()+$cookie_time, "/");
    }

    function unsetdata($cookie_name){
        return setcookie($cookie_name, "", time()-3600, "/");
    }

    function thisalert($alert_status, $alert_message){
        switch($alert_status){
            case "0" :
                echo "<script>Swal.fire({title: 'Kesalahan', html: '";
                include "alert.php";
                echo "', icon: 'error', confirmButtonText: 'Tutup', confirmButtonColor: '#dc3545'});</script>";
                break;
            case "1" :
                echo "<script>Swal.fire({title: 'Sukses', html: '";
                include "alert.php";
                echo "', icon: 'success', confirmButtonText: 'Ok', confirmButtonColor: '#198754'});</script>";
                break;
            default : echo "<script>console.error('alert not set 0')</script>"; break;
        }
    }

    function form_validate($_formval, $_formtype, $_formlength = 6){

        switch($_formtype){
            case "alpha"                : 
                if(!preg_match("/^[a-zA-Z\s_-]+$/", $_formval)){
                    $result = "regex";
                } else {
                    $result = $_formval;
                }
                break;
            case "numeric"              : 
                if(!preg_match("/^[0-9-' ]*$/", $_formval)){
                    $result = "regex";
                } else {
                    $result = $_formval;
                }
                break;
            case "length"               : 
                if(strlen($_formval) < $_formlength){
                    $result = "length";
                } else {
                    $result = $_formval;
                }
                break;
            case "email"                : 
                if(!filter_var($_formval, FILTER_VALIDATE_EMAIL)){
                    $result = "regex";
                } else {
                    $result = $_formval;
                }
                break;
            case "alpha-length"         : 
                if(strlen($_formval) < $_formlength){
                    $result = "length";
                } else {
                    if(!preg_match("/^[a-zA-Z\s_-]+$/", $_formval)){
                        $result = "regex";
                    } else {
                        $result = $_formval;
                    }
                }
                break;
            case "numeric-length"       : 
                if(strlen($_formval) < $_formlength){
                    $result = "length";
                } else {
                    if(!preg_match("/^[0-9-' ]*$/", $_formval)){
                        $result = "regex";
                    } else {
                        $result = $_formval;
                    }
                }
                break;
            case "alpha-numeric"        : 
                if(!preg_match("/^[a-zA-Z0-9\s_-]+$/", $_formval)){
                    $result = "regex";
                } else {
                    $result = $_formval;
                }
                break;
            case "alpha-numeric-length" : 
                if(strlen($_formval) < $_formlength){
                    $result = "length";
                } else {
                    if(!preg_match("/^[a-zA-Z0-9\s_-]+$/", $_formval)){
                        $result = "regex";
                    } else {
                        $result = $_formval;
                    }
                }
                break;
        }

        return $result;
    }

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
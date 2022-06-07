<?php

    /*
    *
    *   UTILITY FILE
    *   this file contains function for determine result on system and main function
    *
    */

    // Interface
    function model_post($path, $table = "", $type = "", $data = ""){
        // make sure $data contains value with object type
        if($table == "" || $table == 0 || $table == null){
            echo "System Error : table is not set for post data";
        } else {
            switch($type){
                case "insert" : return require "models/post/". $path .".php"; break;
                case "update" : return require "models/post/". $path .".php"; break;
                case "delete" : return require "models/post/". $path .".php"; break;
                default       : echo "System Error : invalid post data execution type";
            }
        }
    }

    function model_get($path){
        // make sure $data contains value with object type
        return require "models/get/". $path .".php";
    }

    function view($path, $data = ""){
        require "views/template/start.php";
        require "views/". $path .".php";
        require "views/template/end.php";
    }

    function controller($path){
        require "controllers/". $path .".php";
    }

    // MySQL
    function query($sql){
        global $_db;

        return mysqli_query($_db, $sql);
    }

    function query_object($sql){
        global $_db;

        $query  = mysqli_query($_db, $sql);
        while($data = mysqli_fetch_assoc($query)){
            $result = (object) $data;
        }

        return $result;
    }

    // Direction
    function redirect($url){
        echo "<script>window.location.href='". $url ."'</script>";
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

    // Session
    function setdata($cookie_name, $cookie_value, $cookie_time = 86400){
        return setcookie($cookie_name, $cookie_value, time()+$cookie_time, "/");
    }

    function unsetdata($cookie_name){
        return setcookie($cookie_name, "", time()-3600, "/");
    }

    // Security
    function form_validate($form_val, $form_type, $form_length = 6){

        switch($form_type){
            case "alpha"                : 
                if(!preg_match("/^[a-zA-Z\s_-]+$/", $form_val)){
                    $result = "regex";
                } else {
                    $result = $form_val;
                }
                break;
            case "numeric"              : 
                if(!preg_match("/^[0-9-' ]*$/", $form_val)){
                    $result = "regex";
                } else {
                    $result = $form_val;
                }
                break;
            case "length"               : 
                if(strlen($form_val) < $form_length){
                    $result = "length";
                } else {
                    $result = $form_val;
                }
                break;
            case "email"                : 
                if(!filter_var($form_val, FILTER_VALIDATE_EMAIL)){
                    $result = "regex";
                } else {
                    $result = $form_val;
                }
                break;
            case "alpha-length"         : 
                if(strlen($form_val) < $form_length){
                    $result = "length";
                } else {
                    if(!preg_match("/^[a-zA-Z\s_-]+$/", $form_val)){
                        $result = "regex";
                    } else {
                        $result = $form_val;
                    }
                }
                break;
            case "numeric-length"       : 
                if(strlen($form_val) < $form_length){
                    $result = "length";
                } else {
                    if(!preg_match("/^[0-9-' ]*$/", $form_val)){
                        $result = "regex";
                    } else {
                        $result = $form_val;
                    }
                }
                break;
            case "alpha-numeric"        : 
                if(!preg_match("/^[a-zA-Z0-9\s_-]+$/", $form_val)){
                    $result = "regex";
                } else {
                    $result = $form_val;
                }
                break;
            case "alpha-numeric-length" : 
                if(strlen($form_val) < $form_length){
                    $result = "length";
                } else {
                    if(!preg_match("/^[a-zA-Z0-9\s_-]+$/", $form_val)){
                        $result = "regex";
                    } else {
                        $result = $form_val;
                    }
                }
                break;
        }

        return $result;
    }

    /*
    *   follow me : 
    *   - https://www.facebook.com/refkinscallv
    *   - https://www.github.com/refkinscallv
    *   - http://refkinscallv.site/
    */
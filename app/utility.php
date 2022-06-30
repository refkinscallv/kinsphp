<?php

    /*
    *
    *   UTILITY FILE
    *   this file contains function for determine result on system and main function
    *
    */

    // Interface
    function view($path, $data = ""){
        global $app;
        global $local;
        
        require "views/template/start.php";
        require "views/". $path .".php";
        require "views/template/end.php";
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

    function query_insert($table, $data){
        global $_db;

        foreach($data as $data_key => $data_val){
            $key[]      = $data_key;
            $value[]    = $data_val;
        }
    
        $extract_key    = implode(",", $key);
        $extract_value  = implode(",", $value);
    
        $query_insert = mysqli_query($_db, "INSERT INTO $table ($extract_key) VALUES ($extract_value)");
    
        if($query_insert){
            return true;
        } else {
            return false;
        }
    }

    function query_update($table, $data, $id){
        global $_db;

        foreach($data as $data_key => $data_val){
            $result[]      = "$data_key = '$data_val'";
        }

        $result_value   = implode(", ", $result);
        $result_idkey   = array_keys($id);
        $result_idval   = array_values($id);
    
        $query_update = mysqli_query($_db, "UPDATE $table SET $result_value WHERE $result_idkey[0] = '$result_idval[0]'");
    
        if($query_update){
            return true;
        } else {
            return false;
        }
    }

    function query_delete($table, $id){
        global $_db;

        $result_idkey   = array_keys($id);
        $result_idval   = array_values($id);
    
        $query_delete = mysqli_query($_db, "DELETE FROM $table WHERE $result_idkey[0] = '$result_idval[0]'");
    
        if($query_delete){
            return true;
        } else {
            return false;
        }
    }

    // Direction
    function redirect($url){
        echo "<script>window.location.href='". $url ."'</script>";
    }

    function thisalert($alert_status, $alert_message){
        switch($alert_status){
            case "0" :
                echo "<script>Swal.fire({html: '";
                include "alert.php";
                echo "', icon: 'error', confirmButtonText: 'Close', confirmButtonColor: '#dc3545'});</script>";
                break;
            case "1" :
                echo "<script>Swal.fire({html: '";
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

    function check_validate($value){
        foreach($value as $extract){
            $result[] = $extract;
        }

        if(in_array("regex", $result) || in_array("length", $result)){
            return false;
        } else {
            return true;
        }
    }

    /*
    *   follow me : 
    *   - https://www.facebook.com/refkinscallv
    *   - https://www.github.com/refkinscallv
    *   - http://refkinscallv.site/
    */
<?php

    /*
    *   MIDDLE FILE
    *   this file contains the database transfer flow in the form of commands from scripts
    *   to send and receive data
    */

    $receive_dir = "app/receive/";
    $send_dir = "app/send/";

    foreach(scandir($receive_dir) as $receive_files){
        $receive_lists = $receive_dir . $receive_files;
        if($receive_lists != $receive_dir . "index.php"){
            if(is_file($receive_lists)){
                require $receive_lists;
            }
        }
    }

    foreach(scandir($send_dir) as $send_files){
        $send_lists = $send_dir . $send_files;
        if($send_lists != $send_dir . "index.php"){
            if(is_file($send_lists)){
                require $send_lists;
            }
        }
    }

    /*
    *   follow me : 
    *   - https://www.facebook.com/refkinscallv
    *   - https://www.github.com/refkinscallv
    *   - http://refkinscallv.site/
    */
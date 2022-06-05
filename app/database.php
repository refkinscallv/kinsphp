<?php

    /*
    *   DATABASE FILE
    *   this file contains link/to enable database
    */

    if($db->stat == "inactive"){
        echo "<script>console.error('Database Is Not Active')</script>";
    } else {
        $_db    = mysqli_connect($db->host, $db->user, $db->pass, $db->name);

        if(!$_db){
            echo "Database Errno : ". mysqli_connect_errno() ."<br />";
            echo "Database Error : ". mysqli_connect_error() ."<br />";
        }

        $charset    = mysqli_set_charset($_db, $db->char);
        if(!$charset){
            echo "Database Charset Errno : ". mysqli_errno($_db) ."<br />";
            echo "Database Charset Error : ". mysqli_error($_db);
        }
    }

    /*
    *   follow me : 
    *   - https://www.facebook.com/refkinscallv
    *   - https://www.github.com/refkinscallv
    *   - http://refkinscallv.site/
    */
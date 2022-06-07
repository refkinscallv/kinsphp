<?php

    /*
    *
    *   CONFIG FILE
    *   this file contains an application initializer containing the credentials of the initial
    *   like database, application, user session and library keys
    *
    *   function with object value that can be called directly
    *
    */

    function session_setup(){
        $sess       = (object) array(
            "set"   => "kinsphp",
            "user"  => isset($_COOKIE["kinsphp"])? $_COOKIE["kinsphp"] : 0
        );

        return $sess;
    }

    function database_setup(){
        $database   = (object) array(
            "host"  => "localhost",
            "user"  => "root",
            "pass"  => "",
            "name"  => "",
            "char"  => "utf8",
            "stat"  => "active"
        );

        return $database;
    }

    function application_setup(){
        $application    = (object) array(
            "name"      => "kinsPHP",
            "url"       => "http://localhost",
            "desc"      => "",
            "keyword"   => "",
            "icon"      => "",
            "logo"      => ""
        );

        return $application;
    }

    $local  = session_setup();
    $app    = application_setup();
    $db     = database_setup();

    /*
    *   follow me : 
    *   - https://www.facebook.com/refkinscallv
    *   - https://www.github.com/refkinscallv
    *   - http://refkinscallv.site/
    */
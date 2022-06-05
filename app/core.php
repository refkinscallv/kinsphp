<?php

    /*
    *   CORE FILE
    *   this file contains function for determine result on index
    */

    // function load($data = ""){
    //     require "app/routes.php";
    // }

    function view($path, $data = ""){
        include "views/template/start.php";
        include "views/". $path .".php";
        include "views/template/end.php";
    }

    /*
    *   follow me : 
    *   - https://www.facebook.com/refkinscallv
    *   - https://www.github.com/refkinscallv
    *   - http://refkinscallv.site/
    */
<?php

    /*
    *   CORE FILE
    *   this file contains function for determine result on index
    */

    function load($data){
        view("home/index");
    }

    function view($path, $data = ""){
        include "views/". $path .".php";
    }

    /*
    *   follow me : 
    *   - https://www.facebook.com/refkinscallv
    *   - https://www.github.com/refkinscallv
    *   - http://refkinscallv.site/
    */
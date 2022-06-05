<?php

    /*
    *   CORE FILE
    *   this file contains function for determine result on index
    */

    function load($data = ""){
        if(isset($_GET["pages"])){
            switch($_GET["pages"]){
                case "" : view(""); break;
            }
        } else {
            view("home/index");
        }
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
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
            view("home/index", $data);
        }
    }

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
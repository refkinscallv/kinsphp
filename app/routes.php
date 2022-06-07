<?php

    /* 
    *
    *   ROUTES FILE
    *   This file contains website mappings to determine user interface requirements for viewing pages
    *
    *   uses the switch function and can use an if else branch to define the condition, 
    *   then call the file in the "controller" folder. 
    *   Likewise, the file controller can use the switch function for switching as needed
    *
    *   don't forget to always use "htaccess" to setup the page
    *
    */

    if(isset($_GET["pages"])){
        switch($_GET["pages"]){
            case "" : include "controllers/.php"; break;
        }
    } else {
        include "controllers/index.php";
    }
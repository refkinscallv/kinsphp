<?php 
    
    // call system mainframe
    require "app/run.php";

    // load the main condition in the load() function from index
    // can modify the contents of the app/core.php file

    $load_data = (object) array(
        "name"  => $app->name,
        "url"   => $app->url
    );

    load($load_data);

    /*
    *   follow me : 
    *   - https://www.facebook.com/refkinscallv
    *   - https://www.github.com/refkinscallv
    *   - http://refkinscallv.site/
    */
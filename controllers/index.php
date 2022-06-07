<?php

    // use the model_get for get data from database
    // $variable   = model_get("index");

    // $data   = (object) array(
    //     "key"  => $variable->value,
    //     "key"  => $variable->value,
    //     "key"  => $variable->value,
    //     "key"  => $variable->value
    // );

    $data   = (object) array(
        "name"  => $app->name,
        "url"   => $app->url
    );

    view("home/index", $data);
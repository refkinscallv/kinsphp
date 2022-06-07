<?php

    $data   = (object) array(
        "name"  => $app->name,
        "url"   => $app->url
    );

    view("home/index", $data);
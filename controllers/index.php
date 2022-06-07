<?php

    // Sample Get Data
    /* 
    *
    *    $query   = query_object("SELECT * FROM sample WHERE id = 1");
    *
    *    $data   = (object) array(
    *        "key1"  => $query->value1,
    *        "key2"  => $query->value2,
    *        "key3"  => $query->value3,
    *        "key4"  => $query->value4
    *    );
    *
    */

    // Sample Post Data
    /*
    *
    *    if(isset($_POST["button"])){
    *        $data   = array(
    *            "sample1"    => $_POST["sample1"],
    *            "sample2"    => $_POST["sample2"],
    *            "sample3"    => $_POST["sample3"]
    *        );
    *
    *       # INSERT
    *       $query = query_insert("YOUR TABLE DATABASE", $data);
    *
    *       # UPDATE
    *       $query = query_update("YOUR TABLE DATABASE", $data, array("id" => $id));
    *
    *       # DELETE
    *       $query = query_update("YOUR TABLE DATABASE", array("id" => $id));
    *
    *        if($query){
    *            echo "success";
    *        } else {
    *            echo "failed";
    *        }
    *    }
    *
    */

    $data   = (object) array(
        "title"  => $app->name,
        "url"   => $app->url
    );

    view("home/index", $data);
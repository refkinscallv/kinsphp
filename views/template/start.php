<!doctype html>
<html>
<head>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title><?= $app->name ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?= $app->url ?>/assets/css/basic.css" />
    <link rel="stylesheet" href="<?= $app->url ?>/assets/css/main.css" />
    <script src="https://kit.fontawesome.com/7307807463.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<?php
    if(isset($_GET["alert"])){
        $alert_item = explode("-", $_GET["alert"], 2);
        
        echo '<body class="bg-light">';
        thisalert($alert_item[0], $alert_item[1]);
    } else {
        echo '<body class="bg-light">';
    }
?>
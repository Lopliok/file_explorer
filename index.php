<!DOCTYPE html>

<html lang="cs-cz">
    <head>
            <meta charset="utf-8" />
            <title>Explorer</title>
            <style>
            h1 {
                color: #0062BF;
                text-align: center;
                text-shadow: 0px 0px 6px #AAAAAA;
              }
              .ikona {
                display: inline-block;
                text-align: center;
                margin: 10px;
              }
            #explorer td {
                width: 40px;
                height: 30px;
                -border-style: solid;
              }

            #explorer {
                margin: 0 auto;
              }

            #explorer img {
                border: 1px solid gray;
                padding: 6px;
                box-shadow: 3px 3px 6px #999999;
                margin-right: 6px;
              }

            #explorer img:hover {
                opacity: 0.7;
              }

            </style>
    </head>

    <body>
        <h1>Průzkumník souborů</h1>

<?php
require_once('autoloader.php');

if (!$_GET) {
  $_GET['slozka'] = "folder";
}



$slozka = new Explorer($_GET['slozka'], 8);

$slozka->nacti();

$slozka->vypis();

?>

</body>
</html>

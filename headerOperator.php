<?php
/**
 * Created by PhpStorm.
 * User: vladislavakopalova
 * Date: 7.10.18
 * Time: 21:01
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $title; ?> </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="js/js.js" type="text/javascript"></script>
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="jquery.tabledit.js"></script>
    <link rel="stylesheet" href="css/design.css">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.8/themes/base/jquery-ui.css" type="text/css" media="all" />
    <link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/css" media="all" />


</head>
<body>
<!--HLAVICKA-->


<nav class="navbar navbar-inverse">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!--<a class="navbar-brand" href="#"><img src="" style="width: 20px"></a>-->
        </div>
        ﻿

        <div class="collapse navbar-collapse" ID="myNavbar">
            <h1 align="center">Informačný systém AČ </h1>
            <ul class="nav navbar-nav navbar">
                <li class="active"><a href="formularKlienta.php">Pridaj klienta</a></li>
                <li><a href="zoznamKlientov.php">Zoznam klientov</a></li>
                <li><a href="editKlienta.php">Edituj/Zmaž klienta</a></li>

                <li><a href="formularPoskytovatela.php">Pridaj poskytovatela</a></li>
                <li><a href="zoznamPoskytovatelov.php">Zoznam poskytovateľov</a></li>
                <li><a href="">Edituj/Zmaž poskytovateľa</a></li>
            </ul>
                <ul class="nav navbar-nav navbar-right">
                    <button type="button" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-user"></span><a href="terminal.php"> Odhlasenie</a>
                    </button>
                </ul>

                <!-- <li><a href="formularPoskytovatela.php">Pridaj poskytovateľa</a></li>
                 <li><a href="zoznamPoskytovatelov.php">Zoznam poskytovateľov</a></li>-->
            </ul>
        </div>
    </div>
</nav>



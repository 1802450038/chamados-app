<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../res/_css/index.css">
    <link rel="stylesheet" href="../../res/_css/menu-bar.css">
    <link rel="stylesheet" href="../../res/_css/simple-grid.min.css">
    <link rel="stylesheet" href="../../res/_css/form.css">
    <link rel="stylesheet" href="../../res/_css/entity-list.css">
    <link rel="stylesheet" href="../../res/_css/table.css">
    <link rel="stylesheet" href="../../res/_css/card.css">
    <link rel="stylesheet" href="../../res/_css/entity-profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>

<body>
    <div class="header">

        <div class="logo">
            <a href="/admin">
                <img src="../../res/_assets/_contentimg/logo_mobile.png" alt="" srcset="" class="logo-img">
                
            </a>
        </div>

        <div class="logo-mobile">
            <a href="/admin">
                <img src="../../res/_assets/_contentimg/logo_branca.png" alt="" srcset="" class="logo-img">
                
            </a>
        </div>
        <div class="title">
            <h1 class="title-page">Chamados</h1>
            <h3 class="sub-title-page">App</h3>
        </div>
    </div>

    <div class="mobile-nav">
        <div>
            <a href="/admin/calls">
                <i class="fas fa-phone-volume"></i>
            </a>
        </div>
        <div>
            <a href="/admin/computers">
                <i class="fas fa-desktop"></i>
            </a>
        </div>
        <div>
            <a href="/admin">
                <i class="fas fa-house"></i>
            </a>
        </div>
        <div>
            <a class="user" href="/admin/os-computers">
                <i class="fas fa-list-check"></i>
            </a>
        </div>
        <div>
            <a href="/admin/computer/barcode">
                <i class="fas fa-barcode"></i>
            </a>
        </div>
        <div>
            <a href="" id="user-link">
                <i class="fas fa-user"></i>
            </a>
        </div>
    </div>


    <div class="hide-info" id="hide-info">
        <?php echo getUserId(); ?>  
    </div>



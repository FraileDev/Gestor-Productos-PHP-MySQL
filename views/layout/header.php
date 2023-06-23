<!DOCTYPE html>
<html>
    <head>
        <title>Mi tienda</title>
        <meta charset="UTF-8">    
        <link rel="stylesheet" href="<?=BASE_URL?>assets/css/styles1.css"/>
        <script src="https://kit.fontawesome.com/5c51b5b94a.js"></script>
    </head>
    <body>
        <div id="container">
            <!--Encabezado-->
            <header id="header">
                <div id="logo">
                    <img src="<?=BASE_URL?>assets/img/logo.png" alt="ClickShop"/>
                    <a href="<?=BASE_URL?>">Tienda por departamento</a>
                </div>                
            </header>
            <!--Menú-->
            <nav id="menu">
                <ul>
                    <li><a href="<?=BASE_URL?>producto/view">Inicio</a></li>
                    <li><a href="<?=BASE_URL?>categoria/index">Caregorías</a></li>
                    <li><a href="<?=BASE_URL?>marca/index">Marcas</a></li>
                    <li><a href="<?=BASE_URL?>producto/index">Productos</a></li>
                </ul>
            </nav>
            <main id="contenido">
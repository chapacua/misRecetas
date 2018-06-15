<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mis Recetas</title>
    <!--Import materialize.css-->
    <link rel="stylesheet" href="<?php echo base_url('application/views/public/node_modules/materialize-css/dist/css/materialize.min.css'); ?>">
    <!-- Estilos propios -->
    <link rel="stylesheet" href="<?php echo base_url('application/views/public/css/main.css'); ?>">
    <script src="<?php echo base_url('application/views/public/node_modules/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('application/views/public/node_modules/materialize-css/dist/js/materialize.min.js');?>"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <script src="<?php echo base_url('application/views/public/js/main.js');?> "></script>
    <script>
        $(document).ready(function(){
            $('.tabs').tabs();
        });         
    </script>
</head>
<body>
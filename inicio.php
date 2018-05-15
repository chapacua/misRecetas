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
    <link rel="stylesheet" href="node_modules\materialize-css\dist\css\materialize.min.css">
    <!-- Estilos propios -->
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <!--Contenedor General-->
    <nav>
        <div class="nav-wrapper red">
        <a href="#" class="brand-logo">Mis Recetas</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><i class="material-icons left">assignment_ind</i>Alejandro Velasco Soto</li>
            <li><i class="material-icons">more_vert</i></li>
            <li><a href="#">Salir</a></li>
        </ul>
        </div>    
    </nav>
  
    <div class="container">
        <div class="row">
            <div class="col s6 m4">
                <div class="card grey darken-1">
                    <div class="card-content white-text">
                    <span class="card-title">Administrar Usuarios</span>
                    </div>
                    <div class="card-action">
                    <a href="#" class="white-text">Ver</a>
                    </div>            
                </div>
            </div>
            <div class="col s6 m4">
                <div class="card grey darken-1">
                    <div class="card-content white-text">
                    <span class="card-title">Gestionar Categorias</span>
                    </div>
                    <div class="card-action">
                    <a href="#" class="white-text">Ver</a>
                    </div>            
                </div>
            </div>
            <div class="col s6 m4">
                <div class="card grey darken-1">
                    <div class="card-content white-text">
                    <span class="card-title">Gestionar Recetas</span>
                    </div>
                    <div class="card-action">
                    <a href="#" class="white-text">Ver</a>
                    </div>            
                </div>
            </div>
        </div>
    </div>
</body>
    <script src="node_modules\jquery\dist\jquery.min.js"></script>
    <script src="node_modules\materialize-css\dist\js\materialize.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <script>
        $(document).ready(function(){
            $('.tabs').tabs();
            $('.sidenav').sidenav();
        });         
    </script>
</html>
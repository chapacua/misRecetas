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
            <div class="col s10 offset-s1">
                <h4>Usuarios Registrados</h4>
                <table class="highlight responsive-table">
                    <thead>
                        <tr>
                            <th>Cedula</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Fecha de Registro</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1040749855</td>
                            <td>Alejandro Velasco</td>
                            <td>alejok.20@gmail.com</td>
                            <td>24/21/2019</td>
                            <td><button class="btn waves red">Eliminar</button></td>
                        </tr>
                    </tbody>
                </table>                
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
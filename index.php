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
    <div class="container">
        <div class="row">
            <div class="col s8 offset-s2 m6 offset-m3">
                <div class="card center-align">
                    <div class="card-image">
                        <img class="activator" src="img/login.jpg">
                        <span class="card-title"><h2 class="center-align">Mis Recetas</h2></span>
                    </div>
                    <div class="card-tabs">
                    <ul class="tabs tabs-fixed-width">
                        <li class="tab"><a href="#ingresar">Ingresar</a></li>
                        <li class="tab"><a href="#registro">Registrarse</a></li>
                    </ul>
                    </div>
                    <div class="card-content grey lighten-4">
                    <div id="ingresar">
                        <div class="row">
                            <form action="" method="post">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input placeholder="ejemplo@dominio.com" id="email" name="email" type="text" class="validate">
                                    <label for="email">Usuario</label>
                                </div> 
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">vpn_key</i>
                                    <input placeholder="Tu contraseña" id="password" name="password" type="password" class="validate">
                                    <label for="password">Contraseña</label>
                                </div>  
                                <div>
                                    <button type="submit" class="waves-effect waves-light btn red"><i class="material-icons right">arrow_forward</i>Ingresar</button>
                                </div>                             
                            </form>                          
                        </div>                       
                    </div>
                    <div id="registro">
                        <div class="row">
                            <form action="" method="post">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">assignment_ind</i>
                                    <input placeholder="12345667" id="email" name="cedula" type="number" class="validate">
                                    <label for="email">Cédula</label>
                                </div>                             
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">border_color</i>
                                    <input placeholder="ejemplo@dominio.com" id="nombre" name="nombre" type="text" class="validate">
                                    <label for="email">Nombre</label>
                                </div>                             
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">assignment_ind</i>
                                    <input placeholder="ejemplo@dominio.com" id="usuario" name="usuario" type="text" class="validate">
                                    <label for="usuario">Usuario</label>
                                </div>                             
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">email</i>
                                    <input placeholder="ejemplo@dominio.com" id="email" name="email" type="email" class="validate">
                                    <label for="email">Email</label>
                                </div> 
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">vpn_key</i>
                                    <input placeholder="Tu contraseña" id="password" name="password" type="password" class="validate">
                                    <label for="password">Contraseña</label>
                                </div>  
                                <div>
                                    <button type="submit" class="waves-effect waves-light btn red"><i class="material-icons right">save</i>Registrarse</button>
                                </div>                             
                            </form>                          
                        </div>                    
                    </div>
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
        });         
    </script>
</html>
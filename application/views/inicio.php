
  <?php
  $tipoSesion = $this->session->userdata('Usu_Rol');
  if ($tipoSesion != 3):?>

    <div class="container">
        <div class="row center-align">
            <div class="col s6 m4">
                <div class="card grey darken-1">
                    <div class="card-content white-text">
                    <span class="card-title">Administrar Usuarios</span>
                    </div>
                    <div class="card-action">
                    <a href="Usuarios/listar" class="white-text">Ingresar</a>
                    </div>            
                </div>
            </div>
            <div class="col s6 m4">
                <div class="card grey darken-1">
                    <div class="card-content white-text">
                    <span class="card-title">Gestionar Categorias</span>
                    </div>
                    <div class="card-action">
                    <a href="Categorias/listar" class="white-text">Ingresar</a>
                    </div>            
                </div>
            </div>
            <div class="col s6 m4">
                <div class="card grey darken-1">
                    <div class="card-content white-text">
                    <span class="card-title">Gestionar Ingredientes</span>
                    </div>
                    <div class="card-action">
                    <a href="Ingredientes/listar" class="white-text">Ingresar</a>
                    </div>            
                </div>
            </div>
            <div class="col s6 m4">
                <div class="card grey darken-1">
                    <div class="card-content white-text">
                    <span class="card-title">Gestionar Recetas</span>
                    </div>
                    <div class="card-action">
                    <a href="Recetas/listar" class="white-text">Ingresar</a>
                    </div>            
                </div>
            </div>            
        </div>
<?php else: ?>
        <div class="row center-align">
            <div class="col s6 m4">
                <div class="card grey darken-1">
                    <div class="card-content white-text">
                    <span class="card-title">Gestionar Recetas</span>
                    </div>
                    <div class="card-action">
                    <a href="Recetas/listar" class="white-text">Ingresar</a>
                    </div>            
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
    <!--Contenedor General-->
<?php if ($this->session->userdata('Usu_Rol')== 1):?>
    <nav>
        <div class="nav-wrapper red">
        <a href="<?php echo base_url('inicio'); ?>" class="brand-logo">Mis Recetas</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><i class="material-icons left">assignment_ind</i><?php echo $this->session->userdata('Usu_Nombre'); ?></li>
            <li><i class="material-icons">more_vert</i></li>
            <li>Administrador</li>
            <li><i class="material-icons">more_vert</i></li>
            <li><a href="<?php echo base_url('salir'); ?>">Salir</a></li>
        </ul>
        </div>    
    </nav>    
<?php else: ?>
    <nav>
        <div class="nav-wrapper red">
        <a href="<?php echo base_url('inicio'); ?>" class="brand-logo">Mis Recetas</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><i class="material-icons left">assignment_ind</i><?php echo $this->session->userdata('Usu_Nombre'); ?></li>
            <li><i class="material-icons">more_vert</i></li>
            <li>Usuario</li>
            <li><i class="material-icons">more_vert</i></li>
            <li><a href="<?php echo base_url('salir'); ?>">Salir</a></li>
        </ul>
        </div>    
    </nav>
<?php endif; ?>
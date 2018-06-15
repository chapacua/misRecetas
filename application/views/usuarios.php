
  
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h4>Administración de usuarios</h4>
                <table class="responsive-table highlight">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Perfil</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <div class="progress hide">
                        <div class="indeterminate"></div>
                    </div>
                    <tbody>
                    <?php foreach ($usuarios as $usuario):?>
                        <? if ($usuario->Usu_Rol != 2): ?>
                        <tr id="tr<?php echo $usuario->Usu_Id; ?>">
                            <td><?php echo $usuario->Usu_Nombre; ?></td>
                            <td><?php echo $usuario->Usu_Correo; ?></td>
                            <td id="rol<?php echo $usuario->Usu_Id; ?>">
                                <?php if ($usuario->Usu_Rol == 1):
                                    $perfil = "Administrador";
                                else:
                                    $perfil = "Usuario";
                                endif;
                                echo $perfil;
                                ?>

                            </td>
                            <td>
                                <a class='dropdown-trigger btn' href='#' data-target='dropdown1'>Acciones</a>                              
                            </td>
                                <!-- Dropdown Structure -->
                                <ul id='dropdown1' class='dropdown-content'>
                                    <li><a href="#!" data-id="<?php echo $usuario->Usu_Id; ?>" class="delete">Eliminar</a></li>
                                    <li><a href="#!" data-id="<?php echo $usuario->Usu_Id; ?>" class="recover">Restablecer contraseña</a></li>
                                    <?php if ($perfil == "Usuario" AND $usuario->Usu_Rol == 2):?>
                                    <li><a href="#!" data-id="<?php echo $usuario->Usu_Id; ?>" class="setAdmin">Volver Administrador</a></li>
                                    <?php endif; ?>
                                </ul>                              
                        </tr>
                            <?php endif; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>                
            </div>
        </div>
    </div>
    <script>  $('.dropdown-trigger').dropdown();</script>
    <script> var base_url = "<?php echo base_url();?>"; </script>
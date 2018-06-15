<!--Contenedor General-->
<div class="container">
    <div class="row">
        <div class="col s8 offset-s2 m6 offset-m3">
            <div class="card center-align">
                <div class="card-image">
                    <img class="activator" src="<?php echo base_url('application/views/public/img/login.jpg');?>">
                    <span class="card-title"><h2 class="center-align">Mis Recetas</h2></span>
                </div>
                <div class="card-tabs">
                <ul class="tabs tabs-fixed-width">
                    <li class="tab"><a href="#ingresar">Ingresar</a></li>
                    <li class="tab"><a href="#registro" class="<?php if (isset($active)) {echo $active;}?>">Registrarse</a></li>
                </ul>
                </div>
                <div class="card-content grey lighten-4">
                <div id="ingresar">
                    <div class="row">
                        <?php if (isset($_GET['success'])):?>
                        <h6>Usted se ha registrado exitosamente.</h6><i class="small material-icons">child_care</i>
                        <? endif;?>                    
                        <?php $args = array('id' => 'form-login'); ?>
                        <?php echo form_open('Administrador/ingreso', $args); ?>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">account_circle</i>
                                <input placeholder="Tu usuario" id="usuario" name="usuario" type="text" class="validate" required="" aria-required="true">
                                <label for="usuario">Usuario</label>
                            </div> 
                            <div class="input-field col s12">
                                <i class="material-icons prefix">vpn_key</i> 
                                <input placeholder="Tu contraseña" id="password" name="password" type="password" class="validate" required="" aria-required="true">
                                <label for="password">Contraseña</label>
                            </div>  
                            <div>
                                <button type="submit" class="waves-effect waves-light btn red"><i class="material-icons right">arrow_forward</i>Ingresar</button>
                            </div>                             
                        <?php echo form_close(); ?>                          
                    </div>                       
                </div>
                <div id="registro">
                    <div class="row">
                        <?php echo form_open('Administrador/registro'); ?>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">assignment_ind</i>
                                <input placeholder="12345667" id="email" name="cedula" type="number" class="validate" value="<?php echo set_value('cedula'); ?>" required="" aria-required="true">
                                <label for="email">Cédula</label>
                                <?php echo form_error('cedula'); ?>
                            </div>                             
                            <div class="input-field col s12">
                                <i class="material-icons prefix">border_color</i>
                                <input placeholder="ejemplo@dominio.com" id="nombre" name="nombre" type="text" class="validate" value="<?php echo set_value('nombre'); ?>" required="" aria-required="true">
                                <label for="email">Nombre</label>
                                <?php echo form_error('nombre'); ?>
                            </div>                             
                            <div class="input-field col s12">
                                <i class="material-icons prefix">assignment_ind</i>
                                <input placeholder="ejemplo@dominio.com" id="usuario" name="usuario" type="text" class="validate" value="<?php echo set_value('usuario'); ?>" required="" aria-required="true">
                                <label for="usuario">Usuario</label>
                                <?php echo form_error('usuario'); ?>
                            </div>                             
                            <div class="input-field col s12">
                                <i class="material-icons prefix">email</i>
                                <input placeholder="ejemplo@dominio.com" id="email" name="email" type="email" class="validate" value="<?php echo set_value('email'); ?>" required="" aria-required="true">
                                <label for="email">Email</label>
                                <?php echo form_error('email'); ?>
                            </div> 
                            <div class="input-field col s12">
                                <i class="material-icons prefix">vpn_key</i>
                                <input placeholder="Tu contraseña" id="password" name="password" type="password" class="validate" value="<?php echo set_value('password'); ?>" required="" aria-required="true">
                                <label for="password">Contraseña</label>
                                <?php echo form_error('password'); ?>
                            </div>  
                            <div>
                                <button type="submit" class="waves-effect waves-light btn red"><i class="material-icons right">save</i>Registrarse</button>
                            </div>                             
                        <?php echo form_close(); ?>                        
                    </div>                    
                </div>
                </div>
            </div>            
        </div>
    </div>
</div>
<?php if (isset($success)):?>
<script>
    $(document).ready(function() {
        M.toast({ html: 'Registro exitoso' });
    });
</script>
<? endif;?>
<script>
    var base_url =  "<?php echo base_url(); ?>";
</script>
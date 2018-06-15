
  
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h4>Administración de categorias</h4>
                <div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
                    <a class="btn-floating btn-large red modal-trigger" href="#modalCreate">
                    <i class="material-icons">add</i>
                    </a>
                </div>                   
                <table class="responsive-table highlight">
                    <thead>
                    <tr>
                        <th>Nombre Categoria</th>
                        <th>Fecha Creación</th>
                        <th>Eliminar</th>
                        <th>Editar</th>
                    </tr>
                    </thead>
                    <div class="progress hide" id="delCat">
                        <div class="indeterminate"></div>
                    </div>
                    <tbody>
                    <?php foreach ($categorias as $categoria):?>
                        <tr id="tr<?php echo $categoria->Cat_Id; ?>">
                            <td><?php echo $categoria->Cat_Nombre; ?></td>
                            <td><?php echo $categoria->Cat_Fecha_Creacion; ?></td>
                            <td>
                                <a class='btn deleteCat white-text text-darken-2 red darken-4' href='#!' data-id="<?php echo $categoria->Cat_Id; ?>" ><i class="material-icons">delete_forever</i></a>                              
                            </td>                             
                            <td>
                                <a class="waves-effect waves-light btn modal-trigger white-text text-darken-2 red darken-2" href="#modal<?php echo $categoria->Cat_Id; ?>"><i class="material-icons">edit</i></a>                              
                            </td>                             
                        </tr>
                            <!-- Modal Structure -->
                        <div id="modal<?php echo $categoria->Cat_Id; ?>" class="modal">
                            <div class="modal-content">
                            <h4>Modificar <?php echo $categoria->Cat_Nombre; ?></h4>
                            <?php echo form_open('Categorias/updateCategoria'); ?>
                                <input type="text" name="Cat_Nombre" value="<?php echo $categoria->Cat_Nombre; ?>" class="validate">
                                <input type="hidden" value="<?php echo $categoria->Cat_Id; ?>" name="Cat_Id">
                                <button type="submit" class="btn white-text text-darken-2  red darken-2">Actualizar</button>
                            <?php echo form_close();?>
                            </div>
                        </div> 
                    <?php endforeach; ?>
                    </tbody>
                </table>                
            </div>
        </div>
    </div>
    <form action=""></form>
            <!-- Modal Structure -->
    <div id="modalCreate" class="modal">
        <div class="modal-content">
        <h4>Creación de categoria</h4>
        <?php $args = array('id' => 'createCat', ); ?>
        <?php echo form_open('Categorias/createCategoria', $args); ?>
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <input type="text" name="Cat_Nombre" class="validate" placeholder="Nombre de la nueva categoría" required aria-required>
                        <!--preloader-->
                        <div class="progress hide" id="createPrel">
                            <div class="indeterminate"></div>
                        </div>
                        <button type="submit" class="btn white-text text-darken-2  red darken-2">Actualizar</button>
                    </div>
                </div>
            </div>
        <?php echo form_close();?>
        </div>
    </div>   
    <script>  $('.dropdown-trigger').dropdown();</script>
    <script>  $('.modal').modal();;</script>
    <script> var base_url = "<?php echo base_url();?>"; </script>
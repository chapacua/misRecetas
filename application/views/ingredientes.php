
  
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h4>Administración de ingredientes</h4>
                <div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
                    <a class="btn-floating btn-large red modal-trigger" href="#modalCreate">
                    <i class="material-icons">add</i>
                    </a>
                </div>    
                <div class="row" id="contenido">         
                <?php if(isset($ingredientes) AND $ingredientes != false):?>
                <?php foreach ($ingredientes as $ingrediente):?>
                <div class="col m4" id="tr<?php echo $ingrediente->Ing_Id; ?>">
                    <div class="card small">
                        <div class="card-image"><?php //echo $ingrediente->Ing_Imagen; ?>
                            <img src="<?php echo base_url('application/views/public/img/ingredientes/').$ingrediente->Ing_Imagen; ?>">
                            <span class="card-title"><?php echo $ingrediente->Ing_Nombre; ?></span>
                        </div>
                        <div class="card-content">
                            <p><?php echo $ingrediente->Ing_Comentario; ?></p>
                        </div>
                        <div class="card-action center-align">
                            <a class='btn deleteIng white-text text-darken-2 red darken-4' href='#!' data-id="<?php echo $ingrediente->Ing_Id; ?>" ><i class="material-icons">delete_forever</i></a>
                            <a class="waves-effect waves-light btn activator white-text text-darken-2 red darken-2" href="#modal<?php echo $ingrediente->Ing_Id; ?>"><i class="material-icons">edit</i></a>                                                          
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i>Editar: <?php echo $ingrediente->Ing_Nombre; ?></span>
                                <?php $args = array('id' => 'createIngre', 'enctype' => 'multipart/form-data'); ?>
                            <?php echo form_open('Ingredientes/updateIngrediente', $args); ?>
                                <div class="container">
                                    <div class="row">
                                        <div class="col s12">
                                            <input type="text" name="Ing_Nombre" class="validate" placeholder="Nombre del nuevo ingrediente" value="<?php echo $ingrediente->Ing_Nombre; ?>" required aria-required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12">
                                            <div class="file-field input-field">
                                                <div class="btn red">
                                                    <span>Imágen del ingrediente</span>
                                                    <input type="file" name="Ing_Imagen">
                                                </div>
                                            </div>
                                        </div>
                                    </div>                
                                    <div class="row">
                                        <div class="col s12">
                                            <label>Categoría</label>
                                            <select class="browser-default" name="Cat_Id">
                                                <option value="<?php echo $ingrediente->Cat_Id;?>" selected><?php echo $ingrediente->Cat_Nombre;?></option>
                                                <?php foreach ($categorias as $categoria):?>
                                                    <option value="<?php echo $categoria->Cat_Id;?>"><?php echo $categoria->Cat_Nombre;?></option>
                                                <?php endforeach; ?>
                                            </select>                
                                        </div>                
                                    </div>
                                    <div class="row">
                                        <div class="col s12">
                                            <textarea id="descripcion" name="Ing_comentario" class="materialize-textarea" data-length="120" placeholder="Realiza una descripción del ingrediente"><?php echo $ingrediente->Ing_Comentario; ?></textarea>
                                            <label for="textarea1">Descripción</label>  
                                            <input type="hidden" value="<?php echo $ingrediente->Ing_Id; ?>" name="Ing_Id">            
                                        </div>                 
                                    </div>
                                        <button type="submit" class="btn white-text text-darken-2 red darken-2">Actualizar</button>
                                </div>
                            <?php echo form_close();?>  
                        </div>
                    </div>
                </div>                                                     
                <?php endforeach; ?>
                <?php else: ?>
                    <h5>No hay resultados para mostrar</h5>
                <?php endif; ?>
                </div>             
            </div>
        </div>
    </div>
    <!-- Modal Structure -->
    <div id="modalCreate" class="modal">
        <div class="modal-content">
        <?php $args = array('id' => 'createIng', 'enctype' => 'multipart/form-data'); ?>
        <?php echo form_open('Ingredientes/createIngrediente', $args); ?>
            <div class="container">
                <h4>Creación de ingrediente</h4>
                <div class="row">
                    <div class="col s12">
                        <input type="text" name="Ing_Nombre" class="validate" placeholder="Nombre del nuevo ingrediente" required aria-required>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <div class="file-field input-field">
                        <div class="btn red">
                            <span>Imágen del ingrediente</span>
                            <input type="file" name="Ing_Imagen">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                        </div>
                    </div>
                </div>                
                <div class="row">
                    <div class="col s12">
                        <label>Categoría</label>
                        <select class="browser-default" name="Cat_Id">
                            <option value="" disabled selected>Elije una categoría</option>
                            <?php foreach ($categorias as $categoria):?>
                                <option value="<?php echo $categoria->Cat_Id;?>"><?php echo $categoria->Cat_Nombre;?></option>
                            <?php endforeach; ?>
                        </select>                
                    </div>                
                </div>
                <div class="row">
                    <div class="col s12">
                        <textarea id="descripcion" name="Ing_comentario" class="materialize-textarea" data-length="120" placeholder="Realiza una descripción del ingrediente"></textarea>
                        <label for="textarea1">Descripción</label>              
                    </div>                 
                </div>
                        <!--preloader-->
                        <div class="progress hide" id="createPrel">
                            <div class="indeterminate"></div>
                        </div>
                        <button type="submit" class="btn white-text text-darken-2 red darken-2">Crear</button>
                    </div>
                </div>
            </div>
        <?php echo form_close();?>
        </div>
    </div>   
    <script>  $('.dropdown-trigger').dropdown();</script>
    <script>  $('.modal').modal();;</script>
    <script> var base_url = "<?php echo base_url();?>"; </script>
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h4>Mis recetas</h4>
                <div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
                    <a class="btn-floating btn-large red modal-trigger" href="#modalCreate">
                    <i class="material-icons">add</i>
                    </a>
                </div>    
                <div class="row" id="contenido">         
                <?php if(isset($misrecetas) AND $misrecetas != false):?>
                <?php foreach ($misrecetas as $receta):?>
                <div class="col m6" id="tr<?php echo $receta->Rec_Id; ?>">
                    <div class="card medium" >
                        <div class="card-image"><?php //echo $ingrediente->Ing_Imagen; ?>
                            <img src="<?php echo base_url('application/views/public/img/recetas/').$receta->Rec_Imagen; ?>">
                            <span class="card-title"><?php echo $receta->Rec_Nombre; ?></span>
                        </div>
                        <div class="card-content">
                        </div>
                        <div class="card-action center-align">
                            <div class="card-tabs">
                                <ul class="tabs tabs-fixed-width">
                                    <li class="tab"><a class="active" href="#descripcion<?php echo $receta->Rec_Id; ?>">Descripción</a></li>
                                    <li class="tab"><a href="#ingredientes<?php echo $receta->Rec_Id; ?>">Ingredientes</a></li>
                                </ul>
                                </div>
                                <div class="card-content grey lighten-4">
                                <div id="descripcion<?php echo $receta->Rec_Id; ?>"><?php echo $receta->Rec_Comentario; ?></div>
                                <div id="ingredientes<?php echo $receta->Rec_Id; ?>">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th>Ingrediente</th>
                                            <th>Cantidad</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php foreach ($receta->ingredientes as $ingrediente): ?>
                                        <tr>
                                            <td><?php echo $ingrediente->Ing_Nombre; ?></td>
                                            <td><?php echo $ingrediente->RIng_Cantidad; ?></td>
                                        </tr>
                                        <?php endforeach; ?>                                        
                                        </tbody>
                                    </table>                                
                                </div>
                            </div>
                            <a class='btn deleteRec white-text text-darken-2 red darken-4' href='#!' data-id="<?php echo $receta->Rec_Id; ?>" ><i class="material-icons">delete_forever</i></a>
                            <a class="waves-effect waves-light btn activator white-text text-darken-2 red darken-2" href="#modal<?php echo $receta->Rec_Id; ?>"><i class="material-icons">edit</i></a>                                                          
                        </div>
                        <div class="card-reveal">
                                <?php $args = array('id' => 'updateRec', 'enctype' => 'multipart/form-data'); ?>
                            <?php echo form_open('Recetas/updateReceta', $args); ?>
                                <div class="container">
                                    <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i>Editar: <?php echo $receta->Rec_Nombre; ?></span>
                                    <div class="row">
                                        <div class="col s12">
                                            <input type="text" name="Rec_Nombre" class="validate" placeholder="Nombre de la receta" value="<?php echo $receta->Rec_Nombre; ?>" required aria-required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12">
                                            <div class="file-field input-field">
                                                <div class="btn red">
                                                    <span>Imágen de la receta</span>
                                                    <input type="file" name="Rec_Imagen">
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                    <hr>            
                                    <h5>Ingredientes</h5>
                                    <div id="Ing_Container-<?php echo $receta->Rec_Id; ?>">
                                    <?php foreach ($receta->ingredientes as $ingredienteOld): ?>
                                    <div class="row" id="Ing-<?php echo $ingredienteOld->RIng_Id;?>">
                                        <div class="col s6">
                                            <select class="browser-default" name="Cat_Id[]">
                                                <option value="<?php echo $ingredienteOld->Ing_Id;?>"  selected><?php echo $ingredienteOld->Ing_Nombre;?></option>
                                                <?php foreach ($ingredientes as $ingrediente):?>
                                                    <option value="<?php echo $ingrediente->Ing_Id;?>"><?php echo $ingrediente->Ing_Nombre;?></option>
                                                <?php endforeach; ?>
                                            </select>                
                                        </div> 
                                        <div class="col s4">
                                            <input type="number" placeholder="Cantidad" class="validate" name="RIng_Cantidad[]" value="<?php echo $ingredienteOld->RIng_Cantidad; ?>">
                                        </div>
                                        <div class="col s2">
                                            <buttton class='btn deleteIngRec white-text text-darken-2 red darken-4' data-ingrediente="<?php echo $ingredienteOld->RIng_Id;?>"><i class="material-icons">delete_forever</i></button>
                                        </div>               
                                    </div>
                                    <?php endforeach; ?>                                          
                                    </div>                                      
                                    <div class="row">
                                        <div class="col m12 center-align">
                                            <buttton class='btn addIng white-text text-darken-2 red' id="<?php echo $receta->Rec_Id; ?>"><i class="material-icons">add</i></button>                                                                                
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col s12">
                                            <textarea id="descripcion" name="Rec_comentario" class="materialize-textarea" data-length="120" placeholder="Realiza una descripción del ingrediente"><?php echo $receta->Rec_Comentario; ?></textarea>
                                            <label for="textarea1">Descripción</label>  
                                            <input type="hidden" value="<?php echo $receta->Rec_Id; ?>" name="Rec_Id">                       
                                        </div>                 
                                    </div>
                                    <!--preloader-->
                                    <div class="progress hide" id="updateRece">
                                        <div class="indeterminate"></div>
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
        <!-- RECETAS OTROS USUARIOS -->
        <div class="row">
            <div class="col s12">
                <h4>Otras recetas</h4>
                <div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
                    <a class="btn-floating btn-large red modal-trigger" href="#modalCreate">
                    <i class="material-icons">add</i>
                    </a>
                </div>    
                <div class="row" id="contenido">         
                <?php if(isset($recetas) AND $recetas != false):?>
                <?php foreach ($recetas as $receta):?>
                <div class="col m6" id="tr<?php echo $receta->Rec_Id; ?>">
                    <div class="card medium" >
                        <div class="card-image"><?php //echo $ingrediente->Ing_Imagen; ?>
                            <img src="<?php echo base_url('application/views/public/img/recetas/').$receta->Rec_Imagen; ?>">
                            <span class="card-title"><?php echo $receta->Rec_Nombre; ?></span>
                        </div>
                        <div class="card-content">
                        </div>
                        <div class="card-action center-align">
                            <div class="card-tabs">
                                <ul class="tabs tabs-fixed-width">
                                    <li class="tab"><a class="active" href="#descripcion<?php echo $receta->Rec_Id; ?>">Descripción</a></li>
                                    <li class="tab"><a href="#ingredientes<?php echo $receta->Rec_Id; ?>">Ingredientes</a></li>
                                </ul>
                                </div>
                                <div class="card-content grey lighten-4">
                                <div id="descripcion<?php echo $receta->Rec_Id; ?>"><?php echo $receta->Rec_Comentario; ?></div>
                                <div id="ingredientes<?php echo $receta->Rec_Id; ?>">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th>Ingrediente</th>
                                            <th>Cantidad</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php foreach ($receta->ingredientes as $ingrediente): ?>
                                        <tr>
                                            <td><?php echo $ingrediente->Ing_Nombre; ?></td>
                                            <td><?php echo $ingrediente->RIng_Cantidad; ?></td>
                                        </tr>
                                        <?php endforeach; ?>                                        
                                        </tbody>
                                    </table>                                
                                </div>
                            </div>
                        </div>
                        <div class="card-reveal">
                                <?php $args = array('id' => 'updateRec', 'enctype' => 'multipart/form-data'); ?>
                            <?php echo form_open('Recetas/updateReceta', $args); ?>
                                <div class="container">
                                    <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i>Editar: <?php echo $receta->Rec_Nombre; ?></span>
                                    <div class="row">
                                        <div class="col s12">
                                            <input type="text" name="Rec_Nombre" class="validate" placeholder="Nombre de la receta" value="<?php echo $receta->Rec_Nombre; ?>" required aria-required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12">
                                            <div class="file-field input-field">
                                                <div class="btn red">
                                                    <span>Imágen de la receta</span>
                                                    <input type="file" name="Rec_Imagen">
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                    <hr>            
                                    <h5>Ingredientes</h5>
                                    <div id="Ing_Container-<?php echo $receta->Rec_Id; ?>">
                                    <?php foreach ($receta->ingredientes as $ingredienteOld): ?>
                                    <div class="row" id="Ing-<?php echo $ingredienteOld->RIng_Id;?>">
                                        <div class="col s6">
                                            <select class="browser-default" name="Cat_Id[]">
                                                <option value="<?php echo $ingredienteOld->Ing_Id;?>"  selected><?php echo $ingredienteOld->Ing_Nombre;?></option>
                                                <?php foreach ($ingredientes as $ingrediente):?>
                                                    <option value="<?php echo $ingrediente->Ing_Id;?>"><?php echo $ingrediente->Ing_Nombre;?></option>
                                                <?php endforeach; ?>
                                            </select>                
                                        </div> 
                                        <div class="col s4">
                                            <input type="number" placeholder="Cantidad" class="validate" name="RIng_Cantidad[]" value="<?php echo $ingredienteOld->RIng_Cantidad; ?>">
                                        </div>
                                        <div class="col s2">
                                            <buttton class='btn deleteIngRec white-text text-darken-2 red darken-4' data-ingrediente="<?php echo $ingredienteOld->RIng_Id;?>"><i class="material-icons">delete_forever</i></button>
                                        </div>               
                                    </div>
                                    <?php endforeach; ?>                                          
                                    </div>                                      
                                    <div class="row">
                                        <div class="col m12 center-align">
                                            <buttton class='btn addIng white-text text-darken-2 red' id="<?php echo $receta->Rec_Id; ?>"><i class="material-icons">add</i></button>                                                                                
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col s12">
                                            <textarea id="descripcion" name="Rec_comentario" class="materialize-textarea" data-length="120" placeholder="Realiza una descripción del ingrediente"><?php echo $receta->Rec_Comentario; ?></textarea>
                                            <label for="textarea1">Descripción</label>  
                                            <input type="hidden" value="<?php echo $receta->Rec_Id; ?>" name="Rec_Id">                       
                                        </div>                 
                                    </div>
                                    <!--preloader-->
                                    <div class="progress hide" id="updateRece">
                                        <div class="indeterminate"></div>
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
    <!-- Modal Structure -->
    <div id="modalCreate" class="modal">
        <div class="modal-content">
        <?php $args = array('id' => 'createRec', 'enctype' => 'multipart/form-data'); ?>
        <?php echo form_open('Recetas/createReceta', $args); ?>
            <div class="container">
                <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i>Editar: <?php echo $receta->Rec_Nombre; ?></span>
                <div class="row">
                    <div class="col s12">
                        <input type="text" name="Rec_Nombre" class="validate" placeholder="Nombre de la receta" required aria-required>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <div class="file-field input-field">
                            <div class="btn red">
                                <span>Imágen de la receta</span>
                                <input type="file" name="Rec_Imagen">
                            </div>
                        </div>
                    </div>
                </div>   
                <hr>            
                <h5>Ingredientes</h5>
                <div id="newIng_Container">
                    <div class="row" id="newIng-1">
                        <div class="col s6">
                            <select class="browser-default" name="Cat_Id[]">
                                <option value=""  selected>Seleccione</option>
                                <?php foreach ($ingredientes as $ingrediente):?>
                                    <option value="<?php echo $ingrediente->Ing_Id;?>"><?php echo $ingrediente->Ing_Nombre;?></option>
                                <?php endforeach; ?>
                            </select>                
                        </div> 
                        <div class="col s4">
                            <input type="number" placeholder="Cantidad" class="validate" name="RIng_Cantidad[]">
                        </div>
                        <div class="col s2">
                            <buttton class='btn white-text text-darken-2 red darken-4'><i class="material-icons">delete_forever</i></button>
                        </div>               
                    </div>                                       
                </div>                                      
                <div class="row">
                    <div class="col m12 center-align">
                        <buttton class='btn addNewIng white-text text-darken-2 red'><i class="material-icons">add</i></button>                                                                                
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col s12">
                        <textarea id="descripcion" name="Rec_comentario" class="materialize-textarea" data-length="120" placeholder="Realiza una descripción del ingrediente"></textarea>
                        <label for="textarea1">Descripción</label>                      
                    </div>                 
                </div>
                <!--preloader-->
                <div class="progress hide" id="updateRece">
                    <div class="indeterminate"></div>
                </div>                                    
                    <button type="submit" class="btn white-text text-darken-2 red darken-2">Crear</button>
            </div>
        <?php echo form_close();?>
        </div>
    </div>   
    <script>  $('.dropdown-trigger').dropdown();</script>
    <script>  $('.modal').modal();;</script>
    <script> var base_url = "<?php echo base_url();?>"; </script>
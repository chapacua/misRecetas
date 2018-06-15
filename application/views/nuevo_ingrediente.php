<div class="col m4">
    <div class="card small" id="tr<?php echo $nuevoIngrediente->Ing_Id; ?>">
        <div class="card-image"><?php //echo $nuevoIngrediente->Ing_Imagen; ?>
            <img src="<?php echo base_url('application/views/public/img/ingredientes/').$nuevoIngrediente->Ing_Imagen; ?>">
            <span class="card-title"><?php echo $nuevoIngrediente->Ing_Nombre; ?></span>
        </div>
        <div class="card-content">
            <p><?php echo $nuevoIngrediente->Ing_Comentario; ?></p>
        </div>
        <div class="card-action center-align">
            <a class='btn deleteIng white-text text-darken-2 red darken-4' href='#!' data-id="<?php echo $nuevoIngrediente->Ing_Id; ?>" ><i class="material-icons">delete_forever</i></a>
            <a class="waves-effect waves-light btn activator white-text text-darken-2 red darken-2" href="#modal<?php echo $nuevoIngrediente->Ing_Id; ?>"><i class="material-icons">edit</i></a>                                                          
        </div>
        <div class="card-reveal">
            <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i>Editar: <?php echo $nuevoIngrediente->Ing_Nombre; ?></span>
            <?php $args = array('id' => 'createIngre', 'enctype' => 'multipart/form-data'); ?>
            <?php echo form_open('Ingredientes/updateIngrediente', $args); ?>
                <div class="container">
                    <div class="row">
                        <div class="col s12">
                            <input type="text" name="Ing_Nombre" class="validate" placeholder="Nombre del nuevo ingrediente" value="<?php echo $nuevoIngrediente->Ing_Nombre; ?>" required aria-required>
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
                                <option value="<?php echo $nuevoIngrediente->Cat_Id;?>" selected><?php echo $nuevoIngrediente->Cat_Nombre;?></option>
                                <?php foreach ($categorias as $categoria):?>
                                    <option value="<?php echo $categoria->Cat_Id;?>"><?php echo $categoria->Cat_Nombre;?></option>
                                <?php endforeach; ?>
                            </select>                
                        </div>                
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <textarea id="descripcion" name="Ing_comentario" class="materialize-textarea" data-length="120" placeholder="Realiza una descripción del ingrediente"><?php echo $nuevoIngrediente->Ing_Comentario; ?></textarea>
                            <label for="textarea1">Descripción</label>  
                            <input type="hidden" value="<?php echo $nuevoIngrediente->Ing_Id; ?>" name="Ing_Id">            
                        </div>                 
                    </div>
                        <button type="submit" class="btn white-text text-darken-2 red darken-2">Actualizar</button>
                </div>
            <?php echo form_close();?>                                                   
        </div>
    </div>
</div>
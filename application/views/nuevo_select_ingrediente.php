<div class="row" id="Ing-<?php echo $id+1; ?>">
    <div class="col s6">
        <select class="browser-default" name="Cat_Id[]">
            <option value=""  selected>Seleccione una categoría</option>
            <?php foreach ($ingredientes as $ingrediente):?>
                <option value="<?php echo $ingrediente->Ing_Id;?>"><?php echo $ingrediente->Ing_Nombre;?></option>
            <?php endforeach; ?>
        </select>                
    </div> 
    <div class="col s4">
        <input type="number" placeholder="Cantidad" class="validate" name="RIng_Cantidad[]">
    </div>    
    <div class="col s2">
        <buttton class='btn deleteNewIngRec white-text text-darken-2 red darken-4'data-ingrediente="<?php echo $id+1;?>"><i class="material-icons">delete_forever</i></button>
    </div>               
</div>
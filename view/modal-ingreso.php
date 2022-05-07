<?php require_once('ingreso-detalle.php'); 

?>

<div id="classModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="classInfo" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          ×
        </button>
        <h4 class="modal-title" id="classModalLabel">
             Ingresar Detalles
            </h4>
      </div>
      <div class="modal-body">
      <form id="formdetalle">    
            <div class="modal-body">
                <div class="form-group">
                <label  class="col-form-label">Medio:</label>
                <select class="form-control item_unit" name="Medio[]" required>
                    <option selected="" disabled="" value="0">Seleccione Medio</option>
                    <?php echo medios_de_transporte($connect); ?>
                </select>
                </div>
                <div class="form-group">
                <label  class="col-form-label">Serie:</label>
                <input type="text" class="form-control" name="Serie[]" required>
                </div>    
                <div class="form-group">
                <label  class="col-form-label">Descripción:</label>
                <input type="text" class="form-control" name="Descripcion[]">
                </div>   
                <div class="form-group">
                <label  class="col-form-label">Marca:</label>
                <select class="form-control item_unit" name="Marca[]" required>
                    <option selected="" disabled="" value="0">Seleccione Marca</option>
                    <?php echo marcas_aeronaval($connect); ?>
                </select>
                </div> 
                <div class="form-group">
                <label  class="col-form-label">Modelo:</label>
                <select class="form-control item_unit" name="Modelo[]" required>
                    <option selected="" disabled="" value="0">Seleccione Modelo</option>
                    <?php echo modelos_aeronaval($connect); ?>
                </select>
                </div>  
                <div class="form-group">
                <label  class="col-form-label">Tipo:</label>
                <input type="text" class="form-control" name="Tipo[]" required>
                </div>        
                <div class="form-group">
                <label  class="col-form-label">Color:</label>
                <input type="text" class="form-control" name="Color[]" required>
                </div>      
                <div class="form-group">
                <label  class="col-form-label">Año:</label>
                <input type="number" class="form-control" step=1 min="1990" max= "2045" name="año[]" required>
                </div> 
                <div class="form-group">
                <label  class="col-form-label">Placa:</label>
                <input type="text" class="form-control" name="Placa[]" required>
                </div>
                <div class="form-group">
                <label  class="col-form-label">Stock Ingreso:</label>
                <input type="text" class="form-control" name="Stocking[]" required>
                </div>  
                <div class="form-group">
                <label  class="col-form-label">Precio:</label>
                <input type="text" class="form-control" name="Precio[]"required>
                </div>            
            </div>
            <div class="modal-footer">
             <button class="btn btn-success" type="submit" id="btnguardar"><i class="fa fa-floppy-o"></i> Agregar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
            </div>
        </form> 
      </div>
    </div>
  </div>
</div>
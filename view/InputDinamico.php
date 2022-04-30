<?php
$conn = mysqli_connect("localhost", "root", "", "dbsolventas");
?> 
 <div class="table-responsive">
 <table id="tblPrueba" class="table table-striped table-bordered table-condensed table-hover" cellspacing="0" cellpadding="0" width="100%">
 <!--               <table
                    cellpadding="0"
                    class="table table-striped table-bordered"
                    cellspacing="0"
                    border="1"
                    class="display"
                    id="tblDetalleIngreso"
                    data-turbolinks="false"
                  >   -->
                    <thead>
                      <tr>
                        <th>Medio</th>
                        <th>Serie</th>
                        <th>Descripcion</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Tipo</th>
                        <th>Color</th>
                        <th>Año</th>
                        <th>Placa</th>
                        <th>Stock Ingreso</th>
                        <th>Precio</th>  
                        <th>Opción</th>
                      </tr>
                    </thead>    
  <tbody>
 <tr>
 <td> 
                       <select name="cboMedio[]" id="cboMedio">
                       <option value="0">Seleccione:</option>
                      <?php
                        $conn = mysqli_connect("localhost", "root", "", "dbsolventas");
                        $sql = "SELECT * FROM medios_transporte";
                        $resultmed = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
                        while ($rows = mysqli_fetch_assoc($resultmed)) {
                      ?>
                       <option value="<?php echo $rows["Id_Medio_Transporte"]; ?>"><?php echo $rows["Nombre_Medio"]; ?></option>
                        
                      <?php }  ?>
                      </select>
                      </td>

                      <td>
                        <input
                          class="form-control"
                          type="text"
                          name="serie[]"
                        />
                      </td>
                      <td>
                        <input
                          class="form-control"
                          type="text"
                          name="descripcion[]"
                        />
                      </td>
                    
                      <td> 
                        <select name="cboMarcaIng[]" id="cboMarcaIng">
                        <option value="0">Seleccione:</option>
                       <?php
                         $sql = "SELECT * FROM marcas_aeronaval";
                         $resultmar = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
                         while ($rows = mysqli_fetch_assoc($resultmar)) {
                       ?>
                        <option value="<?php echo $rows["Id_Marcas_Aeronaval"]; ?>"><?php echo $rows["Nombre_Marca"]; ?></option>
                         
                       <?php }  ?>
                       </select>
                       </td>

                       <td> 
                        <select name="cboModelo[]" id="cboModelo">
                        <option value="0">Seleccione:</option>
                       <?php
                         $sql = "SELECT * FROM modelos_aeronaval";
                         $resultmod = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
                         while ($rows = mysqli_fetch_assoc($resultmod)) {
                       ?>
                        <option value="<?php echo $rows["Id_Modelo_Aeronaval"]; ?>"><?php echo $rows["Nombre_Modelo"]; ?></option>
                         
                       <?php }  ?>
                       </select>
                       </td>
                       <td>
                        <input
                          class="form-control"
                          type="text"
                          name="Tipo_Bien[]"
                        />
                      </td>
                      <td>
                        <input
                          class="form-control"
                          type="text"
                          name="Color[]"
                        />
                        </td>
                        <td>
                          <input
                            class="form-control"
                            type="number"
                            name="Año[]"
                            step=1
                            min="1990"
                            max= "2045"
                          />
                        </td>
                        <td>
                          <input
                            class="form-control"
                            type="text"
                            name="Placa[]"
                          />
                        </td>
                        <td>
                          <input
                            class="form-control"
                            type="number"
                            name="stock_ingreso[]"
                          />
                        </td>
                        <td>
                          <input
                            class="form-control"
                            type="number"
                            name="precio_compra[]"
                          />
                        </td>
                        <td><input class="btn btn-success" data-toggle="tooltip" type="button" name="agregar_registros" value="+" onClick="AgregarMas();" /></td>  
                         </tr>
                      </tbody>
                  </table> 
                </div>
              </div>
          
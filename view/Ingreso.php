<?php 
include_once('./model/Conexion.php');
//include_once('modal-ingreso.php');
?>
<div class="panel panel-default">
  <div class="panel-heading">
    <div class="box-header with-border">
      <h3 class="box-title" id="lblTitle">Ingresos Almacén</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse">
          <i class="fa fa-minus"></i>
        </button>

        <button class="btn btn-box-tool" data-widget="remove">
          <i class="fa fa-times"></i>
        </button>
      </div>
    </div>
  </div>
  <!--  /.box-header -->
  <div class="box-body">
    <div class="row">
      <div class="col-md-12">
        <!--Contenido-->
        <div class="col-sm-14" id="VerForm">
          <form
            name="frmIngresos"
            id="frmIngresos"
            enctype="multipart/form-data"
          >
            <div class="row">
              <div
                class="col-sm-12 col-sm-offset-0 col-lg-12 col-lg-offset-0 main"
              >
                <div class="row">
                  <?php
                            if ($_SESSION["tipo_usuario"] == "Administrador" || $_SESSION["superadmin"] == "S") {
                        ?>
                  <div class="col-lg-8 left">
                    <label for="inputMarca">Sucursal:</label>
                    <div class="form-group has-success">
                      <div class="input-group">
                        <input 
                        id="txtSucursal" 
                        type="text" 
                        value="<?php echo $_SESSION["sucursal"] ?>"
                        class="form-control"
                        
                         name="txtSucursal"
                          placeholder="Seleccione una Sucursal"
                           autofocus=""
                        disabled/>
                        <span class="input-group-btn">
                          <button
                            type="button"
                            class="btn btn-success"
                            id="btnBuscarSucursal"
                          >
                            <i class="fa fa-search"></i>
                            Buscar
                          </button>
                        </span>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                  <div class="col-lg-8 left">
                    <label for="inputMarca">Proveedor:</label>
                    <div class="form-group has-success">
                      <input id="txtIdUsuario" type="hidden" value="<?php echo $_SESSION["idusuario"] ?>"
                      maxlength="50" class="form-control" name="txtIdUsuario"
                      required="" placeholder="" autofocus="" /> <input
                      id="txtIdSucursal" type="hidden" value="<?php echo $_SESSION["idsucursal"] ?>"
                      maxlength="50" class="form-control" name="txtIdSucursal"
                      required="" placeholder="" autofocus="" />

                      <input
                        id="txtIdProveedor"
                        type="hidden"
                        class="form-control"
                        name="txtIdProveedor"
                        required=""
                        placeholder=""
                        autofocus=""
                      />
                      <div class="input-group">
                        <input
                          id="txtProveedor"
                          type="text"
                          class="form-control"
                          name="txtProveedor"
                          required=""
                          placeholder="Seleccione un Proveedor"
                          autofocus=""
                          disabled
                        />
                        <span class="input-group-btn">
                          <button
                            type="button"
                            class="btn btn-success"
                            id="btnBuscarProveedor"
                          >
                            <i class="fa fa-search"></i>
                            Buscar
                          </button>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 left">
                    <label for="inputPlaca">Impuesto</label>
                    <div class="form-group">
                      <div class="input-group has-success">
                        <input
                          id="txtImpuesto"
                          type="text"
                          class="form-control"
                          style="text-align: center"
                          name="txtImpuesto"
                          disabled
                        />
                        <div class="input-group-addon">%</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-5 left">
                    <label for="inputMarca">Tipo Comprobante:</label>
                    <div class="form-group has-success">
                      <select
                        id="cboTipoComprobanteIng"
                        name="cboTipoComprobante"
                        class="form-control"
                        required
                      ></select>
                    </div>
                  </div>
                  <div class="col-lg-3 left">
                    <label for="inputPlaca">Serie/Folio:</label>
                    <div class="form-group has-success">
                      <input
                        id="txtSerie"
                        type="text"
                        class="form-control"
                        style="text-align: center"
                        name="txtSerie"
                        maxlength="7"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-lg-4 left">
                    <label for="inputPlaca">Número:</label>
                    <div class="form-group has-success">
                      <input
                        id="txtNumero"
                        type="text"
                        class="form-control"
                        style="text-align: center"
                        name="txtNumero"
                        maxlength="10"
                        required
                      />
                    </div>
                  </div>
                </div>

                <div class="row" id="btnAgregar">
                  <div class="col-lg-6 left">
                    <div class="form-group">
                      <button type="button" id="add" class="btn btn-info"><i class="fa fa-search"></i> Grabar Bienes</button>
                    </div>
                  </div>
                </div>
                <div><?php include_once('InputDinamico.php');?></div>

                <div class="col-lg-12 left">
                <h5></h5>
                <button class="btn btn-success" type="submit" id="btnRegistrarIng" value="insert">
                  <i class="fa fa-floppy-o"></i> Registrar
                </button>
                <a href="Ingreso.php" class="btn btn-primary"
                  ><i class="fa fa-remove"></i> Cancelar</a
                >
                <hr />
                <span class="lead text-primary"></span>
              </div>
              </div>
                <div id="cargaexterna"><?php /*require_once('InputDinamico.php')?*/?></div>
                
              <div class="col-sm-9 col-sm-offset-3 col-lg-8 col-lg-offset-2 main">
                <div class="row">
                  <div class="col-lg-4 left">
                    <div class="input-group has-error">
                      <div id="SubTotal" class="input-group-addon"></div>
                      <input
                        type="text"
                        class="form-control"
                        id="txtSubTotal"
                        name="txtSubTotal"
                        placeholder="Sub Total"
                        disabled
                      />
                    </div>
                  </div>
                  <!---  <div class="col-lg-4 left  has-error">
                            <div class="input-group">
                                <div id="IGV" class="input-group-addon"></div>
                                <input type="text" class="form-control" id="txtIgv" name="txtIgv" placeholder="Impuesto" disabled>
                                
                            </div>
                        </div> -->
                  <div class="col-lg-4 left has-error">
                    <div class="input-group">
                      <div id="Total" class="input-group-addon"></div>
                      <input type="text" class="form-control" id="txtTotal" name="txtTotal" placeholder="Total" disabled/>
                    </div>
                  </div>
                </div>
              </div>
              <br />

              <br /><br />
            </div>
          </form>
        </div>
        <button class="btn btn-primary" id="btnNuevo">
          <i class="fa fa-file"></i> Nuevo
        </button>
        <br /><br />
        <div id="VerListado" class="table-responsive">
          <table
            id="tblIngresos"
            class="table table-striped table-bordered table-condensed table-hover"
            cellpadding="0"
            cellspacing="0"
            width="100%"
          >
            <thead>
              <tr>
                <th>#</th>
                <th>Proveedor</th>
                <th>T. Comprobante</th>
                <th>Serie</th>
                <th>Numero</th>
                <th>Fecha</th>
                <th>Impuesto</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Opciones</th>
              </tr>
            </thead>

            <tfoot>
              <tr>
                <th>#</th>
                <th>Proveedor</th>
                <th>T. Comprobante</th>
                <th>Serie</th>
                <th>Numero</th>
                <th>Fecha</th>
                <th>Impuesto</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Opciones</th>
              </tr>
            </tfoot>

   <!--        <tbody id="Ingreso"></tbody>  -->
          </table>
        </div>
        <!--Fin-Contenido-->
      </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->

<div
  id="modalListadoProveedor"
  class="modal fade bs-example-modal-lg"
  tabindex="-1"
  role="dialog"
  aria-labelledby="myLargeModalLabel"
>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button
          type="button"
          class="close"
          data-dismiss="modal"
          aria-label="Close"
        >
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Listado de Proveedores</h4>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table
            id="tblProveedores"
            class="table table-striped table-bordered table-condensed table-hover"
            cellpadding="0"
            cellspacing="0"
            width="100%"
          >
            <thead>
              <tr>
                <th>Seleccione</th>
                <th>#</th>
                <th>Nombre</th>
                <th>Tipo de Documento</th>
                <th>N° de Documento</th>
                <th>E-Mail</th>
                <th>N° de Cuenta</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Seleccione</th>
                <th>#</th>
                <th>Nombre</th>
                <th>Tipo de Documento</th>
                <th>N° de Documento</th>
                <th>E-Mail</th>
                <th>N° de Cuenta</th>
              </tr>
            </tfoot>

            <tbody id="Proveedor"></tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">
          <i class="fa fa-remove"></i> Cerrar
        </button>
        <button type="button" id="btnAgregarProveedor" class="btn btn-primary">
          <i class="fa fa-plus"></i> Agregar
        </button>
      </div>
    </div>
  </div>
</div>

<div
  id="modalListadoSucursal"
  class="modal fade bs-example-modal-lg"
  tabindex="-1"
  role="dialog"
  aria-labelledby="myLargeModalLabel"
>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button
          type="button"
          class="close"
          data-dismiss="modal"
          aria-label="Close"
        >
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Listado de Sucursales</h4>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table
            id="tblSucursales"
            class="table table-striped table-bordered table-condensed table-hover"
            cellpadding="0"
            cellspacing="0"
            width="100%"
          >
            <thead>
              <tr>
                <th>Seleccione</th>
                <th>#</th>
                <th>Razón Social</th>
                <th>Documento</th>
                <th>Dirección</th>
                <th>E-Mail</th>
                <th>Logo</th>
              </tr>
            </thead>

            <tfoot>
              <tr>
                <th>Seleccione</th>
                <th>#</th>
                <th>Razón Social</th>
                <th>Documento</th>
                <th>Dirección</th>
                <th>E-Mail</th>
                <th>Logo</th>
              </tr>
            </tfoot>

            <tbody id="Sucursales"></tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">
          <i class="fa fa-remove"></i> Cerrar
        </button>
        <button type="button" id="btnAgregarSucursal" class="btn btn-primary">
          <i class="fa fa-plus"></i> Agregar
        </button>
      </div>
    </div>
  </div>
</div>

<form id="form1">
  <div
    id="modalListadoArticulos"
    class="modal fade bs-example-modal-lg"
    tabindex="-1"
    role="dialog"
    aria-labelledby="myLargeModalLabel"
  >
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">Listado de Articulos</h4>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <table
              id="tblArticulosIng"
              class="table table-striped table-bordered table-condensed table-hover"
              cellpadding="0"
              cellspacing="0"
              width="100%"
            >
              <thead>
                <tr>
                  <th>Seleccione</th>
                  <th>#</th>
                  <th>Categoria</th>
                  <th>U. Medida</th>
                  <th>Articulo</th>
                  <th>Descripcion</th>
                  <th>Imagen</th>
                </tr>
              </thead>

              <tfoot>
                <tr>
                  <th>Seleccione</th>
                  <th>#</th>
                  <th>Categoria</th>
                  <th>U. Medida</th>
                  <th>Articulo</th>
                  <th>Descripcion</th>
                  <th>Imagen</th>
                </tr>
              </tfoot>

              <tbody id="ArticuloIng" style="text-align: center"></tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">
            <i class="fa fa-remove"></i> Cerrar
          </button>
          <!-- <button type="button" id="btnAgregarArt" class="btn btn-primary"><i class="fa fa-plus"></i> Agregar</button>-->
        </div>
      </div>
    </div>
  </div>
</form>
<script>
$("#liCompras").addClass("treeview active");
$("#liIng").addClass("active");
  $(document).ready(function()
{
/*$("#add").on('click', function(){
   $('#classModal').modal('show');
    }); */

$(document).on('click', '#add', function(){
  var html = '';
  
  html += '<tr>';
  html += '<td><select name="cboMedio[]" class="form-control cboMedio[]"><option value="0">Seleccione Medio</option><?php echo medios_de_transporte($connect); ?></select></td>';
  html += '<td><input type="text" name="serie[]" class="form-control serie[]"></td>';
  html += '<td><input type="text" name="descripcion[]" class="form-control descripcion[]"></td>';
  html += '<td><select name="cboMarcaIng[]" class="form-control cboMarcaIng[]"><option value="0">Seleccione Marca</option><?php echo marcas_aeronaval($connect); ?></select></td>';
  html += '<td><select name="cboModelo[]" class="form-control cboModelo[]"><option value="0">Seleccione Modelo</option><?php echo modelos_aeronaval($connect) ?></select></td>';  
  html += '<td><input type="text" name="Tipo_Bien[]" class="form-control Tipo_Bien[]"></td>';
  html += '<td><input type="text" name="Color[]" class="form-control Color[]"></td>';
  html += '<td><input type="text" name="Año[]" class="form-control Año[]"></td>';
  html += '<td><input type="text" name="Placa[]" class="form-control Placa[]"></td>';
  html += '<td><input type="text" name="stock_ingreso[]" class="form-control stock_ingreso[]"></td>';
  html += '<td><input type="text" name="precio_compra[]" class="form-control precio_compra[]"></td>';
  html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
  $('#item_Table').append(html);
 });

$(document).on('click', '#remove', function(){
  $(this).closest('tr').remove();
 });

 $('#insert_form').on('submit', function(event){
  event.preventDefault();
  var error = '';
  $('#cboMedio').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Item Name at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.serie').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Item Quantity at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.descripcion').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select Unit at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });

  $('.cboMarcaIng').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select Unit at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });

  $('.cboModelo').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select Unit at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  $('.Tipo_Bien').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select Unit at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  $('.Color').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select Unit at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  $('.Año').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select Unit at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  $('.Placa').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select Unit at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  $('.stock_ingreso').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select Unit at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  $('.precio_compra').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select Unit at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  var form_data = $(this).serialize();
  if(error == '')
  {
   $.ajax({
    url:"ingreso-detalle.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     if(data == 'ok')
     {
      $('#item_table').find("tr:gt(0)").remove();
      $('#error').html('<div class="alert alert-success">Item Details Saved</div>');
     }
    }
   });
  }
  else
  {
   $('#error').html('<div class="alert alert-danger">'+error+'</div>');
  }
 });

});
</script>
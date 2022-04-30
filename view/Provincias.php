<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="panel panel-default">
        <div class="panel-heading">
                <div class="box-header with-border">
                  <h3 class="box-title">Catálogo de Provincias</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
        </div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
		                    <!--Contenido-->
                            
		                    <div class="col-sm-14"  id="VerForm">

        <form role="form" name="frmProvincias" id="frmProvincias" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <label>Los campos con (*) son olbigatorios</label>
                </div>
              
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group  has-success">
                        <input id="Id_Provincia_Aeronaval" type="hidden" maxlength="50" class="form-control" name="Id_Provincia_Aeronaval" required="" placeholder="" autofocus="" />
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group  has-success">
                        <input id="Id_Region" type="hidden" maxlength="50" class="form-control" name="Id_Region" required="" placeholder="" autofocus="" />
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 left">
                    <label>Nombre (*):</label>
                    <div class="form-group  has-success">                        
                        <input id="Nombre_Provincia" type="text" maxlength="50" class="form-control" name="Nombre_Provincia" required="" placeholder="Ingrese el nombre de Provincia" autofocus="" />
                    </div>
                </div>
                        
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 left">  
                    <label>Orden (*):</label>
                    <div class="form-group  has-success">                        
                        <input id="Orden_Provincia" type="number" maxlength="50" step = '0.05' class="form-control" name="Orden_Provincia" required="" placeholder="Ingrese el Orden de Provincia" autofocus="" />
                    </div>
                </div>
            </div>
                     
                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 left">  
                        <label>Región (*):</label>
                       <select name="Region" id="Region">
                        <?php 
                            $sql = "select * from regiones_aeronaval";
                            $query = $conexion->query($sql);
                            
                            while($valores= mysqli_fetch_array($query)) {
                                echo '<option value="'.$valores["Id_Region_Aeronaval"].'">'.$valores["Nombre_Region"].'</option>';
                            } 
                           
                        ?>
                    </select> 
                    </div> 

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 left">
                        <div class="onoffswitch"> 
                           <input type="checkbox" name="Provincia_Activa" class="onoffswitch-checkbox" id="myonoffswitch" tabindex="0">      
                           <label class="onoffswitch-label" for="myonoffswitch"  >
                           <span class="onoffswitch-inner" ></span>
                           <span class="onoffswitch-switch"></span>
                           </label> 
                         </div> 
                        </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 left">
                    <h5></h5>
                    <button class="btn btn-success" type="submit"><i class="fa fa-floppy-o"></i> Registrar</button>
                    <a href="Provincias.php" class="btn btn-primary" ><i class="fa fa-remove"></i> Cancelar</a>
                    <hr>
                    <span class="lead text-primary"></span>
                </div>
          
        </form>
    </div>
<button class="btn btn-primary" id="btnNuevo"><i class="fa fa-file"></i> Nuevo</button>




		                    <br><br>
		                    <div id="VerListado" class="table-responsive">


            		<table id="tblProvincias" class="table table-striped table-bordered table-condensed table-hover" cellspacing="0" cellpadding="0" width="100%">
                    <thead>
                        <tr>
                        	<th>#</th>
                            <th>Nombre</th>
                            <th>Estatus</th>
                            <th>Región</th>
                            <th>Orden</th>
                            <th>Id_Region</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
             
                    <tfoot>
                        <tr>
                        	<th>#</th>
                            <th>Nombre</th>
                            <th>Estatus</th>
                            <th>Región</th>
                            <th>Orden</th>
                            <th>Id_Region</th>
                            <th>Opciones</th>
                        </tr>
                    </tfoot>
             
                    <tbody id="provincia">

                    </tbody>
                </table>
</div>
		                    <!--Fin-Contenido-->
                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->

<script type="text/javascript">
    
    $('#liAlmacen').addClass("treeview active");
    $('#liProvincias').addClass("active");

</script>
</body>
</html>
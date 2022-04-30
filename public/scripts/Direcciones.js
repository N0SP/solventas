$(document).on("ready", init);

function init(){
	
	ListadoDirecciones();

	$("#VerForm").hide();
	$("form#frmDirecciones").submit(SaveOrUpdate);
	
	$("#btnNuevo").click(VerForm);

	function SaveOrUpdate(e){
			e.preventDefault();

	        var formData = new FormData($("#frmDirecciones")[0]);

	        $.ajax({

	                url: "./ajax/DireccionesAjax.php?op=SaveOrUpdate",

	                type: "POST",

	               data: formData,

	                contentType: false,

	                processData: false,

	                success: function(datos)

	                {

	                    swal("Mensaje del Sistema", datos, "success");
						  ListadoDirecciones();
						  OcultarForm();
						  $('#frmDirecciones').trigger("reset");
						  Limpiar();
	                }

	            });
	};


	function Limpiar(){
			$("#Id_Direccion_Aeronaval").val("");
		    $("#Nombre_Direccion").val("");
			$("#Estatus_Direccion").attr('checked', false);
			$("#Orden_Direccion").val("");
	}

	function VerForm(){
			$("#VerForm").show();
			$("#btnNuevo").hide();
			$("#VerListado").hide();
	}

	function OcultarForm(){
			$("#VerForm").hide();// Mostramos el formulario
			$("#btnNuevo").show();// ocultamos el boton nuevo
			$("#VerListado").show();
	}
}
function ListadoDirecciones(){ 
	var tabla = $('#tblDirecciones').dataTable(
		{   "aProcessing": true,
       		"aServerSide": true,
       		dom: 'Bfrtip',
	        buttons: [
	            'copyHtml5',
	            'excelHtml5',
	            'csvHtml5',
	            'pdfHtml5'

			], "columnDefs" : [
				{
		//			"targets": 2,
		//			"render":function(data,type) {
		//				console.log("data =" + data);
		//				if (data == 1) {
		//					return '<input type="checkbox" name="" value="" checked>';
		//					//return '<label for="Name">Activo</label>';      
		//				} else {
		//					return '<input type="checkbox" name="" value="">';
							//return '<label for="Name">Inactivo</label>'; 
		//				}
		//			}
				}
	
        	],
			"ajax": 
	        	{
	        		url: './ajax/DireccionesAjax.php?op=list',
					type : "get",
					dataType : "json",
					
					error: function(e){
				   		console.log(e.responseText);	
					}
	        	},
	        "bDestroy": true

    	}).DataTable();

    };
function eliminarDirecciones(id){
	bootbox.confirm("¿Esta Seguro de eliminar la Direccion?", function(result){
		if(result){
			$.post("./ajax/DireccionesAjax.php?op=delete", {id : id}, function(e){
                
				swal("Mensaje del Sistema", e, "success");
				ListadoDirecciones();

            });
		}
		
	})
}

function cargarDataDirecciones(Id_Direccion_Aeronaval, Nombre_Direccion, Estatus_Direccion, Orden_Direccion){
		$("#VerForm").show();
		$("#btnNuevo").hide();
		$("#VerListado").hide();
		$("#Id_Direccion_Aeronaval").val(Id_Direccion_Aeronaval);
	    $("#Nombre_Direccion").val(Nombre_Direccion);
	//    $("#Estatus_Direccion").val(Estatus_Direccion);
		$("#Orden_Direccion").val(Orden_Direccion);
		if (Estatus_Direccion == 1) {
			$("#myonoffswitch").attr('checked', true);
		} else {
			$("#myonoffswitch").attr('checked', false);
 		}
	   
}
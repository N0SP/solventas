$(document).on("ready", init);

function init(){
	
	ListadoRegiones();

	$("#VerForm").hide();
	$("form#frmRegiones").submit(SaveOrUpdate);
	
	$("#btnNuevo").click(VerForm);

	function SaveOrUpdate(e){
			e.preventDefault();

	        var formData = new FormData($("#frmRegiones")[0]);

	        $.ajax({

	                url: "./ajax/RegionesAjax.php?op=SaveOrUpdate",

	                type: "POST",

	               data: formData,

	                contentType: false,

	                processData: false,

	                success: function(datos)

	                {

	                    swal("Mensaje del Sistema", datos, "success");
						  ListadoRegiones();
						  OcultarForm();
						  $('#frmRegiones').trigger("reset");
						  Limpiar();
	                }

	            });
	};


	function Limpiar(){
			$("#Id_Region_Aeronaval").val("");
		    $("#Nombre_Region").val("");
			$("#Estatus_Region").attr('checked', false);
			$("#Orden_Region").val("");
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
function ListadoRegiones(){ 
	var tabla = $('#tblRegiones').dataTable(
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
				//	"targets": 2,
				//	"render":function(data,type) {
				//		console.log("data =" + data);
				//		if (data == 1) {
				//			return '<input type="checkbox" name="" value="" checked>';
							//return '<label for="Name">Activo</label>';      
				//		} else {
				//			return '<input type="checkbox" name="" value="">';
							//return '<label for="Name">Inactivo</label>'; 
				//		}
				//	}
				}
	
        	],
			"ajax": 
	        	{
	        		url: './ajax/RegionesAjax.php?op=list',
					type : "get",
					dataType : "json",
					
					error: function(e){
				   		console.log(e.responseText);	
					}
	        	},
	        "bDestroy": true

    	}).DataTable();

    };
function eliminarRegiones(id){
	bootbox.confirm("¿Esta Seguro de eliminar la Región?", function(result){
		if(result){
			$.post("./ajax/RegionesAjax.php?op=delete", {id : id}, function(e){
                
				swal("Mensaje del Sistema", e, "success");
				ListadoRegiones();

            });
		}
		
	})
}

function cargarDataRegiones(Id_Region_Aeronaval, Nombre_Region, Estatus_Region, Orden_Region){
		$("#VerForm").show();
		$("#btnNuevo").hide();
		$("#VerListado").hide();
		$("#Id_Region_Aeronaval").val(Id_Region_Aeronaval);
	    $("#Nombre_Region").val(Nombre_Region);
	//    $("#Estatus_Region").val(Estatus_Region);
		$("#Orden_Region").val(Orden_Region);
		if (Estatus_Region == 1) {
			$("#myonoffswitch").attr('checked', true);
		} else {
			$("#myonoffswitch").attr('checked', false);
 		}
	   
}
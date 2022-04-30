$(document).on("ready", init);

function init(){
	
	ListadoMedios();

	$("#VerForm").hide();
	$("form#frmMedios").submit(SaveOrUpdate);
	
	$("#btnNuevo").click(VerForm);

	function SaveOrUpdate(e){
			e.preventDefault();

	        var formData = new FormData($("#frmMedios")[0]);

	        $.ajax({

	                url: "./ajax/MediosAjax.php?op=SaveOrUpdate",

	                type: "POST",

	               data: formData,

	                contentType: false,

	                processData: false,

	                success: function(datos)

	                {

	                    swal("Mensaje del Sistema", datos, "success");
						  ListadoMedios();
						  OcultarForm();
						  $('#frmMedios').trigger("reset");
						  Limpiar();
	                }

	            });
	};


	function Limpiar(){
			$("#Id_Medio_Transporte").val("");
		    $("#Nombre_Medio").val("");
			$("#Estatus_Medio").attr('checked', false);
			$("#Orden_Medio").val("");
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
function ListadoMedios(){ 
	var tabla = $('#tblMedios').dataTable(
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
					//	if (data == 1) {
					//		return '<input type="checkbox" name="" value="" checked>';
							//return '<label for="Name">Activo</label>';      
					//	} else {
					//		return '<input type="checkbox" name="" value="">';
							//return '<label for="Name">Inactivo</label>'; 
						}
		//			}
		//		}
	
        	],
			"ajax": 
	        	{
	        		url: './ajax/MediosAjax.php?op=list',
					type : "get",
					dataType : "json",
					
					error: function(e){
				   		console.log(e.responseText);	
					}
	        	},
	        "bDestroy": true

    	}).DataTable();

    };
function eliminarMedios(id){
	bootbox.confirm("¿Esta Seguro de eliminar el Medio?", function(result){
		if(result){
			$.post("./ajax/MediosAjax.php?op=delete", {id : id}, function(e){
                
				swal("Mensaje del Sistema", e, "success");
				ListadoMedios();

            });
		}
		
	})
}

function cargarDataMedios(Id_Medio_Transporte, Nombre_Medio, Estatus_Medio, Orden_Medio){
		$("#VerForm").show();
		$("#btnNuevo").hide();
		$("#VerListado").hide();
		$("#Id_Medio_Transporte").val(Id_Medio_Transporte);
	    $("#Nombre_Medio").val(Nombre_Medio);
		$("#Orden_Medio").val(Orden_Medio);
		if (Estatus_Medio == 1) {
			$("#myonoffswitch").attr('checked', true);
		} else {
			$("#myonoffswitch").attr('checked', false);
 		}
	   
}
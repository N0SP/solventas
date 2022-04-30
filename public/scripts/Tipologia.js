$(document).on("ready", init);

function init(){
	
	ListadoTipologia();

	$("#VerForm").hide();
	$("form#frmTipologia").submit(SaveOrUpdate);
	
	$("#btnNuevo").click(VerForm);

	function SaveOrUpdate(e){
			e.preventDefault();

	        var formData = new FormData($("#frmTipologia")[0]);

	        $.ajax({

	                url: "./ajax/TipologiaAjax.php?op=SaveOrUpdate",

	                type: "POST",

	               data: formData,

	                contentType: false,

	                processData: false,

	                success: function(datos)

	                {

	                    swal("Mensaje del Sistema", datos, "success");
						  ListadoTipologia();
						  OcultarForm();
						  $('#frmTipologia').trigger("reset");
						  Limpiar();
	                }

	            });
	};


	function Limpiar(){
			$("#Id_Tipologia_Aeronaval").val("");
		    $("#Descripcion_Tipologia").val("");
			$("#Abreviatura_Tipologia").val("");
			$("#Estatus_Tipologia").attr('checked', false);
			$("#Orden_Tipologia").val("");
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
function ListadoTipologia(){ 
	var tabla = $('#tblTipologia').dataTable(
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
				//	"targets": 3,
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
	        		url: './ajax/TipologiaAjax.php?op=list',
					type : "get",
					dataType : "json",
					
					error: function(e){
				   		console.log(e.responseText);	
					}
	        	},
	        "bDestroy": true

    	}).DataTable();

    };
function eliminarTipologia(id){
	bootbox.confirm("¿Esta Seguro de eliminar la Tipologia?", function(result){
		if(result){
			$.post("./ajax/TipologiaAjax.php?op=delete", {id : id}, function(e){
                
				swal("Mensaje del Sistema", e, "success");
				ListadoTipologia();

            });
		}
		
	})
}

function cargarDataTipologia(Id_Tipologia_Aeronaval, Descripcion_Tipologia, Abreviatura_Tipologia, Estatus_Tipologia, Orden_Tipologia){
		$("#VerForm").show();
		$("#btnNuevo").hide();
		$("#VerListado").hide();
		$("#Id_Tipologia_Aeronaval").val(Id_Tipologia_Aeronaval);
	    $("#Descripcion_Tipologia").val(Descripcion_Tipologia);
	    $("#Abreviatura_Tipologia").val(Abreviatura_Tipologia);
		$("#Orden_Tipologia").val(Orden_Tipologia);
		if (Estatus_Tipologia == 1) {
			$("#myonoffswitch").attr('checked', true);
		} else {
			$("#myonoffswitch").attr('checked', false);
 		}
	   
}
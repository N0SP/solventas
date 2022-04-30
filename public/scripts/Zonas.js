$(document).on("ready", init);

function init(){
	
ListadoZonas();
comboRegion();
	$("#VerForm").hide();
	$("form#frmZonas").submit(SaveOrUpdate);
	
	$("#btnNuevo").click(VerForm);

	function SaveOrUpdate(e){
		e.preventDefault();// para que no se recargue la pagina
        $.post("./ajax/ZonasAjax.php?op=SaveOrUpdate", $(this).serialize(), function(r){// llamamos la url por post. function(r). r-> llamada del callback
            
            Limpiar();
            ListadoZonas();
            //$.toaster({ priority : 'success', title : 'Mensaje', message : r});
            swal("Mensaje del Sistema", r, "success");
            OcultarForm();
        });
	};


	function Limpiar(){
			$("#Id_Zona_Aeronaval").val("");
		    $("#Nombre_Zona").val("");
			$("#Estatus_Zona").attr('checked', false);
			$("#Id_Region").val("");
//			$("#Region").val("");
			$("#Orden_Zona").val("");
	}

	function comboRegion() {

        $.get("./ajax/ZonasAjax.php?op=listTipo_Region", function(r) {
                $("#cboRegion").html(r);
            
        })
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
function ListadoZonas(){ 
	var tabla = $('#tblZonas').dataTable(
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
					"visible": false, "targets": 5 
			   },
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
				},
        	],
			"ajax": 
	        	{
	        		url: './ajax/ZonasAjax.php?op=list',
					type : "get",
					dataType : "json",
					
					error: function(e){
				   		console.log(e.responseText);	
					}
	        	},
	        "bDestroy": true

    	}).DataTable();

    };
function eliminarZonas(id){
	bootbox.confirm("¿Esta Seguro de eliminar la Zona?", function(result){
		if(result){
			$.post("./ajax/ZonasAjax.php?op=delete", {id : id}, function(e){
                
				swal("Mensaje del Sistema", e, "success");
				ListadoZonas();

            });
		}
		
	})
}

function cargarDataZonas(Id_Zona_Aeronaval, Nombre_Zona, Estatus_Zona, Orden_Zona, Id_Region){
		$("#VerForm").show();
		$("#btnNuevo").hide();
		$("#VerListado").hide();
		$("#Id_Zona_Aeronaval").val(Id_Zona_Aeronaval);
	    $("#Nombre_Zona").val(Nombre_Zona);
		$("#cboRegion").val(Id_Region);
		$("#Orden_Zona").val(Orden_Zona);
		$("#Id_Region").val(Id_Region);

		if (Estatus_Zona == 1) {
			$("#myonoffswitch").attr('checked', true);
		} else {
			$("#myonoffswitch").attr('checked', false);
 		}
	   
}
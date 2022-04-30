$(document).on("ready", init);

function init(){
	
ListadoMarcas();
comboMedio();
	$("#VerForm").hide();
	$("form#frmMarcas").submit(SaveOrUpdate);
	
	$("#btnNuevo").click(VerForm);

	function SaveOrUpdate(e){
		e.preventDefault();// para que no se recargue la pagina
        $.post("./ajax/MarcasAjax.php?op=SaveOrUpdate", $(this).serialize(), function(r){// llamamos la url por post. function(r). r-> llamada del callback
            
            Limpiar();
            ListadoMarcas();
            //$.toaster({ priority : 'success', title : 'Mensaje', message : r});
            swal("Mensaje del Sistema", r, "success");
            OcultarForm();
        });
	};


	function Limpiar(){
			$("#Id_Marcas_Aeronaval").val("");
		    $("#Nombre_Marca").val("");
			$("#Estatus_Marca").attr('checked', false);
			$("#Id_Medio").val("");
			$("#Orden_Marca").val("");

	}

	function comboMedio() {

        $.get("./ajax/MarcasAjax.php?op=listTipo_Medio", function(r) {
                $("#cboMedio").html(r);
            
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
function ListadoMarcas(){ 
	var tabla = $('#tblMarcas').dataTable(
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
					"visible": true, "targets": 5 
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
	        		url: './ajax/MarcasAjax.php?op=list',
					type : "get",
					dataType : "json",
					
					error: function(e){
				   		console.log(e.responseText);	
					}
	        	},
	        "bDestroy": true

    	}).DataTable();

    };
function eliminarMarcas(id){
	bootbox.confirm("¿Esta Seguro de eliminar la Marca?", function(result){
		if(result){
			$.post("./ajax/MarcasAjax.php?op=delete", {id : id}, function(e){
                
				swal("Mensaje del Sistema", e, "success");
				ListadoMarcas();

            });
		}
		
	})
}

function cargarDataMarcas(Id_Marcas_Aeronaval, Nombre_Marca, Estatus_Marca, Orden_Marca, Id_Medio){
		$("#VerForm").show();
		$("#btnNuevo").hide();
		$("#VerListado").hide();
		$("#Id_Marcas_Aeronaval").val(Id_Marcas_Aeronaval);
	    $("#Nombre_Marca").val(Nombre_Marca);
		
		if (Estatus_Marca == 1) {
			$("#myonoffswitch").attr('checked', true);
		} else {
			$("#myonoffswitch").attr('checked', false);
 		}
		 $("#Orden_Marca").val(Orden_Marca);
		 $("#cboMedio").val(Id_Medio);
	   
}
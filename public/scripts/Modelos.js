$(document).on("ready", init);

function init(){
	
ListadoModelos();
comboMedio();
comboMarca();
	$("#VerForm").hide();
	$("form#frmModelos").submit(SaveOrUpdate);
	
	$("#btnNuevo").click(VerForm);

	function SaveOrUpdate(e){
		e.preventDefault();// para que no se recargue la pagina
        $.post("./ajax/ModelosAjax.php?op=SaveOrUpdate", $(this).serialize(), function(r){// llamamos la url por post. function(r). r-> llamada del callback
            
            Limpiar();
            ListadoModelos();
            //$.toaster({ priority : 'success', title : 'Mensaje', message : r});
            swal("Mensaje del Sistema", r, "success");
            OcultarForm();
        });
	};


	function Limpiar(){
			$("#Id_Modelo_Aeronaval").val("");
		    $("#Nombre_Modelo").val("");
			$("#Estatus_Modelo").attr('checked', false);
			$("#Id_Medio").val("");
			$("#Id_Marca").val("");
			$("#Orden_Modelo").val("");
	}

	function comboMedio() {

        $.get("./ajax/ModelosAjax.php?op=listTipo_Medio", function(r) {
                $("#cboMedio").html(r);
            
        })
    }

	function comboMarca() {

        $.get("./ajax/ModelosAjax.php?op=listTipo_Marca", function(r) {
                $("#cboMarca").html(r);
            
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
function ListadoModelos(){ 
	var tabla = $('#tblModelos').dataTable(
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
					"visible": true, "targets": 2 
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
	        		url: './ajax/ModelosAjax.php?op=list',
					type : "get",
					dataType : "json",
					
					error: function(e){
				   		console.log(e.responseText);	
					}
	        	},
	        "bDestroy": true

    	}).DataTable();

    };
function eliminarModelos(id){
	bootbox.confirm("¿Esta Seguro de eliminar el Modelo?", function(result){
		if(result){
			$.post("./ajax/ModelosAjax.php?op=delete", {id : id}, function(e){
                
				swal("Mensaje del Sistema", e, "success");
				ListadoModelos();

            });
		}
		
	})
}

function cargarDataModelos(Id_Modelo_Aeronaval, Nombre_Modelo, Estatus_Modelo, Id_Medio, Id_Marca, Orden_Modelo){
		$("#VerForm").show();
		$("#btnNuevo").hide();
		$("#VerListado").hide();
		$("#Id_Modelo_Aeronaval").val(Id_Modelo_Aeronaval);
	    $("#Nombre_Modelo").val(Nombre_Modelo);
		if (Estatus_Modelo == 1) {
			$("#myonoffswitch").attr('checked', true);
		} else {
			$("#myonoffswitch").attr('checked', false);
 		}	 
		$("#cboMedio").val(Id_Medio);
		$("#cboMarca").val(Id_Marca);
		$("#Orden_Modelo").val(Orden_Modelo);
		  
}
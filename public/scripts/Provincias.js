$(document).on("ready", init);

function init(){
	
ListadoProvincias();
comboRegion();
	$("#VerForm").hide();
	$("form#frmProvincias").submit(SaveOrUpdate);
	
	$("#btnNuevo").click(VerForm);

	function SaveOrUpdate(e){
		e.preventDefault();// para que no se recargue la pagina
        $.post("./ajax/ProvinciasAjax.php?op=SaveOrUpdate", $(this).serialize(), function(r){// llamamos la url por post. function(r). r-> llamada del callback
            
            Limpiar();
            ListadoProvincias();
            //$.toaster({ priority : 'success', title : 'Mensaje', message : r});
            swal("Mensaje del Sistema", r, "success");
            OcultarForm();
        });
	};


	function Limpiar(){
			$("#Id_Provincia_Aeronaval").val("");
		    $("#Nombre_Provincia").val("");
			$("#Provincia_Activa").attr('checked', false);
			$("#Id_Region").val("");
//			$("#Region").val("");
			$("#Orden_Provincia").val("");
	}

	function comboRegion() {

        $.get("./ajax/ProvinciasAjax.php?op=listTipo_Region", function(r) {
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
function ListadoProvincias(){ 
	var tabla = $('#tblProvincias').dataTable(
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
	        		url: './ajax/ProvinciasAjax.php?op=list',
					type : "get",
					dataType : "json",
					
					error: function(e){
				   		console.log(e.responseText);	
					}
	        	},
	        "bDestroy": true

    	}).DataTable();

    };
function eliminarProvincias(id){
	bootbox.confirm("¿Esta Seguro de eliminar la Provincia?", function(result){
		if(result){
			$.post("./ajax/ProvinciasAjax.php?op=delete", {id : id}, function(e){
                
				swal("Mensaje del Sistema", e, "success");
				ListadoProvincias();

            });
		}
		
	})
}

function cargarDataProvincias(Id_Provincia_Aeronaval, Nombre_Provincia, Provincia_Activa, Orden_Provincia, Id_Region){
		$("#VerForm").show();
		$("#btnNuevo").hide();
		$("#VerListado").hide();
		$("#Id_Provincia_Aeronaval").val(Id_Provincia_Aeronaval);
	    $("#Nombre_Provincia").val(Nombre_Provincia);
		$("#cboRegion").val(Id_Region);
		$("#Orden_Provincia").val(Orden_Provincia);
		$("#Id_Region").val(Id_Region);

		if (Provincia_Activa == 1) {
			$("#myonoffswitch").attr('checked', true);
		} else {
			$("#myonoffswitch").attr('checked', false);
 		}
	   
}
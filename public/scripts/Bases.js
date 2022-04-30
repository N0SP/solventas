$(document).on("ready", init);

function init(){
	
ListadoBases();
comboRegion();
comboZona();
comboProvincia();
comboBase();
comboTipologia();
	$("#VerForm").hide();
	$("form#frmBases").submit(SaveOrUpdate);
	
	$("#btnNuevo").click(VerForm);

	function SaveOrUpdate(e){
		e.preventDefault();// para que no se recargue la pagina
        $.post("./ajax/BasesAjax.php?op=SaveOrUpdate", $(this).serialize(), function(r){// llamamos la url por post. function(r). r-> llamada del callback
            
            Limpiar();
            ListadoBases();
            //$.toaster({ priority : 'success', title : 'Mensaje', message : r});
            swal("Mensaje del Sistema", r, "success");
            OcultarForm();
        });
	};


	function Limpiar(){
			$("#Id_Bases_Aeronaval").val("");
		    $("#Nombre_Bases").val("");
			$("#Estatus_Base").attr('checked', false);
			$("#Id_Region").val("");
			$("#Id_Provincia").val("");
			$("#Id_Zona").val("");
			$("#Id_Tipologia").val("");
			$("#Orden_Base").val("");
	}

	function comboRegion() {

        $.get("./ajax/BasesAjax.php?op=listTipo_Region", function(r) {
                $("#cboRegion").html(r);
            
        })
    }

	function comboZona() {

        $.get("./ajax/BasesAjax.php?op=listTipo_Zona", function(r) {
                $("#cboZona").html(r);
            
        })
    }

	function comboProvincia() {

        $.get("./ajax/BasesAjax.php?op=listTipo_Provincia", function(r) {
                $("#cboProvincia").html(r);
            
        })
    }

	function comboBase() {

        $.get("./ajax/BasesAjax.php?op=listTipo_Base", function(r) {
                $("#cboBase").html(r);
            
        })
    }

	function comboTipologia() {

        $.get("./ajax/BasesAjax.php?op=listTipo_Tipologia", function(r) {
                $("#cboTipologia").html(r);
            
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
function ListadoBases(){ 
	var tabla = $('#tblBases').dataTable(
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
				//	"targets": 6,
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
	        		url: './ajax/BasesAjax.php?op=list',
					type : "get",
					dataType : "json",
					
					error: function(e){
				   		console.log(e.responseText);	
					}
	        	},
	        "bDestroy": true

    	}).DataTable();

    };
function eliminarBases(id){
	bootbox.confirm("¿Esta Seguro de eliminar la Base?", function(result){
		if(result){
			$.post("./ajax/BasesAjax.php?op=delete", {id : id}, function(e){
                
				swal("Mensaje del Sistema", e, "success");
				ListadoBases();

            });
		}
		
	})
}

function cargarDataBases(Id_Bases_Aeronaval, Nombre_Base, Id_Tipologia, Id_Region, Id_Provincia, Id_Zona, Estatus_Base, Orden_Base){
		$("#VerForm").show();
		$("#btnNuevo").hide();
		$("#VerListado").hide();
		$("#Id_Bases_Aeronaval").val(Id_Bases_Aeronaval);
	    $("#Nombre_Base").val(Nombre_Base);
		$("#cboTipologia").val(Id_Tipologia);
		$("#cboRegion").val(Id_Region);
		$("#cboProvincia").val(Id_Provincia);
		$("#cboZona").val(Id_Zona);
		
		if (Estatus_Base == 1) {
			$("#myonoffswitch").attr('checked', true);
		} else {
			$("#myonoffswitch").attr('checked', false);
 		}	   
		 $("#Orden_Base").val(Orden_Base);
}
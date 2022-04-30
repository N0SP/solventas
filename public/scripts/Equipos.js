$(document).on("ready", init);

function init(){
	
	var tabla = $('#tblEquipos').dataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    });

	ListadoEquipos();
	comboRegion();
	comboZona();
	comboProvincia();
	comboBase();
	comboTipologia();
	comboModelo();
	comboEstado();

	$("#VerForm").hide();
	$("#txtRutaImgArt").hide();
	$("form#frmEquipos").submit(SaveOrUpdate);
	
	$("#btnNuevo").click(VerForm);

	function SaveOrUpdate(e){
			e.preventDefault();

	        var formData = new FormData($("#frmEquipos")[0]);

	        $.ajax({

	                url: "./ajax/EquiposAjax.php?op=SaveOrUpdate",

	                type: "POST",

	               data: formData,

	                contentType: false,

	                processData: false,

	                success: function(datos)

	                {

	                    swal("Mensaje del Sistema", datos, "success");
						  ListadoEquipos();
						  OcultarForm();
						  $('#frmEquipos').trigger("reset");
						  Limpiar();
	                }

	            });
	};

	function comboRegion() {

        $.get("./ajax/EquiposAjax.php?op=listTipo_Region", function(r) {
                $("#cboRegion").html(r);
            
        })
    }

	function comboZona() {

        $.get("./ajax/EquiposAjax.php?op=listTipo_Zona", function(r) {
                $("#cboZona").html(r);
            
        })
    }

	function comboProvincia() {

        $.get("./ajax/EquiposAjax.php?op=listTipo_Provincia", function(r) {
                $("#cboProvincia").html(r);
            
        })
    }

	function comboBase() {

        $.get("./ajax/EquiposAjax.php?op=listTipo_Base", function(r) {
                $("#cboBase").html(r);
            
        })
    }

	function comboTipologia() {

        $.get("./ajax/EquiposAjax.php?op=listTipo_Tipologia", function(r) {
                $("#cboTipologia").html(r);
            
        })
    }

	function comboModelo() {

        $.get("./ajax/EquiposAjax.php?op=listTipo_Modelo", function(r) {
                $("#cboModelo").html(r);
            
        })
    }

	function comboEstado() {

        $.get("./ajax/EquiposAjax.php?op=listTipo_Estado", function(r) {
                $("#cboEstado").html(r);
            
        })
    }

	function Limpiar(){
			$("#Id_Equipo_Aeronaval").val("");
			$("#Id_Provincia_Aeronaval").val("");
			$("#Id_Region_Aeronaval").val("");
			$("#Id_Base_Aeronaval").val("");
		    $("#Nombre").val("");
			$("#Marquilla").val("");
			$("#Matricula").val("");
			$("#Matricula_Institucional").val("");
			$("#Fojas").val("");
			$("#Archivador").val("");
			$("#Id_Medio_Transporte").val("");
			$("#Id_Marca_Vehiculo").val("");
			$("#Id_Modelo").val("");
			$("#No_De_Chasis").val("");
			$("#Id_Color").val("");
			$("#Numero_De_Motores").val("");
			$("#Numero").val("");
			$("#No_Carpetilla").val("");
			$("#No_Expediente").val("");
			$("#No_Resolucion").val("");
			$("#Asignado_a").val("");
			$("#Fecha_Ult_Asignacion").val("");
			$("#Fecha_De_entrega").val("");
			$("#Fecha_Devolucion").val("");
			$("#Valor_Seguro").val("");
			$("#Id_Estado").val("");
		    $("#imagenArt").attr("src","");
			$("#txtRutaImgArt").val("");
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

function ListadoEquipos(){ 
	var tabla = $('#tblEquipos').dataTable(
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
					"targets": [6,7,8,9,10,14,15,16,17,18,19,20,21,22,23,24,25,26],
					"visible": false 			
			   },
			
        	],
			"ajax": 
	        	{
	        		url: './ajax/EquiposAjax.php?op=list',
					type : "get",
					dataType : "json",
					
					error: function(e){
				   		console.log(e.responseText);	
					}
	        	},
	        "bDestroy": true

    	}).DataTable();

    };

function eliminarEquipos(id){
	bootbox.confirm("¿Esta Seguro de eliminar el Equipo?", function(result){
		if(result){
			$.post("./ajax/EquiposAjax.php?op=delete", {id : id}, function(e){
                
				swal("Mensaje del Sistema", e, "success");
				ListadoEquipos();

            });
		}
		
	})
}

function cargarDataEquipos(Id_Equipo_Aeronaval, Id_Provincia_Aeronaval, Id_Region_Aeronaval, Id_Zona_Aeronaval, Id_Base_Aeronaval, Nombre, Marquilla, Matricula, Matricula_Institucional, Fojas, Archivador, Id_Medio_Transporte, Id_Marca_Vehiculo, Id_Modelo, No_De_Chasis, Id_Color, Numero_De_Motores, Numero, No_Carpetilla, No_Expediente, No_Resolucion, Asignado_a, Fecha_Ult_Asignacion, Fecha_De_Entrega, Fecha_Devolucion, Valor_Seguro, Id_Estado, imagen){
		$("#VerForm").show();
		$("#btnNuevo").hide();
		$("#VerListado").hide();

		$("#Id_Equipo_Aeronaval").val(Id_Equipo_Aeronaval);
	    $("#cboProvincia").val(Id_Provincia_Aeronaval);
	    $("#cboRegion").val(Id_Region_Aeronaval);
		$("#cboZona").val(Id_Zona_Aeronaval);
		$("#cboBase").val(Id_Base_Aeronaval);
	    $("#Nombre").val(Nombre);
		$("#Marquilla").val(Marquilla);
		$("#Matricula").val(Matricula);
		$("#Matricula_Institucional").val(Matricula_Institucional);
		$("#Fojas").val(Fojas);
		$("#Archivador").val(Archivador);
		$("#cboMedio").val(Id_Medio_Transporte);
		$("#cboMarca").val(Id_Marca_Vehiculo);
		$("#cboModelo").val(Id_Modelo);
		$("#No_De_Chasis").val(No_De_Chasis);
		$("#Id_Color").val(Id_Color);
		$("#Numero_De_Motores").val(Numero_De_Motores);
		$("#Numero").val(Numero);
		$("#No_Carpetilla").val(No_Carpetilla);
		$("#No_Expediente").val(No_Expediente);
		$("#No_Resolucion").val(No_Resolucion);
		$("#Asignado_a").val(Asignado_a);
		$("#Fecha_Ult_Asignacion").val(Fecha_Ult_Asignacion);
		$("#Fecha_De_Entrega").val(Fecha_De_Entrega);
		$("#Fecha_Devolucion").val(Fecha_Devolucion);
		$("#Valor_Seguro").val(Valor_Seguro);
		$("#cboEstado").val(Id_Estado);
	//	$("#imagenArt").val(imagen);
	    $("#txtRutaImgArt").val(imagen);
	    $("#txtRutaImgArt").show();
	//    $("#txtRutaImgArt").prop("disabled", true);


}
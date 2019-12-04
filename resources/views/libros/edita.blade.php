<!-- Modal -->
<div id="miModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Contenido del modal -->
    <div class="modal-content">
      <div class="modal-body">
      	<h3 class="text-center">Registrar Usuario</h3>
      	<br>
        <input type="hidden" id="cod" value="{{$libro->CodLibro}}">
      	<div class="row form-group">
      		<div class="col-md-2"></div>
      		<div class="col-md-3"><label class="control-label">DNI</label></div>
      		<div class="col-md-5"><input type="text" id="DNI" class="form-control" value="{{$libro->TitLibro}}"></div>
      		<div class="col-md-2"></div>
      	</div>
      	<div class="row form-group">
      		<div class="col-md-2"></div>
      		<div class="col-md-3"><label class="control-label">Apellidos</label></div>
      		<div class="col-md-5"><input type="text" id="Apellidos" class="form-control" value="{{$libro->AnoLibro}}"></div>
      		<div class="col-md-2"></div>
      	</div>
      	<div class="row form-group">
      		<div class="col-md-2"></div>
      		<div class="col-md-3"><label class="control-label">Nombres</label></div>
      		<div class="col-md-5"><input type="text" id="Nombres" class="form-control" value="{{$libro->nombres}}"></div>
      		<div class="col-md-2"></div>
      	</div>
      	<div class="row form-group">
      		<div class="col-md-2"></div>
      		<div class="col-md-3"><label class="control-label">Direccion</label></div>
      		<div class="col-md-5"><input type="text" id="Direccion" class="form-control" value="{{$libro->direccion}}"></div>
      		<div class="col-md-2"></div>
      	</div>
      	<div class="row form-group">
      		<div class="col-md-2"></div>
      		<div class="col-md-3"><label class="control-label">Fecha Nacimiento</label></div>
      		<div class="col-md-5"><input type="date" id="Fecha" class="form-control" value="{{$libro->fechanacimiento}}"></div>
      		<div class="col-md-2"></div>
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" onclick="registrar()">Registrar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
	$("#miModal").modal("show");
	function registrar(){
		var DNI = $('#DNI').val();
		var Apellidos = $('#Apellidos').val();
		var Nombres = $('#Nombres').val();
		var Direccion = $('#Direccion').val();
    var Fecha = $('#Fecha').val();
    var cod = $('#cod').val();
		$.ajax({
			url: "{{route('libro.editar')}}",
			method: "POST",
			data: {cod:cod,DNI:DNI,Apellidos:Apellidos,Nombres:Nombres,Direccion:Direccion,Fecha:Fecha},
			async: true,
			dataType: "HTML",
			success: function (data) {
				alert(data);
				fn("#tabla","{{route('libro.listar')}}");
			},
			beforeSend: function () {
				/*
				$('#resultado_busqueda').empty();
				var loader1 = document.getElementById('loader1');
				loader1.removeAttribute('hidden');
				*/
			},
			complete: function () {
				/*
				var loader1 = document.getElementById('loader1');
				loader1.setAttribute('hidden','');
				*/
			},
			error: function (xhr) {
				console.log(xhr.status + ": " + xhr.responseText);
				alert("Error");
			}
		});
	}	
</script>
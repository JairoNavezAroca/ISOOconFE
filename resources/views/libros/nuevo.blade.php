<!-- Modal -->
<div id="miModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Contenido del modal -->
    <div class="modal-content">
      <div class="modal-body">
      	<h3 class="text-center">Registrar Usuario</h3>
      	<br>
      	<div class="row form-group">
      		<div class="col-md-2"></div>
      		<div class="col-md-3"><label class="control-label">CodLibro</label></div>
      		<div class="col-md-5"><input type="text" id="CodLibro" class="form-control"></div>
      		<div class="col-md-2"></div>
      	</div>
      	<div class="row form-group">
      		<div class="col-md-2"></div>
      		<div class="col-md-3"><label class="control-label">TitLibro</label></div>
      		<div class="col-md-5"><input type="text" id="TitLibro" class="form-control"></div>
      		<div class="col-md-2"></div>
      	</div>
      	<div class="row form-group">
      		<div class="col-md-2"></div>
      		<div class="col-md-3"><label class="control-label">AnoLibro</label></div>
      		<div class="col-md-5"><input type="text" id="AnoLibro" class="form-control"></div>
      		<div class="col-md-2"></div>
      	</div>
        <div class="row form-group">
          <div class="col-md-2"></div>
          <div class="col-md-3"><label class="control-label">IdAutor</label></div>
          <select id="IdAutor">
            @foreach($autor as $item)
              <option value="{{$item->IdAutor}}">{{$item->ApeAutor}} {{$item->NomAutor}}</option>
            @endforeach
          </select>
          <div class="col-md-2"></div>
        </div>
        <div class="row form-group">
          <div class="col-md-2"></div>
          <div class="col-md-3"><label class="control-label">IdEditorial</label></div>
          <select id="IdEditorial">
            @foreach($editorial as $item)
              <option value="{{$item->IdEditorial}}">{{$item->ApeAutor}} {{$item->NomAutor}}</option>
            @endforeach
          </select>
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
		var CodLibro = $('#CodLibro').val();
		var TitLibro = $('#TitLibro').val();
		var AnoLibro = $('#AnoLibro').val();
		var IdAutor = $('#IdAutor').val();
		var IdEditorial = $('#IdEditorial').val();
		$.ajax({
			url: "{{route('libro.registrar')}}",
			method: "POST",
			data: {CodLibro:CodLibro,TitLibro:TitLibro,AnoLibro:AnoLibro,IdAutor:IdAutor,IdEditorial:IdEditorial},
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
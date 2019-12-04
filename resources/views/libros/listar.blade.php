<style type="text/css">
	table.dataTable thead {background-color:black}
</style>
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<table id="datatable" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>codigo</th>
					<th>dni</th>
					<th>apellidos</th>
					<th>nombres</th>
					<th>direccion</th>
					<th>fechanacimiento</th>
					<th>usu_estado</th>
					<th>opciones</th>
				</tr>
			</thead>
			<tbody> 
				@foreach($clientes as $item)
					<tr>
						<td>{{$item->codigo}}</td>
						<td>{{$item->dni}}</td>
						<td>{{$item->apellidos}}</td>
						<td>{{$item->nombres}}</td>
						<td>{{$item->direccion}}</td>
						<td>{{$item->fechanacimiento}}</td>
						<td>
							@if($item->usu_estado == 1)
								Habilitado
							@else
								Deshabilitado
							@endif
						</td>
						<td>
							<button class="btn btn-warning" onclick="edita('{{$item->codigo}}')">Editar</button>
							@if($item->usu_estado == 1)
								<button class="btn btn-danger" onclick="cambia_estado('{{$item->codigo}}')">Deshablitar</button>
							@else
								<button class="btn btn-success" onclick="cambia_estado('{{$item->codigo}}')">Hablititar</button>
							@endif
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="col-md-1"></div>
</div>
<script type="text/javascript">
	function edita(cod){
		var datos = {cod:cod}
		fn("#modal","{{route('cliente.edita')}}",datos);
	}
	function cambia_estado(cod){
		var datos = {cod:cod}
		$.ajax({
			url: "{{route('cliente.cambia_estado')}}",
			method: "get",
			data: datos,
			async: true,
			dataType: "HTML",
			success: function (data) {
				alert(data);
				fn("#tabla","{{route('cliente.listar')}}");
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
<style type="text/css">
	table.dataTable thead {background-color:black}
</style>
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<table id="datatable" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>CodLibro</th>
					<th>TitLibro</th>
					<th>AñoLibro</th>
					<th>Autor</th>
					<th>IdEditorial</th>
					<th>opciones</th>
				</tr>
			</thead>
			<tbody> 
				@foreach($libros as $item)
					<tr>
						<td>{{$item->CodLibro}}</td>
						<td>{{$item->TitLibro}}</td>
						<td>{{$item->AnoLibro}}</td>
						<td>{{$item->IdAutor}}</td>
						<td>{{$item->IdEditorial}}</td>
						{{--
						<td>
							@if($item->usu_estado == 1)
								Habilitado
							@else
								Deshabilitado
							@endif
						</td>
						--}}
						<td>
							<button class="btn btn-warning" onclick="edita('{{$item->CodLibro}}')">Editar</button>
							{{--
							@if($item->usu_estado == 1)
								<button class="btn btn-danger" onclick="cambia_estado('{{$item->CodLibro}}')">Deshablitar</button>
							@else
								<button class="btn btn-success" onclick="cambia_estado('{{$item->CodLibro}}')">Hablititar</button>
							@endif
							--}}
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
		fn("#modal","{{route('libro.edita')}}",datos);
	}
	function cambia_estado(cod){
		var datos = {cod:cod}
		$.ajax({
			url: "{{route('libro.cambia_estado')}}",
			method: "get",
			data: datos,
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
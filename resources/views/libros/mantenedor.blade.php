@extends('layouts.layout')
@section('arriba')
<style type="text/css">
	@-webkit-keyframes spinner-border {
		to {
			-webkit-transform: rotate(360deg);
			transform: rotate(360deg)
		}
	}
	@keyframes spinner-border {
		to {
			-webkit-transform: rotate(360deg);
			transform: rotate(360deg)
		}
	}
	.spinner-border {
		display: inline-block;
		width: 2rem;
		height: 2rem;
		vertical-align: text-bottom;
		border: .25em solid currentColor;
		border-right-color: transparent;
		border-radius: 50%;
		-webkit-animation: spinner-border .75s linear infinite;
		animation: spinner-border .75s linear infinite
	}
	.spinner-border-sm {
		width: 1rem;
		height: 1rem;
		border-width: .2em
	}
	@-webkit-keyframes spinner-grow {
		0% {
			-webkit-transform: scale(0);
			transform: scale(0)
		}
		50% {
			opacity: 1
		}
	}
</style>
@stop
@section('content')
	<br><br>
	<center>
		<h3>Lista de Libros</h3>
		<div id="loader" hidden="">
			<div class="spinner-border text-primary"></div>
		</div>
	</center>
	<br>
	<div id="tabla"></div>
	<center>
		<button class="btn btn-primary" onclick="nuevo()">Registrar</button>
	</center>
	<div id="modal"></div>
@stop
@section('abajo')
<script type="text/javascript">
	fn("#tabla","{{route('libro.listar')}}");
	function nuevo(){
		fn("#modal","{{route('libro.nuevo')}}");
	}
	function fn(campo,pagina,datos){
		$.ajax({
			url: pagina,
			method: "GET",
			data: datos,
			async: true,
			dataType: "HTML",
			success: function (data) {
				$(campo).empty();
				$(campo).append(data);
			},
			beforeSend: function () {
				var loader = document.getElementById('loader');
				loader.removeAttribute('hidden');
			},
			complete: function () {
				var loader = document.getElementById('loader');
				loader.setAttribute('hidden','');
			},
			error: function (xhr) {
				console.log(xhr.status + ": " + xhr.responseText);
				alert("Error");
			}
		});
	}
</script>
@stop
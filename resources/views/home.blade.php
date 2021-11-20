@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Estadísticas</h3>
	  <link rel="stylesheet" type="text/css" href="css/Reloj/estilo.css">

	<div class="flex">
		<div class="contenido">
			<div class="reloj">
				<img src="img/Reloj/aguja.png" id="horas">
				<img src="img/Reloj/agujaMinutos.png" id="minutos">
				<img src="img/Reloj/agujaSegundos.png" id="segundos">
			</div>
		</div>
		<div class="contenido">
			<h4 id="h4-content">¡Hora actual!</h4>
			<p id="p-content"></p>
		</div>
	</div>
<script src="js/Reloj/script.js"></script>
 
	</div>
</div>


@endsection
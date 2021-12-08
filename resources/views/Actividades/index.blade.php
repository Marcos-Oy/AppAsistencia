@extends ('layouts.admin')
@section ('contenido')

<p type="hidden" {{$rol=Auth::user()->role }}></p>
@if($rol == 'Administrador' || $rol == 'Coordinador'||$rol == 'Docente')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Actividades
			@if($rol == 'Administrador' || $rol == 'Coordinador'||$rol == 'Docente')
			<a href="Actividades/create"><button class="btn btn-success"><i class="fa fa-plus" aria-hidden="true">
						Nuevo</i></button></a>
			@endif
		</h3>
		@include('Actividades.search')
	</div>
</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>TOTAL HORAS</th>
				</thead>

				@foreach ($actividades2 as $acti2)
				<tr>
					<td>{{ $acti2->HORAS }}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$actividades->render()}}
	</div>
</div>



<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>USUARIO</th>
					<th>ESTABLECIMIENTO</th>
					<th>FECHA</th>
					<th>HORA DE INICIO</th>
					<th>HORA DE TERMINO</th>
					<th>OBSERVACIONES</th>
					<th>ACCIONES</th>
				</thead>

				@foreach ($actividades as $acti)
				<tr>
					<td>{{ $acti->name}}</td>
					<td>{{ $acti->descestablecimiento}}</td>
					<td>{{ $acti->Fecha}}</td>
					<td>{{ $acti->HoraInicio}}</td>
					<td>{{ $acti->HoraFin}}</td>
					<td>{{ $acti->Observaciones}}</td>
					<td>

						<a href="{{URL::action('ActividadesController@edit',$acti->id)}}"><button
								class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true">
									Editar</i></button></a>
						<a href="" data-target="#modal-delete-{{$acti->id}}" data-toggle="modal"><button
								class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true">
									Eliminar</i></button></a>
					</td>
				</tr>
				@include('actividades.modal')

				@endforeach

			</table>
		</div>
		{{$actividades->render()}}
	</div>
</div>

@push ('scripts')
<script>
	$('#liAcceso').addClass("treeview active");
	$('#liUsuarios').addClass("active");
</script>
@endpush
@endif

@endsection
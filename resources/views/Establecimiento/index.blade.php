@extends ('layouts.admin')
@section ('contenido')

<p type="hidden" {{$rol=Auth::user()->role }}></p>
@if($rol == 'Administrador' || $rol == 'Coordinador'||$rol == 'Docente')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Establecimiento
			@if($rol == 'Administrador' || $rol == 'Coordinador'||$rol == 'Docente')
			<a href="Establecimiento/create"><button class="btn btn-success"><i class="fa fa-plus" aria-hidden="true">
						Nuevo</i></button></a>
			@endif
		</h3>
		@include('Establecimiento.search')
	</div>
</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>

					<th>DESCRIPCIÓN DEL ESTABLECIMIENTO</th>
					<th>ACCIONES</th>
				</thead>
				@foreach ($establecimiento as $esta)
				<tr>

					<td>{{ $esta->descestablecimiento}}</td>
					<td>
						<a href="{{URL::action('EstablecimientoController@edit',$esta->idestablecimiento)}}"><button
								class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true">
									Editar</i></button></a>
						<a href="" data-target="#modal-delete-{{$esta->idestablecimiento}}" data-toggle="modal"><button
								class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true">
									Eliminar</i></button></a>
					</td>
				</tr>
				@include('establecimiento.modal')
				@endforeach
			</table>
		</div>
		{{$establecimiento->render()}}
	</div>
</div>
@push ('scripts')
<script>
	$('#liAcceso').addClass("treeview active");
	$('#liUsuarios').addClass("active");
</script>
@endpush
@endif
@if($rol == 'Operador'|| $rol == 'Gerente'|| $rol == 'Visita')
<div class="alert alert-danger text-center" role="alert">
	<h3 class="alert-heading text-center">Acceso Denegado!</h3>
	<hr>
	<p class="text-center">No dispone de permisos para ingresar a esta ventana, para volver haga <a
			href="{{url('home')}}" class="alert-link text-center">Click Aqui</a>.</p>
</div>
@endif
@endsection
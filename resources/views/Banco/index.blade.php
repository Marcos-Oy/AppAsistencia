@extends ('layouts.admin')
@section ('contenido')

<p type="hidden" {{$rol=Auth::user()->role }}></p>
@if($rol == 'Administrador' || $rol == 'Coordinador')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Banco
			@if($rol == 'Administrador' || $rol == 'Coordinador'||$rol == 'Docente')
			<a href="Banco/create"><button class="btn btn-success"><i class="fa fa-plus" aria-hidden="true">
						Nuevo</i></button></a>
			@endif
		</h3>
		@include('Banco.search')
	</div>
</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<!--<th>ID</th>-->
					<th>TIPO</th>
					<th>NOMBRE</th>
					<th>CÓDIGO SBIF</th>
					<th>CÓDIGO REGISTRO</th>
					<th>ACCIONES</th>
				</thead>
				@foreach ($banco as $ban)
				<tr>
					<!--<td>{{ $ban->id}}</td>-->
					<td>{{ $ban->tipo}}</td>
					<td>{{ $ban->nombre}}</td>
					<td>{{ $ban->codigoSBIF}}</td>
					<td>{{ $ban->codigoRegistro}}</td>
					<td>
						<a href="{{URL::action('BancoController@edit',$ban->id)}}"><button class="btn btn-warning"><i
									class="fa fa-pencil-square-o" aria-hidden="true"> Editar</i></button></a>
						<a href="" data-target="#modal-delete-{{$ban->id}}" data-toggle="modal"><button
								class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true">
									Eliminar</i></button></a>
					</td>
				</tr>
				@include('Banco.modal')
				@endforeach
			</table>
		</div>
		{{$banco->render()}}
	</div>
</div>
@push ('scripts')
<script>
	$('#liAcceso').addClass("treeview active");
	$('#liUsuarios').addClass("active");
</script>
@endpush
@endif
@if($rol == 'Coordinador'|| $rol == 'Docente')
<div class="alert alert-danger text-center" role="alert">
	<h3 class="alert-heading text-center">Acceso Denegado!</h3>
	<hr>
	<p class="text-center">No dispone de permisos para ingresar a esta ventana, para volver haga <a
			href="{{url('home')}}" class="alert-link text-center">Click Aqui</a>.</p>
</div>
@endif
@endsection
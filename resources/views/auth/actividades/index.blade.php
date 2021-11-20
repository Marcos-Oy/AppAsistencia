@extends ('layouts.admin')
@section ('contenido')

<p type="hidden" {{$rol = Auth::user()->role }}></p>
@if($rol == 'Administrador' || $rol == 'Habilitador'||$rol == 'Docente')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Actividades
            @if($rol == 'Administrador' || $rol == 'Habilitador'||$rol == 'Docente')	 
				<a href="actividades/create"><button class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"> Nuevo</i></button></a>
			@endif
		</h3>
		@include('actividades.search')
	</div>
</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>PERSONA</th>
					<th>MODALIDAD</th>
					<th>ESTABLECIMIENTO</th>
					<th>FECHA</th>
					<th>HORA INICIO</th>
                    <th>HORA FIN</th>
                    <th>OBSERVACIONES</th>
                    <th>ACCIONES</th>
				</thead>
               @foreach ($usuarios as $usu)
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
                    <td></td>
                    <td></td>
                    <td></td>
					<td>
						<a href="{{URL::action('ActividadesController@edit',$usu->id)}}"><button class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"> Editar</i></button></a>
                         <a href="" data-target="#modal-delete-{{$usu->id}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"> Eliminar</i></button></a>
					</td>
				</tr>
				@include('actividades.modal')
				@endforeach
			</table>
		</div>
		{{$usuarios->render()}}
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
        <p class="text-center">No dispone de permisos para ingresar a esta ventana, para volver haga <a href="{{url('home')}}" class="alert-link text-center">Click Aqui</a>.</p>
    </div>
@endif
@endsection
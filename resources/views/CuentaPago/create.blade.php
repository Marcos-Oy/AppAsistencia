@extends ('layouts.admin')
@section ('contenido')
<?php use App\Http\Controllers\BancoController;

?>

<p type="hidden" {{$rol=Auth::user()->role }}></p>
@if($rol == 'Administrador' || $rol == 'Coordinador')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Ingresar Nueva Cuenta</h3>

        <hr>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {!!Form::open(array('url'=>'CuentaPago','method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}

        <div class="form-group">
            <label for="nombre">Número de cuenta</label>
            <input type="number" min="0" id="nmro_cuenta" name="nmro_cuenta" class="form-control" placeholder="desc">    
        </div>

        <!-- selectpicker -->
            <div class="form-group">
                <label for="instituciones">Instituciones</label>
                <select id="instituciones_id" name="instituciones_id" class="form-control" data-live-search="true">
                <option>Seleccionar banco</option>
                    @foreach($banco as $ban)
                    <option value="{{$ban->id}}">{{$ban->nombre}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="users">Personal</label>
                <select name="users_id" id="users_id" class="form-control" data-live-search="true">
                <option>Seleccionar usuario</option>
                    @foreach($usuarios as $usu)
                    <option value="{{$usu->id}}">{{$usu->name}}</option>
                    @endforeach
                </select>
            </div>


        <div class="form-group">
            <label>Tipo de Cuenta</label>
            <select name="tipo_cuenta" class="form-control" id="tipo_cuenta"  data-live-search="true">
                <option>Seleccionar tipo de cuenta</option>
                <option value="Principal">Principal</option>
                <option value="NoPrincipal">No Principal</option>
            </select>
        </div>


        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <button class="btn btn-primary" type="submit"><i class="fa fa-floppy-o" aria-hidden="true">
                        Guardar</i></button>
                <button class="btn btn-danger" type="reset"><i class="fa fa-times" aria-hidden="true">
                        Cancelar</i></button>
            </div>
        </div>

        {!!Form::close()!!}
    </div>
</div>

@push ('scripts')
<script>
    $('#liAcceso').addClass("treeview active");
    $('#liUsuarios').addClass("active");
</script>
@endpush

@endif



@if($rol == 'Docente')
<div class="alert alert-danger text-center" role="alert">
    <h3 class="alert-heading text-center">Acceso Denegado!</h3>
    <hr>
    <p class="text-center">No dispone de permisos para ingresar a esta ventana, para volver haga <a
            href="{{url('home')}}" class="alert-link text-center">Click Aqui</a>.</p>
</div>
@endif
@endsection
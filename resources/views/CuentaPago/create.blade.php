@extends ('layouts.admin')
@section ('contenido')

<p type="hidden" {{$rol = Auth::user()->role }}></p>
@if($rol == 'Administrador')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Ingresar nueva intirución</h3>
        
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

        {!!Form::open(array('url'=>'Banco','method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="desc">    
        </div>


        
        
        <div class="form-group">
            <label>Tipo de institución</label>
            <select name="tipo" class="form-control" id="tipo" placeholder="seleccionar">         
                <option value="Bancos">Bancos</option>
                <option Selected value="Cooperativas de Ahorro y Crédito">Cooperativas de Ahorro y Crédito</option>        
            </select>
        </div>



        <div class="form-group">
            <label for="nombre">codigoSBIF</label>
            <input type="text" id="codigoSBIF" name="codigoSBIF" class="form-control" placeholder="desc">    
        </div>
        
        

        <div class="form-group">
            <label for="nombre">codigoRegistro</label>
            <input type="text" id="codigoRegistro" name="codigoRegistro" class="form-control" placeholder="desc">    
        </div>



        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <button class="btn btn-primary" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"> Guardar</i></button>
                <button class="btn btn-danger" type="reset"><i class="fa fa-times" aria-hidden="true"> Cancelar</i></button>
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



@if($rol == 'Operador'|| $rol == 'Gerente'|| $rol == 'Visita')
    <div class="alert alert-danger text-center" role="alert">
        <h3 class="alert-heading text-center">Acceso Denegado!</h3>
        <hr>
        <p class="text-center">No dispone de permisos para ingresar a esta ventana, para volver haga <a href="{{url('home')}}" class="alert-link text-center">Click Aqui</a>.</p>
    </div>
@endif
@endsection
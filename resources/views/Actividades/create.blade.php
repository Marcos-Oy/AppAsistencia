@extends ('layouts.admin')
@section ('contenido')

<p type="hidden" {{$rol = Auth::user()->role }}></p>
@if($rol == 'Administrador')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Ingresar nueva actividad</h3>
        
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

        {!!Form::open(array('url'=>'Actividades','method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}

        <div class="form-group">
            <label for="nombre">Usuario</label>
            <input type="text" id="user_id" name="user_id" class="form-control" placeholder="Usuario">    
        </div>



        <div class="form-group">
            <label for="nombre">Establecimiento</label>
            <input type="text" id="establecimiento_id" name="establecimiento_id" class="form-control" placeholder="Establecimiento">    
        </div>



        <div class="form-group">
            <label for="nombre">Fecha</label>
            <input type="date" id="Fecha" name="Fecha" class="form-control">    
        </div>



        <div class="form-group">
            <label for="nombre">Hora de inicio</label>
            <input type="time" id="horaInicio" name="horaInicio" class="form-control">    
        </div>



        <div class="form-group">
            <label for="nombre">Hora de termino</label>
            <input type="time" id="horaFin" name="horaFin" class="form-control">    
        </div>


        
        <div class="form-group">
            <label for="nombre">Observaciones</label>
            <input type="text" id="Observaciones" name="Observaciones" class="form-control" placeholder="Observaciones">    
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
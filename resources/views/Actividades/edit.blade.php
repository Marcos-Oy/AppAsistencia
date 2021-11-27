@extends ('layouts.admin')
@section ('contenido')

<p type="hidden" {{$rol = Auth::user()->role }}></p>
@if($rol == 'Administrador')
<div class="row">
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        

        {!!Form::model($Actividades,['method'=>'PATCH','route'=>['Actividades.update',$Actividades->id]])!!}
        {{Form::token()}}



        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">,
                <label for="name" class="control-label">Usuario</label>
                
                    <input id="user_id" type="text" class="form-control" name="user_id" value="{{$Actividades->user_id}}" placeholder="Usuario">
                    @if ($errors->has('user_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('user_id') }}</strong>
                    </span>
                    @endif
                
            </div>
        </div>


        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="control-label">Establecimiento</label>
                
                    <input id="establecimiento_id" type="text" class="form-control" name="establecimiento_id" value="{{$Actividades->establecimiento_id}}" placeholder="Establecimiento">
                    @if ($errors->has('establecimiento_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('establecimiento_id') }}</strong>
                    </span>
                    @endif
                
            </div>
        </div>


        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="control-label">Fecha</label>
                
                    <input id="fecha" type="date" class="form-control" name="fecha" value="{{$Actividades->Fecha}}">
                    @if ($errors->has('fecha'))
                    <span class="help-block">
                        <strong>{{ $errors->first('fecha') }}</strong>
                    </span>
                    @endif
                
            </div>
        </div>

       



        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="control-label">Hora de Inicio</label>
                
                    <input id="horaInicio" type="time" class="form-control" name="horaInicio" value="{{$Actividades->horaInicio}}">
                    @if ($errors->has('horaInicio'))
                    <span class="help-block">
                        <strong>{{ $errors->first('horaInicio') }}</strong>
                    </span>
                    @endif
                
            </div>
        </div>

        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="control-label">Hora de termino</label>
                
                    <input id="horaFin" type="time" class="form-control" name="horaFin" value="{{$Actividades->horaFin}}">
                    @if ($errors->has('horaFin'))
                    <span class="help-block">
                        <strong>{{ $errors->first('horaFin') }}</strong>
                    </span>
                    @endif
                
            </div>
        </div>



        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="control-label">Observaciones</label>
                
                    <input id="observaciones" type="text" class="form-control" name="observaciones" value="{{$Actividades->Observaciones}}" placeholder="Observaciones">
                    @if ($errors->has('observaciones'))
                    <span class="help-block">
                        <strong>{{ $errors->first('observaciones') }}</strong>
                    </span>
                    @endif
                
            </div>
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
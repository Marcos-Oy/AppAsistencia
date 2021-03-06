@extends ('layouts.admin')
@section ('contenido')

<p type="hidden" {{$rol = Auth::user()->role }}></p>
@if($rol == 'Administrador')
<div class="row">
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        

        {!!Form::model($Actividades,['method'=>'PATCH','route'=>['Actividades.update',$Actividades->id]])!!}
        {{Form::token()}}



        <div class="form-group">
            <label for="nombre">Usuario</label>
            <select required name="user_id" id="user_id" class="form-control" data-live-search="true">
                <option>Seleccionar Usuario</option>
                @foreach($usuarios as $usu)
                <option value="{{$usu->id}}">{{$usu->name}}</option>
                @endforeach
            </select>
        </div>



        <div class="form-group">
            <label for="nombre">Establecimiento</label>
            <select required name="idestablecimiento" id="idestablecimiento" class="form-control"
                data-live-search="true">
                <option>Seleccionar Establecimiento</option>
                @foreach($establecimiento as $esta)
                <option value="{{$esta->idestablecimiento}}">{{$esta->descestablecimiento}}</option>
                @endforeach
            </select>
        </div>


        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="control-label">Fecha</label>
                
                    <input id="Fecha" type="date" class="form-control" name="Fecha" value="{{$Actividades->Fecha}}">
                    @if ($errors->has('fecha'))
                    <span class="help-block">
                        <strong>{{ $errors->first('fecha') }}</strong>
                    </span>
                    @endif
                
            </div>
        </div>

        <h1><?php echo $Actividades->horaInicio ?></h1>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="control-label">Hora de Inicio</label>
                
                    <input id="HoraInicio" type="time" class="form-control" name="HoraInicio" value="{{$Actividades->HoraInicio}}">
                    @if ($errors->has('HoraInicio'))
                    <span class="help-block">
                        <strong>{{ $errors->first('HoraInicio') }}</strong>
                    </span>
                    @endif
                
            </div>
        </div>

        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="control-label">Hora de termino</label>
                
                    <input id="HoraFin" type="time" class="form-control" name="HoraFin" value="{{$Actividades->HoraFin}}">
                    @if ($errors->has('HoraFin'))
                    <span class="help-block">
                        <strong>{{ $errors->first('HoraFin') }}</strong>
                    </span>
                    @endif
                
            </div>
        </div>



        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="control-label">Observaciones</label>
                
                    <input id="Observaciones" type="text" class="form-control" name="Observaciones" value="{{$Actividades->Observaciones}}" placeholder="Observaciones">
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


@if($rol == 'Docente'|| $rol == 'Gerente'|| $rol == 'Visita')
    <div class="alert alert-danger text-center" role="alert">
        <h3 class="alert-heading text-center">Acceso Denegado!</h3>
        <hr>
        <p class="text-center">No dispone de permisos para ingresar a esta ventana, para volver haga <a href="{{url('home')}}" class="alert-link text-center">Click Aqui</a>.</p>
    </div>
@endif
@endsection
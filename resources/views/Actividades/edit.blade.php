@extends ('layouts.admin')
@section ('contenido')

<p type="hidden" {{$rol = Auth::user()->role }}></p>
@if($rol == 'Administrador')
<div class="row">
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        

        {!!Form::model($Actividades,['method'=>'PATCH','route'=>['Actividades.update',$Actividades->id]])!!}
        {{Form::token()}}
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="control-label">Asiste</label>
                
                    <input id="asiste" type="text" class="form-control" name="asiste" value="{{$Actividades->asiste}}" placeholder="Asiste...">
                    @if ($errors->has('asiste'))
                    <span class="help-block">
                        <strong>{{ $errors->first('asiste') }}</strong>
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
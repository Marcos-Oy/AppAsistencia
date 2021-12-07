{!! Form::open(array('url'=>'Actividades','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}


<div class="form-group">
	<div class="input-group">

		<label for="FechaD">Fecha desde:</label>
		<input required type="date" id="FechaD" name="FechaD" class="form-control">

	</div>

	<div class="input-group">

		<label for="FechaH">Fecha hasta:</label>
		<input required type="date" id="FechaH" name="FechaH" class="form-control">

	</div>
	<br>


	<div class="form-group">
		<label for="nombre">Usuarios</label>
		<select required name="searchText" id="searchText" class="form-control" data-live-search="true">
			<option>Selecccionar usuario</option>
			@foreach($usuarios as $usu)
			<option value="{{$usu->id}}">{{$usu->name}}</option>
			@endforeach
		</select>
	</div>
	<button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true">Buscar</i></button>



	<!--
	<div class="input-group">
		<input type="text" class="form-control" name="searchText" placeholder="Buscar..." value="{{$searchText}}">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true">
					Buscar</i></button>
		</span>
	</div>
-->

</div>

{{Form::close()}}
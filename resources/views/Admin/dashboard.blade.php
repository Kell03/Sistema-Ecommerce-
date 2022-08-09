@extends('Admin.plantilla')

@section('title')
Inicio
@endsection

@section('content')
<div class="container-fluid">
	<div class="panel shadow">
		
		<div class="header">
			

			<h2 class="title">
				<a href="{{route('dashboard')}}" class="nav-link"> Home <i class="fa-solid fa-house"></i></a>
			</h2>
		</div>
	

	
</div>
@if(kvfj(auth::user()->permission, 'estadisticas_rapidas'))
<div class="row">{{--div del row--}}

	<div class="col-md-3">{{--div de la columna--}}

<div class="card carta_estadistica mb-3 mtop16" >
  <div class="card-header"><h3>Usuarios</h3></div>
  <div class="card-body">
    <h5 class="card-title">Usuarios Registrados</h5>
    <h2 class="card-text" align="center">{{$user}}</h2>
  </div>
</div>
</div>{{--div de la columna--}}


<div class="col-md-3">{{--div de la columna--}}

<div class="card carta_estadistica mb-3 mtop16" >
  <div class="card-header"><h3>Productos</h3></div>
  <div class="card-body">
    <h5 class="card-title">Productos disponibles</h5>
    <h2 class="card-text" align="center">{{$products}}</h2>
  </div>
</div>
</div>{{--div de la columna--}}



@if(kvfj(auth::user()->permission, 'estadisticas_admin'))
<div class="col-md-3">{{--div de la columna--}}

<div class="card carta_estadistica mb-3 mtop16" >
  <div class="card-header"><h3>Ordenes</h3></div>
  <div class="card-body">
    <h5 class="card-title">Ordenes de hoy</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
</div>{{--div de la columna--}}


<div class="col-md-3">{{--div de la columna--}}

<div class="card carta_estadistica mb-3 mtop16" >
  <div class="card-header"><h3>Facturas</h3></div>
  <div class="card-body">
    <h5 class="card-title">Facturas de hoy</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
</div>{{--div de la columna--}}
@endif

</div>{{--div del row--}}
@endif

</div>
@endsection
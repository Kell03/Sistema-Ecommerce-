@extends('Admin.plantilla')
@section('title')
Users
@endsection

@section('breadcrumb')

<li class="breadcrumb-item">
	 Usuarios <i class="fa-solid fa-users"></i> 
</li>
@endsection 

@section('content')
<div class="container-fluid">
	<div class="panel shadow">

		<div class="header">
			

			<h2 class="title">
				 Usuarios <i class="fa-solid fa-users"></i>  <h1>	
			</h2>
		</div>
	


	<div class="inside">

		<div class="row">
			
        <div class="col-md-2 offset-md-10">
        	
          
   <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="width:100%;">
    <i class="fa-solid fa-filter"></i> Filter
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="{{route('index_user')}}">Todos</a></li>
    <li><a class="dropdown-item" href="{{route('index_user', $var='1')}}">Activos</a></li>
    <li><a class="dropdown-item" href="{{route('index_user', $var='0')}}">Inactivos</a></li>
  </ul>
</div>



        </div>


		</div>

		<table class="table ">
			
			<thead>
				
			<tr>
				<hr>	
				<th>ID</th>
				<th>Name</th>
				<th>Surname</th>
				<th>Email</th>
				<th>Options</th>				
			</tr>
			</thead>
			<tbody>
			@foreach($user as $users)
			@if($users->status == 0  || $users->status == 2 )
			<tr class="table-danger">
            @endif


				<td>{{$users->id}}</td>
				<td>{{$users->name}}</td>
				<td>{{$users->surname}}</td>
				<td>{{$users->email}}</td>
				<td>
                <div class="opts">

				@if(  auth::user()->role == '1') {{-- si el usuario es administrador: que le aparezaca para editar todas las filas--}}
				
				<a href="{{route('edit_user',$users->id)}}" data-toggle="tooltip" data-bs-placement="top" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>

				@else{{--Si no que solo le aparezca la opcion para editar a solo su usuario--}}

				@if($users->id == auth::user()->id)
				<a href="{{route('edit_user',$users->id)}}" data-toggle="tooltip" data-bs-placement="top" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
				@endif
				
				@endif



				@if(kvfj(auth::user()->permission, 'permission_user'))
				<a href="{{route('permission_user', $users->id)}}" data-toggle="tooltip" data-bs-placement="top" title="Editar Permisos"><i class="fa-solid fa-gears"></i></a>
				@endif

				

				<a href="" data-toggle="tooltip" data-bs-placement="top" title="Eliminar"><i class="fa-solid fa-trash-can"></i></a>
                </div>
			   </td>
				
			</tr>
				

			@endforeach
			</tbody>
			
		</table>



</div>

</div>
</div>
@endsection
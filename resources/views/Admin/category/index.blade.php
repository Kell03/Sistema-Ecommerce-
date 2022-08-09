@extends('admin.plantilla')

@section('title')
Categories
@endsection


@section('breadcrumb')

<li class="breadcrumb-item">
	Categories <i class="fa-solid fa-clipboard-list"></i>

</li>
@endsection


@section('content')

<div class="container-fluid">


	
<div class="panel shadow">

	<div class="header">
	    Categories <i class="fa-solid fa-clipboard-list"></i>
	</div>
	

	<div class="inside">

		@if(kvfj(auth::user()->permission, 'create_category'))
		
<div class="btns mtbottom16"><a href="{{route('create_category')}}" class="btn btn-primary"> <i class="fa-solid fa-plus"></i>  Add Category</a></div>
@endif

		<table class="table">

			<thead>
				<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Module</th>
				<th>Icon</th>
				<th>Option</th>
                </tr>
			</thead>
			<tbody>
				@foreach($category as $categories)
				<tr>

					<td>{{$categories->id_category}}</td>
					<td>{{$categories->name}}</td>
					<td>{{$categories->module}}</td>
					<td>{{$categories->icon}}</td>
					<td>    
					<div class="opts">

				<form action="{{route('category.delete', $categories->id_category)}}" method="POST">
       				
                    @csrf @method('DELETE')

                 @if(kvfj(auth::user()->permission, 'edit_category'))
				<a href="{{route('edit_category', $categories->id_category)}}" data-toggle="tooltip" data-bs-placement="top" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
				@endif

                                     
                  {{-- elemento "a" como boton submit--}}

                  @if(kvfj(auth::user()->permission, 'category.delete'))
                   <a href="#" onclick='this.parentNode.submit(); return false;' data-toggle="tooltip" data-bs-placement="top" title="Eliminar" style="color:red"> 
                                               <i class="fa-solid fa-trash-can"></i></a>
                  @endif

                      {{-- elemento "a" como boton submit--}}


       			</form>


             
                </div>
					

				</tr>
				@endforeach

			</tbody>

		</table>
	</div>
</div>

</div>

@endsection
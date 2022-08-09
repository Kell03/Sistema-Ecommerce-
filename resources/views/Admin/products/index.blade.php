@extends('Admin.plantilla')

@section('title')
Productos
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
	 Productos <i class="fa-solid fa-boxes-stacked"></i>
</li>
@endsection


@section('content')
<div class="container-fluid">
	<div class="panel shadow">
		<div class="header">
			<div class="row">

        <div class="col-md-4">

			<h2 class="title">
				 Productos <i class="fa-solid fa-boxes-stacked"></i>
			</h2>

      </div>
    
 
<div class="col-md-8" >
<div class="dropdown">
  <button class=" lista_estado btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-list"></i>
  </button>
  <ul class="dropdown-menu dropdown-menu">
    <li><a class="dropdown-item" id="borrador" href="{{route('index_product')}}">Todos</a></li>
    <li><a class="dropdown-item" id="publico" href="{{route('index_product',$estado = '1')}}">Publico</a></li>
    <li><a class="dropdown-item" id="borrador" href="{{route('index_product',$estado = '0')}}">Borrador</a></li>
    <li><a class="dropdown-item" id="papelera" href="{{route('index_product',$estado = 'trash')}}">Papelera</a></li>
    
    

  </ul>
</div>

  </div>

    </div>
  </div>

		<div class="inside">
	  <div class="row">

      

      <div class="col-md-2">
      @if(kvfj(auth::user()->permission, 'create_product'))
      <div class="btns mtbottom16">
      	<a href="{{route('create_product')}}"  class="btn btn-primary"> <i class="fa-solid fa-plus"></i> Agregar Producto</a>
        </div>
      @endif
      </div>

<div class="col-md-10">
  <form >
     
     <div style="display:inline-flex; margin-left:45%;  ">
    <select style=" width: 50%;" class="form-select" name="type" aria-label="Default select example">
  <option selected>Search</option>
  <option value="name">Name</option>
  <option value="id">Codigo</option>
  <option value="category">Category</option>
</select>

  <input type="search" style="" class="form-control" name="data" size="30" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">


    <button class="btn btn-success btn-sm " type="submit" style="margin-left:5px;"> Buscar</button>

    </form>
    </div>
</div>
      
  </div>


      <table class="table table-sm">

          <thead>

      	<tr>		
      		<th>Id</th>
          <th>Codigo</th>
      		<th>Name</th>
      		<th>Category</th>
      		<th>Amount</th>
      		<th>Prize</th>
      		<th>Acount</th>
            <th>Total</th>
            <th>Description</th>
            <th>Options</th>
            
      	</tr>
       </thead>

       <tbody>	
       	@foreach($product as $products)
       	

       		<td>{{$products->id_products}} </td>
          <td> {{$products->id}}</td>
       		<td>{{$products->name}} @if($products->status != 1 )
        <i class="fa-solid fa-eraser" data-toggle="tooltip" data-bs-placement="top" title="Estado:Borrador"></i>
        @endif  </td>
       		<td>{{$products->category}}</td>
       		<td>{{$products->amount}}.U</td>
       		<td>{{$products->prize}}.$</td>
       		<td>{{$products->discount}}.$</td>
       		<td>{{$products->total}}.$</td>
          <td  >
 
           <a href="{{url("/uploads/$products->fecha/$products->img")}}" name="producto" data-fancybox="gallery" data-caption="{{$products->description}}"  >

            <img style="border-style:solid; border-width: 1px; border-color: #BEB8B8; " src="{{url("/uploads/$products->fecha/t_$products->img")}}" alt="">

           </a>
          </td>
          <td>
       		<div class="opts">	

       			
                  @if(kvfj(auth::user()->permission, 'edit_product'))
                  <a href="{{route('edit_product', $products->id_products)}}" data-toggle="tooltip" data-bs-placement="top" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
                  @endif

                                     

                 
                     

             @if($products->deleted_at == null)
                        

                     @if(kvfj(auth::user()->permission, 'product_destroy'))
                       <a href="admin/products/delete/{{$products->id_products}}" data-action="delete" data-toggle="tooltip" data-path="admin/products" data-url="delete" data-object="{{$products->id_products}}"  data-bs-placement="top" title="Eliminar" style="color:red" class="btn_delete"> 
                                               <i class="fa-solid fa-trash-can"></i></a>
                     @endif

                   
                 @else 

                      

                      <a href="admin/products/delete/{{$products->id_products}}" data-action="restore" data-toggle="tooltip" data-path="admin/products" data-url="restore" data-object="{{$products->id_products}}"  data-bs-placement="top" title="Restaurar" style="color:green" class="btn_delete"> 
                                               <i class="fa-solid fa-trash-arrow-up"></i></a>




                @endif


       	


       		</div>	



       		</td>




       	</tr>

       	@endforeach

       </tbody>


      </table>


</div>

<div class="inside" style="margin-bottom: 5px;"> <td>  {{$product->links()}}  </td></div>
</div>
</div>
@endsection
@extends('admin.plantilla')

@section('title')
Add
@endsection

@section('breadcrumb')

<li class="breadcrumb-item">
	 Productos <i class="fa-solid fa-boxes-stacked"></i>
</li>

<li class="breadcrumb-item">
	<i class="fa-solid fa-plus"></i> Agregar Producto
</li>
@endsection


@section('content')

<div class="container-fluid">
	<div class="panel shadow">
		<div class="header">
			

			<h2 class="title">
				 <i class="fa-solid fa-plus"></i> Agregar Producto
			</h2>
		</div>

		<div class="inside">

   

	
       <form action="{{ route('create_product') }}" method="post" enctype="multipart/form-data">
        @csrf
       	<div class="row">
        

        
        <div class="col-md-4">	
        <div class=" input-group mb-3">
        <span class="input-group-text" id="basic-addon1" >Name</span> 
          <input type="text" class="form-control"  name="name" value="{{old('name', $product->name)}}" >
      </div>
       </div>


        <div class="col-md-4">	
        <div class=" input-group mb-3 ">
        <span class="input-group-text" id="basic-addon1" >Category</span> 
        <select name="category" class="form-select" id="" name="category">
          <option >Choose..</option>
          @foreach($category as $categories)

          
          <option value="{{$categories->name}}"> {{$categories->name}}</option>

          @endforeach

        </select>
        </div>
       </div>


       <div class="col-md-4 ">

        <div class="custom_file-input ">
          <input type="file"  name="img" class="form-control" accept="image/*">
        </div>
       </div>
   </div>

   <div class="row">	


          <div class="col-md-4">

        <div class=" input-group ">
        <span class="input-group-text" id="basic-addon1">Cantidad</span> 
          <input type="Number" class="form-control" id="floatingInput" name="amount" value="{{old('amount', $product->amount)}}">
        </div>
       </div>

         <div class="col-md-4 ">

        <div class=" input-group ">
        <span class="input-group-text" id="basic-addon1">Prize</span> 
          <input type="Number" class="form-control" id="floatingInput" min="0.00" step="any" name="prize" value="{{old('prize', $product->prize)}}">
        </div>
       </div>

         <div class="col-md-4 ">

       <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupSelect01">¿Discount?</label>
        <select class="form-select" id="inputGroupSelect01">
          <option selected>Choose...</option>
          <option value="1">Yes</option>
          <option value="0">No</option>
        </select>
    </div>
      
       </div>

        <div class="col-md-4">

        <div class=" input-group ">
        <span class="input-group-text" id="basic-addon1">Discount</span> 
          <input type="Number" class="form-control" id="floatingInput" min="0.00" step="any" name="discount" value="{{old('discount', $product->discount)}}">
        </div>
       </div>

       <div class="col-md-4">

        <div class=" input-group ">
        <span class="input-group-text" id="basic-addon1">Total</span> 
          <input type="Number" class="form-control" id="floatingInput" min="0.00" step="any" name="total" value="{{old('total', $product->total)}}">
        </div>
       </div>

          <div class="col-md-4 mb-3">

       <div class="input-group">
        <label class="input-group-text" for="inputGroupSelect01">Status?</label>
        <select class="form-select" id="inputGroupSelect01" name="status">
          <option selected>Choose...</option>
          <option value="0">Borrador</option>
          <option value="1">Publico</option>
        </select>
    </div>
      
       </div>


       <div class="col-md-12">	
        
        <div class="input-group mb-3">	
         <span class="input-group-text">Description</span>
          <textarea class="form-control" rows="5" aria-label="With textarea" name="description" {{old('description', $product->description)}}>
            {{old('description', $product->description)}}
          </textarea>

        </div>

       </div>

   </div>


       <div class="row">



         <div class="col-sm-3">
  
    <input type="submit" class="btn btn-primary" value="Add">
  </div>

        







       </div>


       </form>

</div>
</div>
</div>

@endsection

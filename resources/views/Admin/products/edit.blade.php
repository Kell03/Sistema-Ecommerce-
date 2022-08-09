@extends('admin.plantilla')

@section('title')
Edit
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"> Products <i class="fa-solid fa-boxes-stacked"></i></li>
<li class="breadcrumb-item"> Edit Products <i class="fa-solid fa-pen-to-square"></i></li>

@endsection


@section('content')

<div class="container-fluid">



<div class="row">

<div class="col-md-8">


<div class="panel shadow">

	<div class="header">
		<h2 class="title"> Edit Product: {{$product->category}} <i class="fa-solid fa-pen-to-square"></i> </h2>

	</div>

	

  <div class="inside">

		<form action="{{route('edit_product', $product->id_products)}}" method="POST" enctype="multipart/form-data">
			@csrf
		<div class="row">		
			   
        <div class="col-md-6">	
        <div class=" input-group mb-3">
        <span class="input-group-text" id="basic-addon1" >Name</span> 
          <input type="text" class="form-control"  name="name" value="{{old('name', $product->name)}}" >
      </div>
       </div>


        <div class="col-md-6 ">	
        <div class=" input-group mb-3 ">
        <span class="input-group-text" id="basic-addon1" >Category</span> 
        <select name="category" class="form-select" id="" name="category">
          <option value="{{old('category', $product->category)}}">{{old('category', $product->category)}}..</option>
          @foreach($category as $categories)

          
          <option value="{{$categories->name}}"> {{$categories->name}}</option>

          @endforeach

        </select>
        </div>
       </div>


       <div class="col-md-6 mb-3">

        <div class="custom_file-input ">
          <input type="file" id="formFile" class="form-control custom-file-input" name="img"  value="{{old('img', $product->img)}}" onchange="cambiar()" accept="image/*"> 
        </div>
       </div>



  
       <div class="col-md-6">

        <div class=" input-group mb-3 ">
        <span class="input-group-text" id="basic-addon1">Cantidad</span> 
          <input type="Number" class="form-control" id="floatingInput" name="amount" value="{{old('amount', $product->amount)}}">
        </div>
       </div>


   </div>




   <div class="row">	


          

         <div class="col-md-6">

        <div class=" input-group ">
        <span class="input-group-text" id="basic-addon1">Prize</span> 
          <input type="Number" class="form-control" id="floatingInput" min="0.00" step="any" name="prize" value="{{old('prize', $product->prize)}}">
        </div>
       </div>

         <div class="col-md-6">

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
    <a href="{{route('index_product')}}" class="btn btn-secondary"> Back</a>
  
    <input type="submit" class="btn btn-primary" value="Edit">
  </div>

        







       </div>


		</form>
		
             </div> 





       </div> 







       </div>


       <div class="col-md-4">


         
         <div class="panel shadow " >
           
           <div class="header">
             
             <h2 class="title"> <i class="fa-solid fa-image"></i>Image Product </h2>
           </div>
           <div class="inside">
             
              <div align="center">          
              <a href="{{url("/uploads/$product->fecha/$product->img")}}" name="producto" data-fancybox="gallery" data-caption="{{$product->description}}"  >

            <img style="border-style:solid; border-width: 1px; border-color: #BEB8B8; width:50%; height: 50%;" src="{{url("/uploads/$product->fecha/$product->img")}}" alt="">

           </a>

           </div>
           </div>

          







         </div>


         <div class="panel shadow mtop16">
           

           <div class="header"><h2 class="title"> <i class="fa-solid fa-images"></i>Gallery</h2></div>

           <div class="inside Product_gallery">

            <form action="{{route('product.gallery',$product->id_products)}}" method="POST" enctype="multipart/form-data" id="image_form">
              @csrf
              
             
              <div class="col-md-12 mb-3">

        <div class="custom_file-input ">
          <input type="file" id="input_product_file_image" name="image" class="form-control custom-file-input" style="display:none;"   value="{{old('img', $product->img)}}" onchange="cambiar()" accept="image/*"> 
        </div>
       </div>

            </form>

            <div class="tumb " >
              
              <a href="#" id="btn_product_file_image"><i class="fa-solid fa-plus"></i></a>



            </div>

            </div>

            <div  class="gallery">
                     @foreach($pg as $p) 

                            <form action="{{route('gallery.destroy',$p->id)}}" id="delete_image" method="POST" style="position: absolute; display: inline-block;">
                              @csrf @method('DELETE')
                             <a href="#" onclick='this.parentNode.submit(); return false;' data-toggle="tooltip" data-bs-placement="top" title="Eliminar">  <i   class="fa-solid fa-xmark  equis"></i></a>
                            
                            </form>


                            
                             <a href="{{url("/uploads/$p->fecha/$p->image")}}" name="producto" data-fancybox="gallery" data-caption="{{$product->description}}"  >
                            <img src="{{url("uploads/$p->fecha_gallery/t_$p->image")}}" style=" margin-right:10px; margin-bottom:15px;" alt="">   
                              


                            </a>



                      @endforeach
              </div>

             



           </div>
         </div>


   





       </div>
</div>


</div>


@endsection
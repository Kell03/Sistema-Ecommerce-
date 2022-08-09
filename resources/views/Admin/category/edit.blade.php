@extends('admin.plantilla')
@section('title')
Edit
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"> Categories <i class="fa-solid fa-clipboard-list"></i></li>
<li class="breadcrumb-item"> <i class="fa-solid fa-pen-to-square"></i> Edit Category {{$categorys->name}}</li>

@endsection

@section('content')

<div class="container-fluid">

	<div class="row">

	     <div class="col-md-4">

              <div class="panel shadow">

                    <div class="header"> <h2 class="title"> <i class="fa-solid fa-pen-to-square"></i>  Edit Category </h2></div>

                    <div class="inside">
                    	

                     <form action="{{route('edit_category', $categorys->id_category)}}" method="POST"> 

                     	 @csrf

                     	<div class="row">
                     		

                     		<div class="col-md-10 mb-3">
   		
   		         <div class="input-group ">
                     <span class="input-group-text">Name</span>
                       <input type="text" name="name" class="form-control"  aria-describedby="basic-addon1" value="{{old('name', $categorys->name) }}">
                 </div>

   	           </div>



   	              	          <div class="col-md-10 mb-3">
   	        	  <div class="input-group ">
                     <label class="input-group-text" for="inputGroupSelect01">Module</label>
                     <select class="form-select" name="module">
                       <option value="{{old('module', $categorys->module) }}">{{old('module', $categorys->module) }}</option>
                       <option value="Products">Products</option>
                       <option value="Blog">Blog</option>

                    </select>
                   </div>                    

   	         </div>



   	         <div class="col-md-10 mb-3">
   		
   		         <div class="input-group ">
                  <span class="input-group-text" id="basic-addon1">Icon</span>
                  <input type="text" class="form-control" name="icon" aria-describedby="basic-addon1" value="{{old('icon', $categorys->icon) }}">
                </div>

   	          </div>




   	        
                <div class="col-sm-12">

                      <button type="submit" class="btn btn-secondary">Cancel</button>
  
                    <button class="btn btn-primary ">Edit</button>
                 </div>





               </div>




             </form>





                   </div>

           


           	
           		



           	</div>



	



        </div>



   <div class="col-md-8">

   	
@include('admin.category.tabla')
   



   </div>


</div>
@endsection
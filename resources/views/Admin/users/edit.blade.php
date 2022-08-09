@extends('admin.plantilla')
@section('title')
Edit
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"> Users <i class="fa-solid fa-users"></i></li>
<li class="breadcrumb-item"> <i class="fa-solid fa-pen-to-square"></i> Edit Users {{$user->name}}</li>

@endsection


@section('content')
<div class="container-fluid">	


<div class="row">	

<div class="col-md-8 mb-3">
<div class="panel shadow">	

	<div class="header"><h2 class="title">Edit User</h2></div>

	<div class="inside">	

     <form action="{{route('edit_user', $user->id)}}" id="form_perfil" method="POST" enctype="multipart/form-data" >
     	@csrf

     	<div class="row">	

         <div class="col-md-12 mb-3">	


<div class="input-group">
  <span class="input-group-text">First and last name</span>
  <input type="text" name="name" value="{{old('name', $user->name)}}"  class="form-control">
  <input type="text" name="surname" value="{{old('surname', $user->surname)}}" class="form-control">
</div>

</div>





     	<div class="col-md-12 ">	

     	<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Email</span>
  <input type="email" class="form-control" name="email" placeholder="email" value="{{old('email', $user->email)}}" >
</div>

</div>

 <div class="col-md-6 ">	

<div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">Status</label>
  <select class="form-select" id="inputGroupSelect01" name="status">
    <option selected value="0">Choose...</option>
    <option value="0">Inactive</option>
    <option value="1">Active</option>
  </select>
</div>

</div>

<div class="col-md-6 ">	

 <div class="input-group mb-3">
  <div class="custom_file-input ">
          <input type="file"  id="photo" name="image" class="form-control custom-file-input" style="display:;" accept="image/*"> 
        </div>
</div>

</div>




  <div class="col-md-6">	

     	<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Password</span>
  <input type="password" name="password" class="form-control" placeholder="" value="{{old('password', $user->password)}}">
</div>

</div>


<div class="col-md-6">	

     	<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Password</span>
  <input type="password" name="password2" class="form-control" placeholder="" value="{{old('password', $user->password)}}">
</div>

</div>

	

</div>


<div class="col-md-12">	
<a class="btn btn-secondary" href="{{route('index_user')}}"> Back</a>
<input type="submit" class="btn btn-primary">	



</div>

  
     	



     </form>


	</div>



</div>


</div>






<div class="col-md-4 mb-3">	


<div class="panel shadow">	

<div class="header"><h2 class="title">Perfil Photo </h2></div>


<div class="inside">
	<div class="perfil mtop16">	

    @if($user->image == null)
   <img src="{{url("/plantilla/imagenes/default_profile.png")}}" alt="">

@else
<img src="{{url("/perfil/$user->fecha/$user->image")}}" alt="">

@endif

<p align="center" class="mtop16">	{{$user->name}} {{$user->surname}}</p>

@if( kvfj(auth::user()->permission, 'role_user'))
<form action="{{route('role_user', $user->id)}}" method="POST" class="mtop16">
  @csrf
  
<div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">Options</label>
  <select class="form-select" id="choose_role" name="user_role">
    <option selected>Choose...</option>
    <option value="0">Usuario Normal</option>
    <option value="1">Administrador</option>
    
  </select>
</div>

  <input id="submit_role" type="submit" style="display:none;">
</form>

@endif

@if( kvfj(auth::user()->permission, 'suspender_user'))


<form action=" {{route('suspender_user', $user->id)}}}" method="POST" class="mtop16">
  @csrf

@if($user->status == 2 )
<input type="submit" style="width: 100%;" class="btn btn-success" value="Activar Usuario">
@else
<input type="submit" style="width: 100%;" class="btn btn-danger" value="Suspender Usuario">
@endif

</form>
@endif
</div>	




<div class="cuadro mtop16" id="cuadro"  style="">	

<div  align="center" >	<a href="" class="mas" id="cuadro" ><h1><i class="fa-solid fa-plus"></i><h1></a></div>

</div>



</div>
</form>


</div>

</div>

</div>

</div>



</div>


@endsection
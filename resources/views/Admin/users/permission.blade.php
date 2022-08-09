@extends('admin.plantilla')
@section('title')
Edit Permission
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"> Users <i class="fa-solid fa-users"></i></li>
<li class="breadcrumb-item"> <i class="fa-solid fa-gears"></i> Permission {{$user_p->name}} </h1></li>

@endsection


@section('content')
<div class="container-fluid">	

<div class="page_user">
<form action="{{route('permission_user', $user_p->id)}}" method="POST">
  @csrf
<div class="row" >	



@foreach(permission() as $keys => $value)

  <div class="col-md-4 d-flex mtop16" >
<div class="panel shadow" style="width:100%;"> 

  <div class="header"><h2 class="title">{!!$value['icon']!!} {{$value['title']}}</h2></div>

  <div class="inside"> 

    @foreach($value['keys'] as $k=>$v)
    <div class="form_check">
    <input type="checkbox" name="{{$k}}" @if(kvfj($user_p->permission, $k)) checked @endif> <label for="index_user"> {{$v}}</label><br>
      </div>
       @endforeach 

  </div>

  </div>
</div>

@endforeach 








</div>


<div class="row mtop16"> 
  <div class="col-md-12"> 
    <div class="panel shadow">  
      <div class="inside"> 

 <input type="submit" class="btn btn-primary" value="Guardar">
 </div>
 </div>
 </div>
</div>

</form>
</div>


</div>


@endsection
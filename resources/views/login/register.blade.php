@extends('login.plantilla')

@section('title')
Register
@endsection



@section('content')




<div class="boxx box_register shadow ">

<div class="header" >

	<img class="logo_login" src="{{url('/plantilla/imagenes/logo_ecommerce.png')}}" alt="" style="width:50%;" > 

	</div>



<div class="inside">

	@if(Session::has('message'))
	<div class="container">	

      <div class="alert alert-{{Session::get('typealert')}}" style="display:none;">	
         {{Session::get('message') }}
         @if($errors->any())
         <ul>
         	
         	@foreach($errors->all() as $error)
         	<li>{{$error}} </li>
         	@endforeach

         	

         </ul>
         @endif
         <script>	
         	$('.alert').slideDown();
         	setTimeout(function(){$('.alert').slideUp(); }, 5000);

         </script>
      </div>
	 </div> 
	@endif




	{!! Form::open(['url' => '/register']) !!}
	
<label for="name" > Name</label>
	<div class="input-group">	
		<span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-user"></i></span>
	{!! Form::text('name', old('name'),['class' => 'form-control', 'required'] )!!}


</div>

<label for="surname" class="mtop16" > Surname</label>
	<div class="input-group">	
		<span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-user"></i></span>
	{!! Form::text('surname', null, ['class' => 'form-control', 'required'] )!!}

</div>


	<label for="email" class="mtop16"> Email</label>
	<div class="input-group">	
		<span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-envelope"></i></span>
	{!! Form::email('email', null, ['class' => 'form-control', 'required'] )!!}

</div>



	<label for="password" class="mtop16"> Password</label>
	<div class="input-group">	
		<span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-lock"></i></span>
	{!! Form::password('password', ['class' => 'form-control', 'required'] )!!}

</div>


	<label for="confirm" class="mtop16"> confirm Password</label>
	<div class="input-group">	
		<span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-lock"></i></span>
	{!! Form::password('confirm', ['class' => 'form-control', 'required'] )!!}

</div>

{!! Form::submit('Registrar', ['class' => ' btn btn-success mtop16'])!!}

	{!! Form::close() !!}

	<div class="footer mtop16"> 
    <a href="{{route('login')}}"> Ya tengo cuenta, Ingresar</a>
	</div>
</div>
</div>

@stop
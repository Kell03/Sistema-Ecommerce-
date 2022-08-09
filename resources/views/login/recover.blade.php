@extends('login.plantilla')

@section('title')
Password Recover
@endsection



@section('content')



<div class="boxx box_login shadow ">

<div class="header" >

	<img class="logo_login" src="{{url('/plantilla/imagenes/logo_ecommerce.png')}}" alt="" style="width:50%;" > 

	</div>

<div class="inside">



	{!! Form::open(['url' => '/post/recover/password']) !!}
	<label for="email" > Email</label>
	<div class="input-group" >	
		<span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-envelope"></i></span>
	{!! Form::email('email', null, ['class' => 'form-control'] )!!}

</div>



</div>

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
         	setTimeout(function(){$('.alert').slideUp(); }, 2000);

         </script>
         </div>
	    </div> 
	    @endif

{!! Form::submit('Recuperar', ['class' => ' btn btn-success mtop16'])!!}

	{!! Form::close() !!}

	<div class="footer mtop16"> 
    <a href="{{route('register')}}"> ¿No tienes unas cuenta?, Registrarse</a>
    <a href="{{route('login')}}" style="margin-left: 25px;"> Iniciar Sesion</a>
	</div>
</div>
</div>

@stop
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>	@yield('title')-MADCMS </title>

	<meta name="csrf_token" content="{{csrf_token()}}">
	<meta name="routename" content="{{ Route::currentRouteName() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    
    <link rel="stylesheet" href="{{url('/plantilla/css/home.css?v='.time())}}">


    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;1,700&display=swap" rel="stylesheet">{{--font--}}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"/>




   @routes
<script src="{{ mix('js/app.js') }}"></script>{{--rutas javascript--}}

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>{{--sweetalert--}}

    	{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>--}}

	<script src="https://kit.fontawesome.com/343823813c.js" crossorigin="anonymous"></script>
  <script src="{{url('/plantilla/js/home.js?v'.time())}}"></script>
	
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>



</head>

<body>


<nav class="navbar navbar-expand-lg bg-ligh shadow" >
		<div class="container">	
       {{--<img class="navbar-brand" src="{{{url('/plantilla/imagenes/logo_ecommerce.png')}}}" alt="" width="100" style="background-color:RED;">--}}
       <a class="navbar-brand" href="#"><img class="navbar-brand" src="{{{url('/plantilla/imagenes/logo_ecommerce.png')}}}" alt="" width="100" height="60"></a>


    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>






 {{--inicio de botones de ingreso--}}
    <div class="collapse navbar-collapse">
    <ul class="navbar-nav" >	
    	
      <li class="nav-item ">	
      
      <a href="" class="nav-link  lk-home" >  Inicio <i class="fa-solid fa-house"></i></a>


    	</li>

      <li class="nav-item mg-right"> 
      
      <a href="" class="nav-link  lk-contact">  Contacto <i class="fa-solid fa-phone"></i></a>


      </li>
    </ul>
    <ul class="navbar-nav" style="margin-left:auto;"> 

      @if(Auth::guest())
            <li class="nav-item" > 
      
      <a href="{{url('/login')}}" class="nav-link  lk-contact">  Ingresar <i class="fa-solid fa-right-to-bracket"></i></a>


      </li>



            <li class="nav-item" > 
      
      <a href="{{url('/register/create')}}" class="nav-link btn  lk-contact">  Registrarse <i class="fa fa-user-circle"></i></a>


      </li>
      @endif

    </ul>	



    </div>


		</div>
{{--fin de botones de ingreso--}}





    

	</nav>

	

	


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

	  
	

<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>


</body>
	

</html>
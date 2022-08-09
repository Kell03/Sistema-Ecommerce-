<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>	@yield('title')-Ecommerce</title>

	<meta name="csrf_token" content="{{csrf_token()}}">
	<meta name="routename" content="{{ Route::currentRouteName() }}">{{--Importante para obtener el nombre las rutas--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    
    <link rel="stylesheet" href="{{url('/plantilla/css/admin.css?v='.time())}}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;1,700&display=swap" rel="stylesheet">{{--font--}}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"/>




   @routes
<script src="{{ mix('js/app.js') }}"></script>{{--rutas javascript--}}

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>{{--sweetalert--}}

    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<script src="https://kit.fontawesome.com/343823813c.js" crossorigin="anonymous"></script>
	<script src="{{url('/plantilla/js/admin.js?v='.time())}}" crossorigin="anonymous"></script>
	
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>





<script type="text/javascript">

	//nube de arriba
	
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip()
	});
</script>



</head>

<body>

	<div class="wrapper">
		 
		 <div class="col1 ">@include('admin.sidebar')</div>
		 <div class="col2">


		 	<nav class="navbar navbar-expand-lg shadow"> {{--para abarcar toda la pantalla de manera vertical barra de navegacion--}} 

		 		<div class="collapse navbar-collapse">
		 			<div class="navbar-nav">
		 				<li class="nav-item">
		 					<a href="{{route('dashboard')}}" class="nav-link"> Home <i class="fa-solid fa-house"></i></a>
		 				</li>

		 			</div>
		 		</nav>


		 		<div class="page">
		 			
		 			<div class="container-fluid" >
		 				
		 				<nav aria-label="breadcrumb shadow">  
		 					<ol class="breadcrumb">
		 						<li class="breadcrumb-item">
		 					<a href="{{route('dashboard')}}" class="nav-link"> Home <i class="fa-solid fa-house"></i></a>
		 						</li>
		 						@section('breadcrumb')
		 						@show
		 					</ol>

		 				</nav>
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

	    @section('content')

	    @show
		 		</div> 





		 		

		 	</div>

	



		  </div>




	</div>
	

<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>

    <script>
      //  JavaScript will go here
    </script>

</body>
	

</html>
<div class="sidebar shadow">
	
<div class="section-top">
	
	<div class="logo">
		<img src="{{url('/plantilla/imagenes/logo_ecommerce.png')}}" width="80%" style="padding: 15px;" alt="">

		<div class="user">
			<div class="name">
				@if(auth::user()->image == null)
				<a href="{{route('edit_user', auth::user()->id )}}" style="text-decoration: none; color:white;">
					<div style=" margin-bottom: 10px;  "><img src="{{url('/plantilla/imagenes/default_profile.png')}}" style="width: 20%; border-radius:50%; margin-right: 10px;"  class="mtop16"  alt="">{{auth::user()->name}} {{auth::user()->surname}}</div>
                </a>
                @else

                <a href="{{route('edit_user', auth::user()->id )}}" style="text-decoration: none; color:white;">
				<p style="display: none;">{{$variable1 = auth::user()->image}}
				{{$variable2 = auth::user()->fecha}}</p>

				<div style=" margin-bottom: 10px;  "><img src="{{url("/perfil/$variable2/t_$variable1")}}" style="border-radius:50%; margin-right: 10px;"  class="mtop16"  alt="">{{auth::user()->name}} {{auth::user()->surname}}</div>
			</a>

				 @endif

				<a href="{{route('logout')}}" class="mtop16"><button  class="btn btn-primary btn-sm"> Cerrar Session</button></a>
			</div>
		</div>

	</div>
</div>


<div class="main">
	
	<ul>
		@if( kvfj(auth::user()->permission, 'dashboard'))
		<li  ><a class="lk-dashboard" href="{{route('dashboard')}}"> Home <i class="fa-solid fa-house"> </i></a></li>
         @endif

		@if( kvfj(auth::user()->permission, 'index_category'))
		<li ><a  href="{{route('index_category')}}" class="lk-index_category lk-create_category lk-edit_category" > Categories <i class="fa-solid fa-clipboard-list"></i></a></li>
        @endif

        @if( kvfj(auth::user()->permission, 'index_product'))
		<li ><a class="lk-index_product lk-create_product lk-edit_product" href="{{route('index_product')}}"> Productos <i class="fa-solid fa-boxes-stacked"></i></a></li>
		@endif


		@if( kvfj(auth::user()->permission, 'index_user'))
		<li ><a class="lk-index_user lk-edit_user" href="{{route('index_user')}}"> Usuarios <i class="fa-solid fa-users"></i></a></li>
		@endif


	</ul>
</div>

</div>


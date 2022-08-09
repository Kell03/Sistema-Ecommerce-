<div class="col-md-4 d-flex ">
<div class="panel shadow" style="width:100%;">	

	<div class="header"><h2 class="title"><i class="fa-solid fa-house"> </i> Dashboard Module</h2></div>

	<div class="inside">	


	<div class="form_check">

		<input type="checkbox" name="dashboard" @if(kvfj($user_p->permission, 'dashboard')) checked @endif> <label for="dashboard"> Acceso al Dashboard.</label><br>

		<input type="checkbox" name="estadisticas_rapidas" @if(kvfj($user_p->permission, 'estadisticas_rapidas')) checked @endif> <label for="estadisticas_rapidas"> Acceso a las Estadisticas Rapidas.</label><br>

		<input type="checkbox" name="estadisticas_admin" @if(kvfj($user_p->permission, 'estadisticas_admin')) checked @endif> <label for="estadisticas_admin"> Acceso a las Estadisticas de compras.</label><br>


		

		
	</div>	

     

	</div>



</div>


</div>

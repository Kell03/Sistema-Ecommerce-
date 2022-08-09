<div class="col-md-4 d-flex " >
<div class="panel shadow" style="width:100%;">	

	<div class="header"><h2 class="title"><i class="fa-solid fa-users"></i> User Module</h2></div>

	<div class="inside">

	<div class="form_check">

		<input type="checkbox" name="index_user" @if(kvfj($user_p->permission, 'index_user')) checked @endif> <label for="index_user"> Acceso a los Usuarios.</label><br>

		<input type="checkbox" name="edit_user" @if(kvfj($user_p->permission, 'edit_user')) checked @endif> <label for="edit_user"> Permiso para editar Usuarios.</label><br>

		<input type="checkbox" name="suspender_user" @if(kvfj($user_p->permission, 'suspender_user')) checked @endif> <label for="suspender_user"> Permiso para suspender Usuarios.</label><br>

		<input type="checkbox" name="permission_user" @if(kvfj($user_p->permission, 'permission_user')) checked @endif> <label for="permission_user"> Permiso para otorgar permisos.</label><br>

		<input type="checkbox" name="role_user" @if(kvfj($user_p->permission, 'role_user')) checked @endif> <label for="role_user"> Permiso para otorgar role.</label>
		

		
	</div>	

     

	</div>



</div>


</div>

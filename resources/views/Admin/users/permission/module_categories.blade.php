<div class="col-md-4 mb-3">
<div class="panel shadow">	

	<div class="header"><h2 class="title"><i class="fa-solid fa-clipboard-list"></i> Categories Module</h2></div>

	<div class="inside">	

			<div class="form_check">

		<input type="checkbox" name="index_category" @if(kvfj($user_p->permission, 'index_category')) checked @endif> <label for="index_category"> Acceso a las categorias.</label><br>

		<input type="checkbox" name="create_category" @if(kvfj($user_p->permission, 'create_category')) checked @endif> <label for="create_category"> Permiso para agregar categorias.</label><br>


		<input type="checkbox" name="edit_category" @if(kvfj($user_p->permission, 'edit_category')) checked @endif> <label for="edit_category"> Permiso para editar categorias.</label><br>


		<input type="checkbox" name="category.delete" @if(kvfj($user_p->permission, 'category.delete')) checked @endif> <label for="category.delete"> Permiso para eliminar categorias.</label><br>
		

		
	</div>	


     

	</div>



</div>


</div>

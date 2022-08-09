<div class="col-md-4 d-flex" >
<div class="panel shadow" style="width:100%;">	

	<div class="header"><h2 class="title"><i class="fa-solid fa-boxes-stacked"></i> Products Module</h2></div>

	<div class="inside">	


	<div class="form_check">

		<input type="checkbox" name="index_product" @if(kvfj($user_p->permission, 'index_product')) checked @endif> <label for="index_product"> Acceso a los Productos.</label><br>
		<input type="checkbox" name="create_product" @if(kvfj($user_p->permission, 'create_product')) checked @endif> <label for="create_product"> Permiso para agregar Productos.</label><br>
		<input type="checkbox" name="edit_product" @if(kvfj($user_p->permission, 'edit_product')) checked @endif> <label for="edit_product"> Permiso para editar Productos.</label><br>
		<input type="checkbox" name="product_destroy" @if(kvfj($user_p->permission, 'product_destroy')) checked @endif> <label for="product.destroy"> Permiso para eliminar Productos.</label><br>
		<input type="checkbox" name="product_restore" @if(kvfj($user_p->permission, 'product_restore')) checked @endif> <label for="product.restore"> Permiso para restaurar Productos.</label><br>
		

		
	</div>	


     

	</div>



</div>


</div>

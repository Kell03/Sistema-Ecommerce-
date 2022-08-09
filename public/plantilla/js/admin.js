
var base = location.protocol+'//'+location.host;
var route = document.getElementsByName('routename')[0].getAttribute('content')

document.addEventListener('DOMContentLoaded', function(){



    
    var btn_delete = document.getElementsByClassName('btn_delete');


   for(i=0; i < btn_delete.length; i++)
   {

      btn_delete[i].addEventListener('click', delete_object);
   }

   function delete_object(e){

      e.preventDefault();
      var object = this.getAttribute('data-object');
      var path = this.getAttribute('data-path');
      var direction = this.getAttribute('data-url');
      var action = this.getAttribute('data-action');
      var url = base + '/' + path + '/'+ direction + '/' + object
      console.log(object, path, url);

      if(action == 'delete'){

      title = '¿Seguro que quieres eliminar este elemento?';
      text= 'Recuerda esta acción eliminara el elemento de forma definitiva o lo enviara a la papelera';
      icon = 'warning';
      buttom = 'Si, Eliminar'


      }
      else{

    title = '¿Quieres restaurar este elemento?';
      text= 'Esta acción restaurará el elemento y estará activo en la base de datos';
      icon = 'info';
      buttom = 'Si, Restaurar'

      }

      Swal.fire({
  title: title,
  text: text,
  icon: icon,
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: buttom
}).then((result) => {
  if (result.isConfirmed) {
     
     window.location.href = url;

    /*Swal.fire(


       'Deleted!',
      'Your file has been deleted.',
      'success'
    )*/
  }
})
   }




if(route == 'edit_product'){
var btn_product_file_image = document.getElementById('btn_product_file_image');
var input_product_file_image = document.getElementById('input_product_file_image');


btn_product_file_image.addEventListener('click', function(){


	input_product_file_image.click();}, false);



input_product_file_image.addEventListener('change', function(){


    var image_form = document.getElementById('image_form');

    image_form.submit();



}, false);






} //cierre del if





// codigo para los links activos
routeactive = document.getElementsByClassName('lk-'+route)[0].classList.add('active');



 

 if(route == 'edit_user'){


   

//codigo de la imagen de perfil
var cuadro = document.getElementById('cuadro');
    var perfil_photo = document.getElementById('photo');


cuadro.addEventListener('click', function(){


perfil_photo.click();

},false);


var form_perfil = document.getElementById('form_perfil');

photo.addEventListener('change',function(){


    form_perfil.submit();

},false);

// fin del codigo de la imagen de perfil



  var select_role = document.getElementById('choose_role');

  select_role.addEventListener('change',function(){

    submit_role = document.getElementById('submit_role');
    submit_role.click();


  },false);


}










});


<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Models\User;
use Validator, Str, Config, Image;

class UserController extends Controller
{
    public function __construct(){

       $this->middleware('auth');
       //$this->middleware('isadmin');
       $this->middleware('Middleware_Permission');
       $this->middleware('userstatus');
    }

    public function getuser(Request $request, $var=''){




        if($var == null):
        $user = user::select('*')->OrderBy('id', 'desc')->paginate(10);

        return view('admin.user', compact('user'));

        else:

        $user = user::select('*')->where('status', '=', $var)->OrderBy('id', 'desc')->paginate(10);

        return view('admin.user', compact('user'));

    endif;


    }


    public function edituser(Request $request, $id){




        return view('admin.users.edit',[

         'user'=>user::findOrFail($id)

        ]);
    }



    public function updateuser(Request $request, $id){


       $rules =[

      'name'=>'required',
      'surname'=>'required',
      'password'=>'required|same:password2',
       'password2'=>'required',
       'status'=>'required',
      

       ];


       $validator = Validator::make($request->all(), $rules);

       if($validator->fails()):

        return back()->withErrors($validator)->withInput()->with('message', 'Se ha producido un error')->with('typealert', 'danger');

    else:


        if($request->file('image') == null):

            $users = user::findOrFail($id);
            $users->name = $request->get('name');
            $users->surname = $request->get('surname');
            $users->status = $request->get('status');
            $users->update();

          return redirect('/admin/user')->with('message', 'Usuario actualizado exitosamente')->with('typealert', 'success');

        else:

          $path = '/'.date('y-m-d');
            $fileExt = trim($request->file('image')->getClientOriginalExtension());
            $upload_path = Config::get('filesystems.disks.perfil.root');
            $name = Str::slug(str_replace($fileExt, ' ' ,$request->file('image')->getClientOriginalName()));
            $filename = rand(1,999).'-'.$name.'.'.$fileExt; // rand para  crear un numero aleatorio yno se repita la variable
            $final_file = $upload_path.'/'.$path.'/'.$filename; 

            $users = user::findOrFail($id);
            $users->name = $request->get('name');
            $image_preview = $users->image;
            $users->surname = $request->get('surname');
            $users->fecha = date('y-m-d');
            $users->image = $filename;
            $users->status = $request->get('status');
            $users->update();


             if($request->hasFile('image')):

                $fi= $request->image->storeAs($path, $filename, 'perfil');
                $img = Image::make($final_file);
                $img->fit(50,50, function($constraint){
                    $constraint->upsize();
                });
                 
                $img->save($upload_path.'/'.$path.'/t_'.$filename);
                unlink($upload_path.'/'.$path.'/'.$image_preview);
                unlink($upload_path.'/'.$path.'/t_'.$image_preview);

            endif;

            return back()->with('message', 'Usuario actualizado exitosamente')->with('typealert', 'success');


        endif;



        endif;
    }


    public function permissionuser(Request $request, $id){

        $user_p = user::findOrFail($id);

        return view('admin.users.permission', compact('user_p'));



    }



    public function post_permissionuser(Request $request, $id){

        $user_p = user::findOrFail($id);

    

        $user_p->permission = $request->except('token');//metodo para guardar todos los request de la vista exceto uno que se llama token

        if($user_p->save()):

            return back()->with('message', 'Permisos guardados con exito.')->with('typealert', 'success');

        endif;



    }

   public function roleuser(Request $request,$id){


     $user = user::findOrFail($id);
     $valor = $request->get('user_role');
     if($valor == 0){

        $permission = [

          'dashboard'=> 'on',
          'index_category'=> 'on',
          

          'index_product'=> 'on',
       

          
          

          'index_user'=> 'on',
          'edit_user'=> 'on',
          
        
          

        ];

        $permission = json_encode($permission);
        $user->permission = $permission;
        $user->role = $valor;
        $user->update();

        return back()->with('message','Permisos basicos otorgados exitosamente')->with('typealert','success');

     }
     else{


        $permission = $request->except('token');
        $user->permission = $permission;
        $user->role = $valor;
        $user->update();

        return back()->with('message','Permisos de Administrador otorgados exitosamente')->with('typealert','success');



     }




   }


    public function suspenderuser(Request $request, $id){

        $user = user::findOrFail($id);

        if($user->status != '2' ){
          
          $user->status = '2';
          $user->update();

            return back()->withInput()->with('message', 'Se ha suspendido el Usuario exitosamente!')->with('typealert', 'success');
        }
        else{


           $user->status = '1';
           $user->update();

            return back()->withInput()->with('message', 'Se ha activado el Usuario exitosamente!')->with('typealert', 'success');

        }


    }



    
}

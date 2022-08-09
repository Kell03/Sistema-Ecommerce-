<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\TestMail;
use Validator, Hash, Auth, Mail;

class ConnectController extends Controller
{

    // constructor para que el usuario logueado no acceda al login y el register

    public function __construct(){

        $this->middleware('guest')->except(['logout']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getlogin()
    {
        
        

        return view('login.index');


    }



    public function postlogin(Request $request)
    {
       $rules = [


        'email'=>'required|email',
        'password'=>'required|min:8'



       ];


       $validator = Validator::make($request->all() ,$rules);
   if($validator->fails()):

   return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger');

   else:
   if(Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])):

    if(Auth::user()->status == 2):

        return redirect('/logout');

    else:
    
    return redirect('/');

endif;
    else:
        return back()->withErrors($validator)->with('message', 'No existe este usuario')->with('typealert', 'danger');

    endif;
   endif;


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

   
    public function getregister()
    {
        return view('login.register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


public function postregister(Request $request)
    {
    
        
    $rules = [
      

       'name'=>'required',
       'surname'=>'required',
       'email'=>'required|email|unique:users',
       'password'=>'required|min:8',
       'confirm' => 'required|same:password'


];

   $validator = Validator::make($request->all(), $rules);
   if($validator->fails()):
   return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger');
   else:
   $user = new user;
   $user->name = $request->get('name');
   $user->surname = $request->get('surname');
   $user->email = $request->get('email'); 
   $user->password = Hash::make($request->get('password'));
   $user->save();
   
   return redirect('login')->with('message', 'Datos registrados correctamente')->with('typealert', 'success');
   endif;





    }

    public function logout()
    {

        if(Auth::user()->status == '2'):
        Auth::logout();
        return redirect('/login')->with('message', 'Su usuario ha sido suspendido!')->with('typealert', 'danger');
         else:
            Auth::logout();
        return view('login.index');
    endif;
    }



    public function getrecover( Request $request){

    
    return view('login.recover');


    }




   public function postrecover( Request $request){



    $rules = [

      'email'=>'required|email'

    ];

    $validator = Validator::make($request->all(), $rules);
    if($validator->fails()):

        return back()->withErrors($validator)->withInput()->with('message', 'Se ha producido un error')->with('typealert', 'danger');

    else:

        $user = user::select('*')->where('email', $request->get('email'))->count();
       
       if($user == '1'):

         $users = user::where('email', $request->get('email'))->first();
         $code = rand(100000, 999999);
         
        $data = ['email'=>$users->email, 'name'=>$users->name, 'code'=>$code];

         $u = user::find($users->id);

         $u->code = $code;

         if($u->save()):

        mail::to($users->email)->send(new TestMail($data));
        //return 'correo enviado';

        return redirect("/reset/email?")->with('message', 'Ingresar el codigo enviado a su correo!')->with('typealert', 'danger');

         endif;

        else:

            return back()->withErrors($validator)->withInput()->with('message', 'No se ha encontrado ningun email')->with('typealert', 'danger');
        endif;



    endif;
    


    }

    public function getreset(Request $request, $email){


        return view('login.restablecer');
    }



    public function update_password(Request $request, $email){
       

      $rules = [

        'code'=>'required',
        'password'=>'required|min:8',
       'confirm' => 'required|same:password'
        




      ];


      $validator = Validator::make($request->all(), $rules);

      if($validator->fails()):

        return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');

    else:

       $u = user::where('code', $request->get('code'))->count();

       if($u == '1'):
       
       $user = user::where('code', $request->get('code'))->first();
       $user->password = Hash::make($request->get('password'));
       $user->code = null;
       $user->update();
       return redirect('/login')->with('message', 'Se ha actualizado su contraseña exitosamente.')->with('typealert', 'success');

       else:

        return back()->withErrors($validator)->with('message', 'Se ha producido un error: Codigo invalido')->with('typealert', 'danger');
    endif;

endif;





    }



    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

@extends('login.master')

@section('content')

Hola <strong>{{$data['name']}}</strong>
<p>Este correo electrónico fue enviado para restablecer su contraseña.</p>
<p>Para continuar haga click en el siguiente botón e ingrese el siguiente código:</p>
<h2>{{$data['code']}}</h2>
<a href="" style="color: white; background-color:#2388ED; padding: 10px;
 text-decoration: none; display: inline-block; border-radius: 10px;"> Resetear contraseña</a>

 <p>Si el botón anterior no le funciona, copie y pegue en su navegador el siguiente enlace:</p>
 <p>{{$data['email']}}</p>


@endsection
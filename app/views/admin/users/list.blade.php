@extends('layouts.master')
 
@section('sidebar')
     @parent
     Lista de usuarios
@stop
 
@section('content')
	<h1>Usuarios</h1>
	 
	<ul>
	  @foreach($users as $user)
	  <!-- Equivalente en Blade a <?php //foreach ($usuarios as $usuario) ?> -->
	    <li>
	      {{ $user->name.' '.$user->password }} 	      	      
	    </li>
	    <!-- Equivalente en Blade a <?php //echo $usuario->nombre.' '.$usuario->apellido ?> -->
	  @endforeach 
	</ul>
@stop

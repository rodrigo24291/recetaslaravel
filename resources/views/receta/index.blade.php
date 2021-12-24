
@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="text-center my-3">Administra tus recetas</h2>
    <div class="row my-4">
        <a href="{{route('receta.create')}}" class="btn btn-primary mx-1">Crear</a>
        <a href="{{route('perfil.create')}}" class="btn btn-info mx-1">Editar mi perfil</a>
        <a href="{{route('perfil.show')}}" class="btn btn-danger mx-1">Mi perfil</a>
        
    </div>
    
    <div class="row py-3">
        <table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Titulo</th>
      <th scope="col">Categoria</th>
      <th scope="col">Accion</th>
      
    </tr>
  </thead>
  <tbody>
    
    @foreach($recetas as $receta)
    <tr>
  
      <td>{{$receta->id}}</td>
      <td>{{$receta->titulo}}</td>
      <td>{{$receta->categoria->titulo}}</td>
      <td> <a href="{{ route('receta.show',['receta'=>$receta->id]) }}"  class="btn btn-success w-50">Ver</a> <eliminar di={{$receta->id}}></eliminar> <a href="{{ route('receta.edit',['id'=>$receta->id]) }}" class="btn btn-primary w-50 mt-1">Editar</a></td>
    </tr>  
    @endforeach
  
  </tbody>
</table>
      
     
    </div>
    
     
</div>

@endsection

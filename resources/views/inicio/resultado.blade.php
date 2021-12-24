@extends('layouts.app')

@section('content')
<div class="container">
  
  <h2 class="text-center my-3">Resultado a la Busqueda:  {{Str::title($titulo) }}</h2> 
<div class="row">
    @if($resultado!==null) 
@foreach ($resultado as $recetas)
  
<div class="col-4">
    
    <div class="card mt-4" style="width: 18rem;">
        <img src="{{route('receta.getimagen',['id'=>$recetas->imagen])}}" class="card-img-top"  style="height:10rem" alt="...">

        <div class="card-body">
          <p class="card-text text-center">{{Str::words(strip_tags($recetas->preparacion),10)}}</p>
          <div class="d-flex justify-content-between">
        <moment valor="{{ $recetas->created_at }}"></moment> <p>{{$recetas->megusta->count()}} Le gusto</p>
      </div>
      <a href="{{ route('receta.show',['receta'=>$recetas->id]) }}" class="btn btn-danger w-100 text-center" >Ver mas</a>
        </div>
        
      </div>
</div>
@endforeach
@else 
Vacio
</div>

@endif
</div>
@endsection
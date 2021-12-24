
@extends('layouts.app')

@section('content')
<div class="w-100 d-flex flex-column justify-content-center " style=" background-image:linear-gradient(rgba(27, 39, 24, 0.8),rgba(34, 32, 49, 0.8)),url(images/wall.jpg);  background-size: cover; height:70vh; ">
  <div class="container">
    <div class="row d-flex flex-column align-items-center justify-content-center">
      <div class="col-4">
  <form method="POST" action="{{ route('inicio.busqueda') }}" >
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label text-white">Buscador de Comida</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="resultado">
      <button type="submit" class="btn btn-primary my-1">Buscar</button>
    </form>
  </div>
    </div>
  </div>
</div>
</div>
<div class="container">


<h2 class="mt-3">Ultimas recetas</h2>

    <div id="ide" class="owl-carousel">
        @foreach($receta as $recetas)
        <div class="card" style="width: 18rem;">
            <img src="{{route('receta.getimagen',['id'=>$recetas->imagen])}}" class="card-img-top" style="height:10rem; " alt="...">

           
            <div class="card-body">
              <p class="card-text">{{Str::words(strip_tags($recetas->preparacion),10) }}</p>
              <div class="d-flex justify-content-between">
                <moment valor="{{ $recetas->created_at }}"></moment><p>{{$recetas->megusta->count()}} Le gusto</p>
              </div>
              <a href="{{ route('receta.show',['receta'=>$recetas->id]) }}" class="btn btn-danger w-100 text-center" >Ver mas</a>
            </div>
          </div>
          @endforeach
    </div>

@foreach($categoria as $fer=> $cates)
<h2 class="my-3">{{Str::title($fer) }}</h2>
<div id="ide" class="owl-carousel">
    
@foreach($cates as $recetas)

      
        <div class="card" style="width: 18rem;">
            <img src="{{route('receta.getimagen',['id'=>$recetas->imagen])}}" class="card-img-top"  style="height:10rem" alt="...">

            <div class="card-body">
              <p class="card-text text-center">{{Str::words(strip_tags($recetas->preparacion),10)}}</p>
              <div class="d-flex justify-content-between">
            <moment valor="{{ $recetas->created_at }}"></moment> <p>{{$recetas->megusta->count()}} Le gusto</p>
          </div>
          <a href="{{ route('receta.show',['receta'=>$recetas->id]) }}" class="btn btn-danger w-100 text-center" >Ver mas</a>
            </div>
            
          </div>
    
  @endforeach
</div>
@endforeach

</div> 
</div>   

@endsection
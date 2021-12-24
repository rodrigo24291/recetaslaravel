@extends('layouts.app')

@section('content')

<h2 class="text-center my-3">{{Str::title($receta->titulo) }}</h2>
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-8">
<img src="{{route('receta.getimagen',['id'=>$receta->imagen])}}" class="w-100" alt="">
<p><span>Escrito en</span> {{$receta->categoria->titulo}}</p>
<p>Autor {{Str::title($receta->user->name) }} {{ Str::title($receta->user->surname) }}</p>
@php
$data=$receta->created_at    
@endphp

<moment valor="{{$data}}"></moment>
<h3>Ingredientes</h3>
<p>{!! $receta->ingredientes !!}</p>
<h3>Preparacion</h3>
<p>{!!$receta->preparacion !!}</p>

<div class="d-flex justify-content-center flex-column align-items-center">
<like like="{{ $receta->id }}"
    likes="{{ $likes}}"
    total="{{ $total }}">
</like> 
</div>
</div>
</div>
</div>
@endsection
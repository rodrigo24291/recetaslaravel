@extends('layouts.app')

@section('content')

<h2 class="text-center">{{ auth::user()->nombre }} {{ auth::user()->apellido}}</h2>
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-8">
 <div class="image d-flex justify-content-center">       
@if(auth::user()->perfil->imagen)        
<img src="{{route('perfil.getimagen',['id'=>auth::user()->perfil->imagen])}}" class="rounded-circle " alt="" style="height:25rem;width:20rem">
@endif
</div>
<h3 class="text-center my-3">Biografia</h3>
{!! auth::user()->perfil->biografia !!}</p>

</div>
</div>
</div>
@endsection
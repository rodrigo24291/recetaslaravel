@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="text-center my-3">Mi perfil</h2>
    
    <div class="row my-4">
        <a href="{{route('receta.index')}}" class="btn btn-primary mx-1">volver</a>
        
        
    </div>
    
    <div class="row justify-content-center">
        <div class="col-md-8">
         
                    <form method="POST" action="{{ route('perfil.store',['id'=>auth::user()->id])}}" enctype="multipart/form-data">
                        @csrf

                        @method('PUT')


      
<div class="imag d-flex justify-content-center">
 @if(auth::user()->perfil->imagen)                       
<img src="{{route('perfil.getimagen',['id'=>auth::user()->perfil->imagen])}}" class=" rounded-circle " alt="" style=" height:25rem;width:20rem">
@endif
</div>

            
                        
<div class="form-group row">
    <label for="image" class="col-md-4 col-form-label ">Imagen</label>

    <div class="col-md-10">
        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}">

        @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

      


                        <div class="form-group row">
                            <label for="biografia" class="col-md-4 col-form-label ">Biografia</label>

                            <div class="col-md-10">
                                <input id="biografia" type="hidden"  name="biografia" value="{{old('biografia',auth::user()->perfil->biografia)}}" >
<trix-editor input="biografia" class="form-control @error ('biografia') is-invalid @enderror" style="
height: 14rem !important;
"  ></trix-editor>
                                @error('biografia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                
                        <div class="form-group row mb-0">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary mb-3">
                                  Actualizar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
   
    
@endsection

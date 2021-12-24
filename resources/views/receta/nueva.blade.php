


@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="text-center my-3">Crear Receta</h2>
    
    <div class="row my-4">
        <a href="{{route('receta.index')}}" class="btn btn-primary mx-1">volver</a>
        
        
    </div>
    
    <div class="row justify-content-center">
        <div class="col-md-8">
         
                    <form method="POST" action="{{ route('receta.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label ">Titulo</label>

                            <div class="col-md-10">
                                <input id="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="{{ old('titulo') }}" placeholder="Titulo receta"  autocomplete="titulo" autofocus>

                                @error('titulo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        
                        <div class="form-group row">
                            <label for="categoria" class="col-md-4 col-form-label ">Categorias</label>

                            <div class="col-md-10">
                                
    <select class="form-control @error ('categoria') is-invalid @enderror" id="categoria" name="categoria">
    <option value="">Seleccione una categoria</option>
    @foreach( $receta as $categoria )
    
<option value="{{$categoria->id  }}"{{ old('categoria') == $categoria->id ? 'selected' :'' }}>{{ $categoria->titulo }}</option>
@endforeach
</select>


                                @error('categoria')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="preparacion" class="col-md-4 col-form-label ">Preparacion</label>

                            <div class="col-md-10">
                                <input id="preparacion" type="hidden"  name="preparacion" value="{{ old('preparacion') }}" >
<trix-editor input="preparacion" class="form-control @error ('preparacion') is-invalid @enderror" style="
height: 14rem !important;
"  ></trix-editor>
                                @error('preparacion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        
                        <div class="form-group row">
                            <label for="ingredientes" class="col-md-4 col-form-label">Ingredientes</label>

                            <div class="col-md-10">
                                <input id="ingredientes" type="hidden"  name="ingredientes" value="{{ old('ingredientes') }}" >
<trix-editor input="ingredientes" class="form-control @error ('ingredientes') is-invalid @enderror" style="
height: 14rem !important;
" ></trix-editor>
                                @error('ingredientes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        
                        
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label ">Imagen</label>

                            <div class="col-md-10">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}"  >

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary mb-4">
                                  Crear recetas
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
   
    
@endsection



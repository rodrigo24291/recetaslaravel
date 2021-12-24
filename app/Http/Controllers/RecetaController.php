<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
class RecetaController extends Controller
{
    
public function __construct(){
    $this->middleware('auth',['except'=>['show','getimagen']]);
}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user=Auth::id();
        $receta=Receta::where('user_id','=',$user)->get();


        return view('receta.index')->with('recetas',$receta);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $recetas=DB::table('categorias')->get();
        return view('receta.nueva')->with('receta',$recetas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
'titulo'=>'required',
'preparacion'=>'required',
'ingredientes'=>'required',
'categoria'=>'required',
'image'=>'required|image',




        ]);

        $imagen=$request->file('image');
        $imagenname=time().$imagen->getClientOriginalName();
        Storage::disk('imagen')->put($imagenname,File::get($imagen));

        $categoria=new Receta();

        $categoria->titulo=$request->input('titulo');
        $categoria->imagen=$imagenname;
        $categoria->preparacion=$request->input('preparacion'); 
        $categoria->ingredientes=$request->input('ingredientes');
        $categoria->user_id= Auth::id();
        $categoria->categoria_id=$request->input('categoria');       
        $categoria->save();

        return redirect()->route('receta.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {

        $like=(auth()->user()) ? auth()->user()->likes->contains($receta->id) : false;
        $total= $receta->megusta->count();
        
        
        return view('receta.show')->with('receta',$receta)->with('total',$total)->with('likes',$like);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */

     public function getimagen($image){
$imagen=Storage::disk('imagen')->get($image);
return new Response($imagen,200); 
     }
    public function edit(Receta $receta,$id)
    {
        $receta=Receta::find($id);
        
        $this->authorize('edit',$receta);
        
        $recetas=Categoria::all();

        
       return view('receta.edit')->with('receta',$receta)->with('categoria',$recetas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {

        $recetaatualizar=$receta;
        $this->authorize('update',$receta);
        
        
if(auth::id()==$recetaatualizar->user_id){

        $request->validate([
            'titulo'=>'required',
            'preparacion'=>'required',
            'ingredientes'=>'required',
            'categoria'=>'required',
            'image'=>'image',            
                    ]);
            
        
                    

                    $imagen=$request->file('image');
                    if($imagen){
                    $imagenname=time().$imagen->getClientOriginalName();
                    Storage::disk('imagen')->put($imagenname,File::get($imagen));
                    $recetaatualizar->imagen=$imagenname;
                    }
                    
                    
            
                    $recetaatualizar->titulo=$request->input('titulo');
                    $recetaatualizar->preparacion=$request->input('preparacion'); 
                    $recetaatualizar->ingredientes=$request->input('ingredientes');
                    $recetaatualizar->user_id= Auth::id();
                    $recetaatualizar->categoria_id=$request->input('categoria');       
                    $recetaatualizar->update();
                    return redirect()->route('receta.edit',['id'=>$receta->id]);
                }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        $receta->delete();


    }
}

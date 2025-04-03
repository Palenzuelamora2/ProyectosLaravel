<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { $categoria = Categoria::all();
        $categoria= Categoria::orderBy('id','desc')->paginate("5");
        return view("categoria.categoria_index",compact("categoria"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('categoria.crear_categoria');
    }
       
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
        ]);

        $categoria = Categoria::create([
            'nombre' => $request->nombre
        ]);

        return redirect(route('categoria.index', absolute: false));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {$categoria = Categoria::find($id);
        return view("categoria.editar_categoria",compact("categoria"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
        ]);
        $categoria = Categoria::find($id);
        $categoria->update($request->all());

        return redirect(route('categoria.index', absolute: false));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();
        return redirect()->route('categoria.index')->with('success', 'Categoria eliminado exitosamente');
    }
}

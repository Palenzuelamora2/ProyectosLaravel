<?php

namespace App\Http\Controllers;
use App\Models\Proveedore;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $proveedor = Proveedore::all();
        $proveedor= Proveedore::orderBy('nombre','desc')->paginate("5");
        return view("proveedores.proveedores_index",compact("proveedor"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('proveedores.crear_proveedores');
    }
       
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'correo_contacto' => ['nullable', 'string', 'max:255'],
            'telefono' => ['nullable', 'string', 'max:255']
        ]);

        $proveedor = Proveedore::create([
            'nombre' => $request->nombre,
            'correo_contacto' => $request->correo_contacto,
            'telefono' => $request->telefono
        ]);

        return redirect(route('proveedores.index', absolute: false));
    }

    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {$prov = Proveedore::find($id);
        return view("proveedores.editar_proveedores",compact("prov"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
        ]);
        $proveedor = Proveedore::find($id);
        $proveedor->update($request->all());

        return redirect(route('proveedores.index', absolute: false));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proveedor = Proveedore::find($id);
        $proveedor->delete();
        return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado exitosamente');
    }
}

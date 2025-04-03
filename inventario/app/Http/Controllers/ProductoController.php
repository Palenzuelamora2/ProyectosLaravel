<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Proveedore;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with(['categoria', 'proveedore'])->get();
        $productos= Producto::orderBy('precio','desc')->paginate("5");
        return view('producto.index_producto', compact('productos'));
    }

    public function create()
    {
        //CONSUMIMOS LOS AUTORES Y GENEROS PARA PODER USARLOS AL CREAR 
        $categoria = Categoria::all();
        $proveedores = Proveedore::all();
        return view('producto.crear_producto', compact('categoria', 'proveedores'));
    }



    public function show(string $id)
    {
        $producto = Producto::with(['categoria', 'proveedore'])->find($id);
        $categoria = Categoria::all();
        $proveedores = Proveedore::all();
        return view('producto.show_producto', compact('producto', 'categoria', 'proveedores'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string',
            'precio' => 'nullable|int',
            'cantidad' => 'nullable|int',
            'categoria_id' => 'nullable|string',
            'proveedor_id' => 'nullable|string',
        ]);

        // Subir imagen si se proporciona


        // Crear el libro con los datos
        Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio, // Guardamos la ruta de la imagen
            'cantidad' => $request->cantidad,
            'categoria_id' => $request->categoria_id,
            'proveedor_id' => $request->proveedor_id
        ]);

        return redirect()->route('producto.index')->with('success', 'Producto creado exitosamente');
    }


    public function edit(String $id)
    {
        $producto = Producto::with(['categoria', 'proveedore'])->find($id);
        $categoria = Categoria::all();
        $proveedores = Proveedore::all();
        return view('producto.editar_producto', compact('producto', 'categoria', 'proveedores'));
    }

    public function update(Request $request, String $id)
    {
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string',
            'precio' => 'nullable|int',
            'cantidad' => 'nullable|int',
            'categoria_id' => 'required|string',
            'proveedor_id' => 'required|string',
        ]);
        $producto = Producto::find($id);
        $producto->update($request->all());
        return redirect()->route('producto.index')->with('success', 'Producto actualizado exitosamente');
    }

    public function destroy(String $id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        return redirect()->route('producto.index')->with('success', 'Producto eliminado exitosamente');
    }
}

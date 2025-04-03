<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuenta;

class CuentasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $cuentas = Cuenta::all();
        return view("cuentas.index",compact("cuentas"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("cuentas.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nombre_cliente" => "required|string",
            "numero_cuenta" => "nullable|string",
            'tipo_cuenta' => 'required|string',
            'saldo' => 'required|int'
        ]);

        Cuenta::create([
            'nombre_cliente' => $request->nombre_cliente,
            'numero_cuenta' => $request->numero_cuenta,
            'tipo_cuenta' => $request->tipo_cuenta,
            'saldo' => $request->saldo,
        ]);
        return redirect()->route('cuentas.index')->with('success', 'Cuenta creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show_ingresos(string $id)
    {
        $cuenta = Cuenta::find($id);
        return view("movimientos.ingreso" ,compact("cuenta"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\Revisione;
use App\Models\Modelo;
use Illuminate\Http\Request;

class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $matricula =  $request->matricula;
        $vehiculos = [];
        if (filled($matricula)) {
            $vehiculos = Vehiculo::where('matricula', 'like', "%{$matricula}%")->get();
        } else {
            $vehiculos = Vehiculo::with(['modelo', 'revisiones'])->get();
        }

        return view('vehiculos.index', compact('vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $modelos = Modelo::all();
        return view('vehiculos.create', compact('modelos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'matricula' => 'required|unique:vehiculos,matricula|string',
            'modelo_id' => 'nullable|int',
            'km' => 'required|int',
        ]);

        Vehiculo::create([
            'matricula' => $request->matricula,
            'modelo_id' => $request->modelo_id,
            'km' => $request->km,
        ]);

        return redirect()->route('vehiculos.index')->with('success', 'Vehiculo creado exitosamente');
    }

    

    /**
     * Display the specified resource.
     */
    public function show(Vehiculo $newVehiculo)
    {
        $vehiculo = Vehiculo::with(['modelo'])->find($newVehiculo);
        return view('revisiones.create', compact('vehiculo'));
    }

    public function historial(string $id)

    {
        $vehiculo = Vehiculo::with(['modelo'])->find($id);
        $revisiones = Revisione::where("vehiculo_id",$id)->get();
        return view('revisiones.historial', compact('vehiculo','revisiones'));
    }



    
}

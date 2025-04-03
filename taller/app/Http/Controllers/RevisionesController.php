<?php

namespace App\Http\Controllers;

use App\Models\Revisione;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class RevisionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $vehiculo = Vehiculo::find($id);
        return view("revisiones.create", compact('vehiculo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, int $id)
    {
        $vehiculo = Vehiculo::find($id);

        $request->validate([
            'km_revision' => 'required|int',
        ]);

        $revision =   Revisione::create([
            'vehiculo_id' => $id,
            'fecha' => Carbon::now(),
            'km_revision' => $request->km_revision,
        ]);

        if ($vehiculo) {
            $vehiculo->update([
                $vehiculo->increment('km', $revision->km_revision)
            ]);
            $vehiculo->save();
        }



        return redirect()->route('vehiculos.index')->with('success', 'Vehiculo creado exitosamente');
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

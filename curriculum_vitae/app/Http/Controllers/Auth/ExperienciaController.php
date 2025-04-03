<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use App\Models\Experiencia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExperienciaController extends Controller
{
    public function create(): View
    {
        return view('experiencias.crear_experiencia');
    }

    public function store(Request $request): RedirectResponse
    {

        $user = $request->user();
        $request->validate([
            'empresa' => ['required', 'string', 'max:255'],
            'puesto' => 'required|string',
            'descripcion' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
        ]);
        $experiencia = Experiencia::create([
            'empresa' => $request->empresa,
            'puesto' => $request->puesto,
            'descripcion' => $request->descripcion,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'usuario_id' => $user->id
        ]);
        event(new Registered($experiencia));
        Auth::login($user);
        return redirect(route('dashboard', absolute: false));
    }


    public function edit(String $id): View
    {
        $experiencia = Experiencia::findOrFail($id);
        return view('experiencias.editar_experiencia', compact('experiencia'));
    }


    public function update(Request $request, String $id)
    {
        $request->validate([
            'empresa' => 'required|string',
            'puesto' => 'nullable|string',
            'descripcion' => 'nullable|string',
        ]);

        $experiencia = Experiencia::find($id);
        $experiencia->update($request->all());
        // Redirigir con mensaje de éxito
        return redirect()->route('dashboard')->with('status', 'experiencia-updated');
    }
}

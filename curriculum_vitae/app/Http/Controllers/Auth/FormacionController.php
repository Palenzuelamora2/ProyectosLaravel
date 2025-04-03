<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Educacione;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
//FUNCIONES TODAS IGUALES EN LOS CONTROLADORES DE TODAS LAS TABLAS SOLO CAMBIAMOS LOS DATOS Y LISTO
class FormacionController extends Controller
{
    public function create(): View
    {
        return view('formacion.crear_formacion');
    }

    public function store(Request $request): RedirectResponse
    {

        $user = $request->user();
        $request->validate([
            'institucion' => ['required', 'string', 'max:255'],
            'titulo_obtenido' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
        ]);
        $formacion = Educacione::create([
            'institucion' => $request->institucion,
            'titulo_obtenido' => $request->titulo_obtenido,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'usuario_id' => $user->id
        ]);
        event(new Registered($formacion));
        Auth::login($user);
        return redirect(route('dashboard', absolute: false));
    }

    public function edit(String $id): View
    {
        $formacion = Educacione::findOrFail($id);
        return view('formacion.editar_formacion', compact('formacion'));
    }

    
    public function update(Request $request, String $id)
    {
        $request->validate([
            'institucion' => 'required|string',
            'titulo_obtenido' => 'nullable|string',
        ]);

        $formacion = Educacione::find($id);
        $formacion->update($request->all());
        // Redirigir con mensaje de éxito
        return redirect()->route('dashboard')->with('status', 'formacion-updated');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Models\Proyecto;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProyectosController extends Controller
{
    public function create(): View
    {
        return view('proyectos.crear_proyecto');
    }

    public function store(Request $request): RedirectResponse
    {

        $user = $request->user();
        $request->validate([
            'titulo' => ['required', 'string', 'max:255'],
            'descripcion' => 'nullable|string',
            'enlace_proyecto'=>'nullable|string'
        ]);
        $proyecto = Proyecto::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'enlace_proyecto' => $request->enlace_proyecto,
            'usuario_id' => $user->id
        ]);

        event(new Registered($proyecto));
        Auth::login($user);
        return redirect(route('dashboard', absolute: false));
    }

    public function edit(String $id): View
    {
        $proyecto = Proyecto::findOrFail($id);
        return view('proyectos.editar_proyecto', compact('proyecto'));
    }

    public function update(Request $request, String $id)
    {
        $request->validate([
            'titulo' => 'required|string',
            'descripcion' => 'nullable|string',
            'enlace_proyecto'=>'nullable|string'
        ]);

        $proyecto = Proyecto::find($id);
        $proyecto->update($request->all());
        // Redirigir con mensaje de éxito
        return redirect()->route('dashboard')->with('status', 'proyecto-updated');
    }
}

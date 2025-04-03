<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Educacione;
use App\Models\Habilidade;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HabilidadesController extends Controller
{
    public function create(): View
    {
        return view('habilidades.crear_habilidades');
    }

    public function store(Request $request): RedirectResponse
    {

        $user = $request->user();
        $request->validate([
            'nombre_habilidad' => ['required', 'string', 'max:255'],
            'nivel' => 'required|string',
        ]);
        $habilidad = Habilidade::create([
            'nombre_habilidad' => $request->nombre_habilidad,
            'nivel' => $request->nivel,
            'usuario_id' => $user->id
        ]);
        event(new Registered($habilidad));
        Auth::login($user);
        return redirect(route('dashboard', absolute: false));
    }

    public function edit(String $id): View
    {
        $habilidad = Habilidade::findOrFail($id);
        return view('habilidades.editar_habilidades', compact('habilidad'));
    }

    public function update(Request $request, String $id)
    {
        $request->validate([
            'nombre_habilidad' => 'required|string',
            'nivel' => 'nullable|string',
        ]);

        $habilidad = Habilidade::find($id);
        $habilidad->update($request->all());
        // Redirigir con mensaje de éxito
        return redirect()->route('dashboard')->with('status', 'habilidad-updated');
    }
}

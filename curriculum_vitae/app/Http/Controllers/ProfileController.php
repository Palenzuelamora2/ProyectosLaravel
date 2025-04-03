<?php

namespace App\Http\Controllers;

use App\Models\Perfile;
use App\Models\Experiencia;
use App\Models\Habilidade;
use App\Models\Educacione;
use App\Models\Proyecto;
use App\Models\User;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{

    public function curriculum(int $id)
    {
        //CON ESTA FUNCION CARGAMOS LOS DATOS EN EL CURRICULUM PUBLICO, IMPORTANTE PONER EL FIRST PORQUE SI NO NO FUNCIONA DEBIDO A QUE
        //SOLO QUEREMOS OBTENER UN OBJETO ( PREGUNTADO A CHATI)
        // $user = User::find($id);
        // $perfil = $user->perfil;
        // ASI CON LAS EXPERIENCIAS Y TODOS LOS DEMAS MODELOS ETC LUEGO EN LAS VISTAS HAY QUE USR $USER->LO QUE SEA-> Y LA PROPIEDAD Y EN EL COMPACT SOLO PASAMOS EL USER.
        $perfil =Perfile::where("usuario_id",$id)->first();
        $experiencia =Experiencia::where('usuario_id',$id)->get();
        $habilidades =Habilidade::where('usuario_id',$id)->get();
        $formacion =Educacione::where('usuario_id',$id)->get();
        $proyecto =Proyecto::where('usuario_id',$id)->get();
        return view('comunidad.curriculum_perfil',compact('perfil', 'experiencia', 'habilidades', 'formacion', 'proyecto'));
    }


    public function buscar(Request $request)
    {
        //FUNCION PARA EL BUSCADOR EL CUAL COGEMOS EL USER PARA LUEGO PASARLE EL ID DEL USUARIO Y QUE SE MUESTRE SU INFORMACIO 
        $user = $request->user();
        $nombre = $request->input('nombre');
        $perfiles = Perfile::where('nombre_completo', 'LIKE', "%{$nombre}%")->get();

        return view('comunidad.comunidad', compact('perfiles', 'nombre','user'));
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {

        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request)
    {//CON ESTO OBTENEMOS EL USUARIO MEDIANTE EL USER()
        $user = $request->user();
        $user->update([
            'name' => $request->name,
        ]);

        //  ASEGURAMOS QUE EL PERFIL EXISTE ANTES DE ACTUALIZARLO
        if ($user->perfil) {
            $user->perfil->update([
                'nombre_completo' => $request->name,
                'profesion' => $request->profesion,
                'telefono' => $request->telefono,
                'sobre_mi' => $request->sobre_mi,
                'sitio_web' => $request->sitio_web,
                'linkedin' => $request->linkedin,
                'github' => $request->github,
            ]);
        }

        return redirect()->route('profile.edit')->with('status', 'profile-updated');
    }





    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);
        $user = $request->user();

        Auth::logout();
        Perfile::where('usuario_id', $user->id)->delete();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}

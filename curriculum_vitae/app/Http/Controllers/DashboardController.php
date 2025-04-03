<?php


namespace App\Http\Controllers;

use App\Models\Experiencia;
use App\Models\Perfile;
use App\Models\Habilidade;
use App\Models\Educacione;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {   //OBTENEMOS TODOS LOS DATOS PARA MOSTRARLOS EN EL DASHBOARD
        $perfil =Perfile::where('usuario_id',Auth::id())->get();
        $experiencia =Experiencia::where('usuario_id',Auth::id())->get();
        $habilidades =Habilidade::where('usuario_id',Auth::id())->get();
        $formacion =Educacione::where('usuario_id',Auth::id())->get();
        $proyecto =Proyecto::where('usuario_id',Auth::id())->get();
        return view('dashboard', compact('perfil', 'experiencia', 'habilidades', 'formacion', 'proyecto'));
    }
}

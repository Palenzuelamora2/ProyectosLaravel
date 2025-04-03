<?php

namespace App\Http\Controllers;
use App\Models\Movimiento;
use Illuminate\Http\Request;
use App\Models\Cuenta;

class MovimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(int $id)
    {
        $cuenta = Cuenta::find($id);
        $movimientos = Movimiento::where("cuenta_id",$id)->get();
        return view("movimientos.index",compact("cuenta","movimientos"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_ingreso(int $id)
    {
        $cuenta = Cuenta::find($id);
        return view("movimientos.ingreso" ,compact("cuenta"));
    }

    public function create_retirada(int $id)
    {
        $cuenta = Cuenta::find($id);
        return view("movimientos.retiro" ,compact("cuenta"));
    }

    public function store_retirada(Request $request,string $id)
    {

        $request->validate([
            "monto" => "required|int",
        ]);
        $cuenta = Cuenta::find($id);
        if($request->monto < $cuenta->saldo){
              Movimiento::create([
                'monto' => $request->monto,
                'tipo'=>"retirada",
                'cuenta_id'=>$cuenta->id
            ]);
            $cuenta->update([
                'saldo' =>$cuenta->saldo -= $request->monto 
            ]);
            return redirect()->route('movimientos.index',$id)->with('success', 'Movimiento creado exitosamente');
        }
        return redirect()->route('movimientos.index',$id)->with('error', 'Movimiento no se ha podido generar');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store_ingreso(Request $request,string $id)
    {
        $request->validate([
            "monto" => "required|int",
        ]);

        $cuenta = Cuenta::find($id);
      $movimiento =  Movimiento::create([
            'monto' => $request->monto,
            'tipo'=>"ingreso",
            'cuenta_id'=>$cuenta->id
        ]);
        $cuenta->update([
            'saldo' => $request->monto + $cuenta->saldo
        ]);
        return redirect()->route('movimientos.index',$id)->with('success', 'Movimiento creado exitosamente');
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

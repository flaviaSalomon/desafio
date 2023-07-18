<?php

namespace App\Http\Controllers;

use App\Models\Transacciones;
use App\Models\Tipo;
use Illuminate\Http\Request;

class TransaccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos = Transacciones::orderBy('id', 'desc')->paginate(30);

        return view('transacciones', compact('datos') );

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $datype = Tipo::all();

        return view('agregartransacciones', compact('datype'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $monto = str_replace(".", "", $request->post('monto'));
        $transacciones = new Transacciones();
        $transacciones->id = $request->post('id');
        $transacciones->descripcion = $request->post('descripcion');
        $transacciones->fecha = $request->post('fecha');
        $transacciones->tipo_id = $request->post('tipo_id');
        $transacciones->monto = $monto;

        $transacciones->save();

        return redirect()->route('transacciones.index')->with("success", "Se ha agredado una nueva trasacción!");

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $transacciones = Transacciones::find($id);
        return view('eliminartransacciones', compact('transacciones'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        //Trae los datos que se van a editar y los coloca en el formmulario
        $datype = Tipo::all();
        $transacciones = Transacciones::find($id);
        return view('actualizartransacciones', compact('transacciones', 'datype'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $monto = str_replace(".", "", $request->post('monto'));
        $transacciones = Transacciones::find($id);
        $transacciones->descripcion = $request->post('descripcion');
        $transacciones->fecha = $request->post('fecha');
        $transacciones->tipo_id = $request->post('tipo_id');
        $transacciones->monto = $monto;
        $transacciones->save();

        return redirect()->route('transacciones.index')->with("success", "La transacción ha sido actualizada con exito!");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $transacciones = Transacciones::find($id);
        $transacciones->delete();
        return  redirect()->route('transacciones.index')->with("success", "La transacción ha sido eliminada!");

    }
}

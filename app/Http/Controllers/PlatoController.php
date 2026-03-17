<?php

namespace App\Http\Controllers;

use App\Models\Plato;
use Illuminate\Http\Request;

class PlatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $platos = Plato::all();
        return view('Platos.index')->with('resultado', $platos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Platos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Sirve para guardar datos en la base
        $plato = new Plato();
        $plato->idplato = $request->get('idplato');
        $plato->nombreplato = $request->get('nombreplato');
        $plato->descripcionplato = $request->get('descripcionplato');
        $plato->foto = $request->get('foto');
        $plato->niveldicultad = $request->get('niveldicultad');
        $plato->precio = $request->get('precio');
        $plato->save();

        return redirect('/platos');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $plato = Plato::find($id);
        return view('Platos.delete')->with('platoE', $plato);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $plato = Plato::find($id);

        return view('Platos.edit')->with('platoE', $plato);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $plato = Plato::find($id);
        $plato->idplato = $request->get('idplato');
        $plato->nombreplato = $request->get('nombreplato');
        $plato->descripcionplato = $request->get('descripcionplato');
        $plato->foto = $request->get('foto');
        $plato->niveldicultad = $request->get('niveldicultad');
        $plato->precio = $request->get('precio');
        $plato->save();

        return redirect('/platos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $eliminado = Plato::find($id);
        $eliminado->delete();

        return redirect('/platos');
    }
}

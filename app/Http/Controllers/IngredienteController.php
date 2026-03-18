<?php

namespace App\Http\Controllers;

use App\Models\Ingrediente;
use Illuminate\Http\Request;

class IngredienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ingredientes = Ingrediente::all();
        return view('Ingredientes.index')->with('resultado', $ingredientes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Ingredientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 
        $ingrediente = new Ingrediente();
        $ingrediente->idingredientes = $request->get('idingredientes');
        $ingrediente->nombreingre = $request->get('nombreingre');
        $ingrediente->inventario = $request->get('inventario');
        $ingrediente->save();

        return redirect('/ingredientes');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $ingrediente = Ingrediente::find($id);
        return view('Ingredientes.delete')->with('ingredienteE', $ingrediente);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $ingrediente = Ingrediente::find($id);

        return view('Ingredientes.edit')->with('ingredienteE', $ingrediente);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $ingrediente = Ingrediente::find($id);
        $ingrediente->idingredientes = $request->get('idingredientes');
        $ingrediente->nombreingre = $request->get('nombreingre');
        $ingrediente->inventario = $request->get('inventario');
        $ingrediente->save();

        return redirect('/ingredientes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $eliminado = Ingrediente::find($id);
        $eliminado->delete();

        return redirect('/ingredientes');
    }
}

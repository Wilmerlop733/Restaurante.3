<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use Illuminate\Http\Request;

class RecetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recetas = Receta::all();
        return view('Recetas.index')->with('resultado', $recetas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Recetas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $receta = new Receta();
        $receta->idreceta = $request->get('idreceta');
        $receta->cantidad = $request->get('cantidad');
        $receta->unidad_medida = $request->get('unidad_medida');
        $receta->save();

        return redirect('/recetas');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $receta = Receta::find($id);
        return view('Recetas.delete')->with('recetaE', $receta);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $receta = Receta::find($id);

        return view('Recetas.edit')->with('recetaE', $receta);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $receta = Receta::find($id);
        $receta->idreceta = $request->get('idreceta');
        $receta->cantidad = $request->get('cantidad');
        $receta->unidad_medida = $request->get('unidad_medida');
        $receta->save();

        return redirect('/recetas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $eliminado = Receta::find($id);
        $eliminado->delete();

        return redirect('/recetas');
    }
}

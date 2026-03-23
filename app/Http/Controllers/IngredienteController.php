<?php

namespace App\Http\Controllers;

use App\Models\Ingrediente;
use Illuminate\Http\Request;

class IngredienteController extends Controller
{
    public function index()
    {
        $listaIngredientes = Ingrediente::all();
        return view('Ingredientes.index')->with('dIngredientes', $listaIngredientes);
    }

    public function create()
    {
        return view('Ingredientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombreingre' => 'required|string|max:100',
            'cantidad' => 'required|numeric|min:0',
            'unidad_medida' => 'required|string',
        ]);

        $nuevoIngrediente = new Ingrediente();
        $nuevoIngrediente->nombreingre = $request->nombreingre;
        $nuevoIngrediente->inventario = $request->cantidad . " " . $request->unidad_medida;
        $nuevoIngrediente->save();

        return redirect('/ingrediente');
    }

    public function show(string $id)
    {
        $ingredienteEncontrado = Ingrediente::find($id);
        return view('Ingredientes.delete')->with('dIngredienteE', $ingredienteEncontrado);
    }

    public function edit(string $id)
    {
        $ingredienteAEditar = Ingrediente::find($id);
        return view('Ingredientes.edit')->with('dIngredienteE', $ingredienteAEditar);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombreingre' => 'required|string|max:100',
            'cantidad' => 'required|numeric|min:0',
            'unidad_medida' => 'required|string',
        ]);

        $ingredienteExistente = Ingrediente::find($id);
        $ingredienteExistente->nombreingre = $request->nombreingre;
        $ingredienteExistente->inventario = $request->cantidad . " " . $request->unidad_medida;
        $ingredienteExistente->save();

        return redirect('/ingrediente');
    }

    public function destroy(string $id)
    {
        $ingredienteParaBorrar = Ingrediente::find($id);
        $ingredienteParaBorrar->delete();

        return redirect('/ingrediente');
    }
}

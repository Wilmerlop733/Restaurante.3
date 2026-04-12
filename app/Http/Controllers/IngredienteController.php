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
        $nuevoIngrediente->inventario = $request->cantidad;
        $nuevoIngrediente->unidad_medida = $request->unidad_medida;
        $nuevoIngrediente->save();

        return redirect('/ingrediente')->with('success', 'Ingrediente creado con éxito.');
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
        $ingredienteExistente->inventario = $request->cantidad;
        $ingredienteExistente->unidad_medida = $request->unidad_medida;
        $ingredienteExistente->save();

        return redirect('/ingrediente')->with('success', 'Ingrediente actualizado.');
    }

    public function destroy(string $id)
    {
        $ingredienteParaBorrar = Ingrediente::find($id);
        $ingredienteParaBorrar->delete();

        return redirect('/ingrediente')->with('success', 'Ingrediente eliminado.');
    }

    public function agregarStock(Request $request, $id)
    {
        $request->validate([
            'cantidad_nueva' => 'required|numeric|min:0.01'
        ]);

        $ingrediente = Ingrediente::findOrFail($id);
        $ingrediente->increment('inventario', $request->cantidad_nueva);

        return redirect()->back()->with('success', "¡Inventario de {$ingrediente->nombreingre} actualizado con éxito!");
    }
}
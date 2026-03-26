<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use App\Models\Plato;
use App\Models\Ingrediente;
use Illuminate\Http\Request;

class RecetaController extends Controller
{
    public function verreceta(string $id)
    {
        $plato = Plato::find($id);
        $recetas = Receta::with('ingrediente')->where('idplato', '=', $id)->get();
        
        return view('Recetas.index')
            ->with('dRecetas', $recetas)
            ->with('dInfoPlato', $plato);
    }

    public function index()
    {
        $recetas = Receta::with('ingrediente')->get();
        return view('Recetas.index')
            ->with('dRecetas', $recetas);
    }

    public function create()
    {
        $idDelPlato = request()->get('idplato');
        $listaPlatos = Plato::all();
        $listaIngredientes = Ingrediente::all();
        
        return view('Recetas.create')
            ->with('dIdplato', $idDelPlato)
            ->with('dPlatos', $listaPlatos)
            ->with('dIngredientes', $listaIngredientes);
    }

    public function store(Request $request)
    {
        $request->validate([
            'idplato' => 'required',
            'idingredientes' => 'required',
            'cantidad' => 'required|numeric|min:0.01',
            'unidad_medida' => 'required|string|max:50',
        ]);

        $nuevaReceta = new Receta();
        $nuevaReceta->idplato = $request->idplato;
        $nuevaReceta->idingredientes = $request->idingredientes;
        $nuevaReceta->cantidad = $request->cantidad;
        $nuevaReceta->unidad_medida = $request->unidad_medida;
        $nuevaReceta->save();

        return redirect('/receta/filtro/' . $nuevaReceta->idplato);
    }

    public function show(string $id)
    {
        $receta = Receta::find($id);
        return view('Recetas.delete')->with('dRecetaE', $receta);
    }

    public function edit(string $id)
    {
        $receta = Receta::find($id);
        $listaPlatos = Plato::all();
        $listaIngredientes = Ingrediente::all();

        return view('Recetas.edit')
            ->with('dRecetaE', $receta)
            ->with('dPlatos', $listaPlatos)
            ->with('dIngredientes', $listaIngredientes);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'idplato' => 'required',
            'idingredientes' => 'required',
            'cantidad' => 'required|numeric|min:0.01',
            'unidad_medida' => 'required|string|max:50',
        ]);

        $receta = Receta::find($id);
        $receta->idplato = $request->idplato;
        $receta->idingredientes = $request->idingredientes;
        $receta->cantidad = $request->cantidad;
        $receta->unidad_medida = $request->unidad_medida;
        $receta->save();

        return redirect('/receta/filtro/' . $receta->idplato);
    }

    public function destroy(string $id)
    {
        $recetaAEliminar = Receta::find($id);
        $idDelPlato = $recetaAEliminar->idplato;
        $recetaAEliminar->delete();

        return redirect('/receta/filtro/' . $idDelPlato);
    }
}

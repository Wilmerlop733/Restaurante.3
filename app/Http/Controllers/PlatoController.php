<?php

namespace App\Http\Controllers;

use App\Models\Plato;
use App\Models\Categoria;
use App\Models\Ingrediente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlatoController extends Controller
{
    public function vistaClientes()
    {
        $platos = Plato::all();
        return view('Clientes.index')->with('dPlatos', $platos);
    }

    public function ordenarPlato(Request $request)
{
    $plato = Plato::with('ingredientes')->findOrFail($request->idplato);

    try {
        DB::beginTransaction();

        foreach ($plato->ingredientes as $ingrediente) {
            $cantidadUsada = $ingrediente->pivot->cantidad_usada;
            if ($ingrediente->inventario < $cantidadUsada) {
                throw new \Exception("Stock insuficiente de: {$ingrediente->nombreingre}");
            }
            $ingrediente->decrement('inventario', $cantidadUsada);
        }
        DB::commit();
        return back()->with('success', '¡Pedido realizado y stock actualizado!');

    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', $e->getMessage());
    }
}

    public function verplatos(string $id)
    {
        $categoria = Categoria::find($id);
        $platos = Plato::where('idcategoria', '=', $id)->get();
        return view('Platos.index')
            ->with('dPlatos', $platos)
            ->with('dInfoCategoria', $categoria);
    }

    public function index()
    {
        $listaPlatos = Plato::all();
        return view('Platos.index')->with('dPlatos', $listaPlatos);
    }

    public function create()
    {
        $rutaComidas = public_path('Comidas');
        $listaDeImagenes = array_diff(scandir($rutaComidas), array('..', '.'));
        $todasLasCategorias = Categoria::all();
        $idCategoriaDeLaURL = request()->get('idcategoria');

        return view('Platos.create')
            ->with('dImagenes', $listaDeImagenes)
            ->with('dCategorias', $todasLasCategorias)
            ->with('dIdcategoria', $idCategoriaDeLaURL);
    }

    public function store(Request $request)
    {
        $request->validate([
            'idcategoria' => 'required',
            'nombreplato' => 'required|string|max:100',
            'descripcionplato' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'niveldicultad' => 'required',
            'precio' => 'required|numeric|min:0',
        ]);

        $nuevoPlato = new Plato();
        $nuevoPlato->idcategoria = $request->idcategoria;
        $nuevoPlato->nombreplato = $request->nombreplato;
        $nuevoPlato->descripcionplato = $request->descripcionplato;
        $nuevoPlato->niveldicultad = $request->niveldicultad;
        $nuevoPlato->precio = $request->precio;

        if ($request->hasFile('foto')) {
            $archivoFoto = $request->file('foto');
            $nombreArchivo = time() . '_' . $archivoFoto->getClientOriginalName();
            $archivoFoto->move(public_path('Comidas'), $nombreArchivo);
            $nuevoPlato->foto = $nombreArchivo;
        }

        $nuevoPlato->save();
        return redirect('/plato');
    }

    public function show(string $id)
    {
        $platoEncontrado = Plato::find($id);
        return view('Platos.delete')->with('dPlatoE', $platoEncontrado);
    }

    public function edit(string $id)
    {
        $platoAEditar = Plato::find($id);
        $rutaComidas = public_path('Comidas');
        $listaDeImagenes = array_diff(scandir($rutaComidas), array('..', '.'));
        $todasLasCategorias = Categoria::all();

        return view('Platos.edit')
            ->with('dPlatoE', $platoAEditar)
            ->with('dImagenes', $listaDeImagenes)
            ->with('dCategorias', $todasLasCategorias);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'idcategoria' => 'required',
            'nombreplato' => 'required|string|max:100',
            'descripcionplato' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'niveldicultad' => 'required',
            'precio' => 'required|numeric|min:0',
        ]);

        $platoExistente = Plato::find($id);
        $platoExistente->idcategoria = $request->idcategoria;
        $platoExistente->nombreplato = $request->nombreplato;
        $platoExistente->descripcionplato = $request->descripcionplato;
        $platoExistente->niveldicultad = $request->niveldicultad;
        $platoExistente->precio = $request->precio;

        if ($request->hasFile('foto')) {
            $archivoNuevo = $request->file('foto');
            $nombreNuevo = time() . '_' . $archivoNuevo->getClientOriginalName();
            $archivoNuevo->move(public_path('Comidas'), $nombreNuevo);
            $platoExistente->foto = $nombreNuevo;
        }

        $platoExistente->save();
        return redirect('/plato');
    }

    public function destroy(string $id)
    {
        $platoParaBorrar = Plato::find($id);
        $platoParaBorrar->delete();
        return redirect('/plato');
    }
}
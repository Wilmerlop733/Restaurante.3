<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $listaCategorias = Categoria::all();
        $datosParaLaVista = [
            'dCategorias' => $listaCategorias
        ];

        return view('Categorias.index', $datosParaLaVista);
    }

    public function create()
    {
        return view('Categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombrecat' => 'required|string|max:100',
            'descripcioncat' => 'required|string|max:255',
            'encargadocat' => 'required|string|max:100',
        ]);

        $nuevaCategoria = new Categoria();
        $nuevaCategoria->nombrecat = $request->nombrecat;
        $nuevaCategoria->descripcioncat = $request->descripcioncat;
        $nuevaCategoria->encargadocat = $request->encargadocat;
        $nuevaCategoria->save();

        return redirect('/categoria');
    }

    public function show(string $id)
    {
        $categoriaEncontrada = Categoria::find($id);
        return view('Categorias.delete')->with('dCategoriaE', $categoriaEncontrada);
    }

    public function edit(string $id)
    {
        $categoriaAEditar = Categoria::find($id);
        return view('Categorias.edit')->with('dCategoriaE', $categoriaAEditar);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombrecat' => 'required|string|max:100',
            'descripcioncat' => 'required|string|max:255',
            'encargadocat' => 'required|string|max:100',
        ]);

        $categoriaExistente = Categoria::find($id);
        $categoriaExistente->nombrecat = $request->nombrecat;
        $categoriaExistente->descripcioncat = $request->descripcioncat;
        $categoriaExistente->encargadocat = $request->encargadocat;
        $categoriaExistente->save();

        return redirect('/categoria');
    }

    public function destroy(string $id)
    {
        $categoriaParaBorrar = Categoria::find($id);
        $categoriaParaBorrar->delete();

        return redirect('/categoria');
    }
}

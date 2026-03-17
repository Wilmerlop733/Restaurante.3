<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('Categorias.index')->with('resultado', $categorias);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $categoria = new Categoria();
        $categoria->idcategoria = $request->get('idcategoria');
        $categoria->nombrecat = $request->get('nombrecat');
        $categoria->descripcioncat = $request->get('descripcioncat');
        $categoria->encargadocat = $request->get('encargadocat');
        $categoria->save();

        return redirect('/categorias');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $categoria = Categoria::find($id);
        return view('Categorias.delete')->with('categoriaE', $categoria);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $categoria = Categoria::find($id);

        return view('Categorias.edit')->with('categoriaE', $categoria);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $categoria = Categoria::find($id);
        $categoria->idcategoria = $request->get('idcategoria');
        $categoria->nombrecat = $request->get('nombrecat');
        $categoria->descripcioncat = $request->get('descripcioncat');
        $categoria->encargadocat = $request->get('encargadocat');
        $categoria->save();

        return redirect('/categorias');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $eliminado = Categoria::find($id);
        $eliminado->delete();

        return redirect('/categorias');
    }
}

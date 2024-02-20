<?php

namespace App\Http\Controllers;


use App\Models\Peliculas;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;


class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peliculas = DB::table('peliculas')->get();
        return view('peliculas.index', ['peliculas' => $peliculas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peliculas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'año' => 'required',
            'director' => 'required',
            'sinopsis' => 'required',
        ]);

        Peliculas::create($request->all());

        return redirect()->route('peliculas.index')->with('success', 'Pelicula creada correctamente.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Peliculas $peliculas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pelicula = Peliculas::find($id);
        return view('peliculas.edit', compact('pelicula'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'año' => 'required',
            'director' => 'required',
            'sinopsis' => 'required',
        ]);
    
        $pelicula = Peliculas::find($id);
    
        $pelicula->update($request->all());
    
        return redirect()->route('peliculas.index')->with('success', 'Película actualizada correctamente.');
    }
     

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pelicula = Peliculas::find($id);
        $pelicula->delete();
        return redirect()->route('peliculas.index')->with('success', 'Pelicula eliminada!');
    }
}

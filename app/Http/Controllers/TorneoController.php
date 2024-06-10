<?php

namespace App\Http\Controllers;

use App\Http\Controllers\utile\ImagenHelper;
use App\Models\Tenista;
use App\Models\Torneo;
use Illuminate\Http\Request;

class TorneoController extends Controller
{
    private $imageHelper;

    public function __construct()
    {
        $this->imageHelper = new ImagenHelper();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $torneos = Torneo::all();
        return view('torneos.index')->with('torneos', $torneos);
    }

    private function validationRules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'modalidad' => 'required|string|max:255',
            'superficie' => 'required|string|max:255',
            'vacantes' => 'required|integer',
            'categoria' => 'required|string|max:255',
            'premios' => 'required|string|max:255',
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date',
            'imagen' => 'nullable|image|max:5120', // Permitir hasta 5 MB
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('torneos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->validationRules());

        $torneo = new Torneo($request->all());

        if ($request->hasFile('imagen')) {
            $this->imageHelper->updateImage($request, $torneo, Torneo::$IMAGE_DEFAULT);
        }
        $torneo->save();

        // Asociar los tenistas seleccionados con el torneo
        if ($request->has('tenistas')) {
            $torneo->tenistas()->sync($request->tenistas);
        }

        return redirect()->route('torneos.index')->with('success', 'Torneo creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id = null)
    {
        if ($id === null || $id === 'create') {
            return view('torneos.create');
        } else {
            $torneo = Torneo::findOrFail($id);
            $tenista = Tenista::find($torneo->vacantes);
            return view('torneos.show')->with(['torneo' => $torneo, 'tenista' => $tenista]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $torneo = Torneo::findOrFail($id);
        return view('torneos.edit')->with('torneo', $torneo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate($this->validationRules());

        $torneo = Torneo::findOrFail($id);
        $torneo->fill($request->all());

        if ($request->hasFile('imagen')) {
            $this->imageHelper->updateImage($request, $torneo, Torneo::$IMAGE_DEFAULT);
        }
        $torneo->save();

        // Asociar los tenistas seleccionados con el torneo
        if ($request->has('tenistas')) {
            $torneo->tenistas()->sync($request->tenistas);
        }

        return redirect()->route('torneos.index')->with('success', 'Torneo actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $torneo = Torneo::findOrFail($id);
        $name = strtolower(class_basename($torneo));
        if ($torneo->imagen && $torneo->imagen !== Torneo::$IMAGE_DEFAULT) {
            $this->imageHelper->deleteOldImage($torneo->imagen, Torneo::$IMAGE_DEFAULT, $name);
        }

        $torneo->delete();

        return redirect()->route('torneos.index')->with('success', 'Torneo eliminado correctamente');
    }
}

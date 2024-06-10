<?php

namespace App\Http\Controllers;

use App\Http\Controllers\utile\DateHelper;
use App\Http\Controllers\utile\ImagenHelper;
use App\Models\Tenista;
use Illuminate\Http\Request;

class TenistaController extends Controller
{

    protected $imageHelper;
    protected $dateHelper;

    public function __construct(ImagenHelper $imageHelper, DateHelper $dateHelper)
    {
        $this->imageHelper = $imageHelper;
        $this->dateHelper = $dateHelper;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tenistas = Tenista::where('nombre', 'like', '%' . $request->search . '%')
            ->orWhere('apellido', 'like', '%' . $request->search . '%')
            ->orderBy('id', 'asc')
            ->paginate(4);

        return view('tenistas.index')->with('tenistas', $tenistas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tenistas.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    private function validationRules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'ranking' => 'required|integer',
            'pais' => 'required|string|max:255',
            'FechaNacimiento' => 'required|date',
            'Altura' => 'required|integer',
            'peso' => 'required|integer',
            'Mano' => 'required|string|max:255',
            'reves' => 'required|string|max:255',
            'entrenador' => 'required|string|max:255',
            'totalDineroGanado' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'numeroVictorias' => 'required|integer',
            'numeroDerrotas' => 'required|integer',
            'imagen' => 'nullable|image|max:5120', // Permitir hasta 5 MB
            'puntos' => 'required|integer',
        ];
    }


    public function store(Request $request, Tenista $tenista)
    {
        $request->validate($this->validationRules());

        $edad = $this->dateHelper->calculateAge($request->FechaNacimiento);

        $tenista->fill($request->all());
        $tenista->edad = $edad;

        $tenista->save();

        if ($request->hasFile('imagen')) {
            $this->imageHelper->updateImage($request, $tenista, Tenista::$IMAGE_DEFAULT);
        }

        return redirect()->route('tenistas.index')->with('success', 'Tenista creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id = null)
    {
        if ($id === null || $id === 'create') {
            return redirect()->route('tenistas.create');
        } else {
            $tenista = Tenista::findOrFail($id);
            return view('tenistas.show')->with('tenista', $tenista);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tenista = Tenista::find($id);
        return view('tenistas.edit')->with('tenista', $tenista);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tenista $tenista)
    {
        $request->validate($this->validationRules());

        $tenista->fill($request->all());
        $tenista->edad = $this->dateHelper->calculateAge($request->FechaNacimiento);

        if ($request->hasFile('imagen')) {
            $this->imageHelper->updateImage($request, $tenista, Tenista::$IMAGE_DEFAULT);
        }

        $tenista->save();

        return redirect()->route('tenistas.index')->with('success', 'Tenista actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenista $tenista)
    {
        $name = strtolower(class_basename($tenista));
        if ($tenista->imagen && $tenista->imagen !== Tenista::$IMAGE_DEFAULT) {
            $this->imageHelper->deleteOldImage($tenista->imagen, Tenista::$IMAGE_DEFAULT, $name);
        }

        $tenista->delete();

        return redirect()->route('tenistas.index')->with('success', 'Tenista eliminado correctamente');
    }
}

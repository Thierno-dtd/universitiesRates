<?php

namespace App\Http\Controllers;

use App\Models\Filial;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class FilialsController extends Controller
{
    public function index() : \Inertia\Response
    {
        $filials = Filial::all();
        return Inertia::render('Filials/Index', ['filials' => $filials]);
    }

    public function ind() : \Inertia\Response
    {
        $filials = Filial::all();
        return Inertia::render('admin/Universities/filials', ['filials' => $filials]);
    }

    // Afficher les détails d'une filiale
    public function show($id) : Response
    {
        $filial = Filial::find($id);

        if(!$filial) {
            return Inertia::render('Errors/NotFound', ['message' => 'Filiale non trouvée']);
        }

        return Inertia::render('Filials/Show', ['filial' => $filial]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'image' => 'required|string',
            'location' => 'required|string',
            'description' => 'required|string',
            'university_id' => 'required|exists:universities,id',
        ]);

        $filial = Filial::create($validatedData);

        return redirect()->route('filials.index')->with('success', 'Filiale créée avec succès');
    }

    // Mettre à jour une filiale
    public function update(Request $request, $id)
    {
        $filial = Filial::find($id);
        if (!$filial) {
            return Inertia::render('Errors/NotFound', ['message' => 'Filiale non trouvée']);
        }

        $validatedData = $request->valider([
            'name' => 'sometimes|string',
            'image' => 'sometimes|string',
            'location' => 'sometimes|string',
            'description' => 'sometimes|string',
            'university_id' => 'sometimes|exists:universities,id',
        ]);

        $filial.update($validatedData);

        return redirect()->route('filials.show', $id)->with('success', 'Filiale mise à jour avec succès');
    }

    public function destroy($id)
    {
        $filial = Filial::find($id);
        if (!$filial) {
            return Inertia::render('Errors/NotFound', ['message' => 'Filiale non trouvée']);
        }

        $filial.delete();

        return redirect()->route('filials.index')->with('success', 'Filiale supprimée avec succès');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Infrastructure;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InfrastructureController extends Controller
{
    public function index()
    {
        $infrastructures = Infrastructure::all();
        return Inertia::render('Infrastructures/Index', ['infrastructures' => $infrastructures]);
    }

    // Afficher les détails d'une infrastructure
    public function show($id)
    {
        $infrastructure = Infrastructure::find($id);

        if (!$infrastructure) {
            return Inertia::render('Errors/NotFound', ['message' => 'Infrastructure non trouvée']);
        }

        return Inertia::render('Infrastructures/Show', ['infrastructure' => $infrastructure]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'sometimes|string',
            'slug' => 'required|string|unique:infrastructures,slug',
            'university_id' => 'required|exists:universities,id',
        ]);

        $infrastructure = Infrastructure::create($validatedData);

        return redirect()->route('infrastructures.index')->with('success', 'Infrastructure créée avec succès');
    }

    public function update(Request $request, $id)
    {
        $infrastructure = Infrastructure::find($id);
        if (!$infrastructure) {
            return Inertia::render('Errors/NotFound', ['message' => 'Infrastructure non trouvée']);
        }

        $validatedData = $request->validate([
            'name' => 'sometimes|string',
            'description' => 'sometimes|string',
            'slug' => 'sometimes|string|unique:infrastructures,slug,' . $id,
            'university_id' => 'sometimes|exists:universities,id',
        ]);

        $infrastructure->update($validatedData);

        return redirect()->route('infrastructures.show', $id)->with('success', 'Infrastructure mise à jour avec succès');
    }

    // Supprimer une infrastructure
    public function destroy($id)
    {
        $infrastructure = Infrastructure::find($id);
        if (!$infrastructure) {
            return Inertia::render('Errors/NotFound', ['message' => 'Infrastructure non trouvée']);
        }

        $infrastructure.delete();

        return redirect()->route('infrastructures.index')->with('success', 'Infrastructure supprimée avec succès');
    }
}

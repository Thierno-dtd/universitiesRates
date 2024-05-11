<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        return Inertia::render('Programs/Index', ['programs' => $programs]);
    }

    // Afficher les détails d'un programme
    public function show($id)
    {
        $program = Program::find($id);

        if (!$program) {
            return Inertia::render('Errors/NotFound', ['message' => 'Programme non trouvé']);
        }

        return Inertia::render('Programs/Show', ['program' => $program]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|unique:programs,name',
            'description' => 'sometimes|string',
        ]);

        $program = Program::create($validatedData);

        return redirect()->route('programs.index')->with('success', 'Programme créé avec succès');
    }

    // Mettre à jour un programme
    public function update(Request $request, $id)
    {
        $program = Program::find($id);
        if (!$program) {
            return Inertia::render('Errors/NotFound', ['message' => 'Programme non trouvé']);
        }

        $validatedData = $request->validate([
            'name' => 'sometimes|string|unique:programs,name,' . $id,
            'description' => 'sometimes|string',
        ]);

        $program->update($validatedData);

        return redirect()->route('programs.show', $id)->with('success', 'Programme mis à jour avec succès');
    }

    public function destroy($id)
    {
        $program = Program::find($id);
        if (!$program) {
            return Inertia::render('Errors/NotFound', ['message' => 'Programme non trouvé']);
        }

        $program->delete();

        return redirect()->route('programs.index')->with('success', 'Programme supprimé avec succès');
    }
}

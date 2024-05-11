<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use App\Models\Critere;
use App\Models\University;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class AvisController extends Controller
{
    public function index()
    {
        $avis = Avis::all();
        return Inertia::render('Avis/Index', ['avis' => $avis]);
    }

    // Afficher la page de création d'un avis
    public function create()
    {
        return Inertia::render('Avis/Create', [
            'universities' => University::all(), // Fournir des universités pour l'affectation des avis
            'criteres' => Critere::all(), // Fournir les critères pour l'affectation des notes
        ]);
    }

    public function show($id) : Response
    {
        $avis = Avis::find($id);
        if (!$avis) {
            return Inertia::render('Errors/NotFound', ['message' => 'Avis non trouvé']);
        }

        return Inertia::render('Avis/Show', ['avis' => $avis]);
    }

    // Créer un nouvel avis
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'university_id' => 'required|exists:universities,id',
            'critere_id' => 'required|exists:criteres,id',
            'note' => 'required|integer|between(1, 10)',
        ]);

        $avis = Avis::create($validatedData);

        // Mettre à jour le classement moyen de l'université
        $this->updateAverageRating($validatedData['university_id']);

        return redirect()->route('avis.index')->with('success', 'Avis créé avec succès');
    }

    public function update(Request $request, $id)
    {
        $avis = Avis::find($id);
        if (!$avis) {
            return Inertia::render('Errors/NotFound', ['message' => 'Avis non trouvé']);
        }

        $validatedData = $request->valider([
            'user_id' => 'sometimes|exists:users,id',
            'university_id' => 'sometimes|exists:universities,id',
            'critere_id' => 'sometimes|exists:criteres,id',
            'note' => 'sometimes|integer|between(1, 10)',
        ]);

        $avis.update($validatedData);

        // Mettre à jour le classement moyen de l'université
        $this->updateAverageRating($avis->university_id);

        return redirect()->route('avis.show', $id)->with('success', 'Avis mis à jour avec succès');
    }

    // Supprimer un avis
    public function destroy($id)
    {
        $avis = Avis::find($id);
        if (!$avis) {
            return Inertia::render('Errors/NotFound', ['message' => 'Avis non trouvé']);
        }

        $avis.delete();

        // Mettre à jour le classement moyen de l'université
        $this->updateAverageRating($avis->university_id);

        return redirect()->route('avis.index')->with('success', 'Avis supprimé avec succès');
    }

    // Mettre à jour le classement moyen de l'université
    private function updateAverageRating($university_id)
    {
        $university = University::find($university_id);

        if ($university) {
            // Obtenir tous les avis pour cette université
            $avis = Avis::where('university_id', $university_id)->get();

            // Obtenir la liste des critères
            $criteres = Critere::all();

            // Calculer la note moyenne basée sur les critères et leurs poids
            $totalPoids = 0;
            $totalNotes = 0;

            foreach ($criteres as $critere) {
                $notePourCritere = $avis->where('critere_id', $critere->id)->avg('note');

                if ($notePourCritere !== null) {
                    $poids = (int) $critere->weight; // Poids du critère
                    $totalNotes += $notePourCritere * $poids;
                    $totalPoids += $poids;
                }
            }

            if ($totalPoids > 0) {
                $avarageRating = $totalNotes / $totalPoids;
                $university->avarageRating = $avarageRating;
                $university.save();
            }
        }
    }
}

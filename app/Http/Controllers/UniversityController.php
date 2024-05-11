<?php

namespace App\Http\Controllers;

use App\Models\Critere;
use App\Models\University;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : Response
    {
        $universities = University::all();
        return Inertia::render('admin/Universities/Index', ['universities' => $universities]);
    }

    public function inde()
    {
        $universities = \App\Models\University::orderBy('avarageRating', 'desc')

            ->get();
        return view('showFilial', ['universities' => $universities]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : Response
    {
        return Inertia::render('Universities/Create', [
            'criteres' => Critere::all(), // Fournir des données supplémentaires, comme les critères
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $university = new University();
        $university->name=$request->name;
        $university->website=$request->website;
        $university->location=$request->location;
        $university->description=$request->description;
        $university->haveFiliale=$request->haveFiliale;
        $university->image=$request->image;
        $university->avarageRating=0.0;
        $university->save();

        return to_route('universities.index');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $university = University::findOrFail($id);

        if (!$university) {
            abort(404);
        }
        return view('schoolDetails', compact('university'));

    }
    public function sh($id)
    {
        $university = University::findOrFail($id);
        $criteres = Critere::all();
        if (!$university) {
            abort(404);
        }
        return view('form', ['university' => $university],[ 'criteres' => $criteres]);

    }

    public function showModif($id)
    {
        $university = University::find($id);
        $content = view('form', ['university' => $university])->render();
        return response()->json([
            'content' => $content, ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $university = University::find($id); // Trouver l'université par ID
        if (!$university) {
            return response()->json(['error' => 'University not found'], 404); // Université non trouvée
        }
        $university->name=$request->name;
        $university->website=$request->website;
        $university->location=$request->location;
        $university->description=$request->description;
        $university->haveFiliale=$request->haveFiliale;
        $university->image=$request->image;
        $university->update();

        return to_route('universities.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $university = University::find($id);

        if ($university) { // Vérifiez si l'université existe
            $university->delete(); // Utilisez la méthode `delete` pour supprimer l'université
        } else {
            return redirect()->route('universities.index')->withErrors('Université non trouvée');
        }

        return redirect()->route('universities.index')->with('success', 'Université supprimée avec succès');
    }

    public function topRatedUniversities()
    {

        $topUniversities = University::orderBy('averageRating', 'desc') // Trier par `averageRating` décroissant
        ->limit(3) // Limiter à trois résultats
        ->get(); // Récupérer les résultats

        return response()->json($topUniversities); // Ou utiliser Inertia pour rendre une vue
    }


}

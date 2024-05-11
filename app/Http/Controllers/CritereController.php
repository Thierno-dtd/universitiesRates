<?php

namespace App\Http\Controllers;

use App\Models\Critere;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CritereController extends Controller
{
    public function index()
    {
        $criteres = Critere::all();
        return Inertia::render('admin/Criteres/Index', ['criteres' => $criteres]);
    }


    public function create()
    {
        return Inertia::render('Criteres/Create');
    }

    // Afficher les détails d'un critère
//    public function show($id)
//    {
//        $critere = Critere::find($id);
//        if (!$critere) {
//            return Inertia::render('Errors/NotFound', ['message' => 'Critère non trouvé']);
//        }
//
//        return Inertia::render('Criteres/Show', ['critere' => $critere]);
//    }

    public function store(Request $request)
    {   $critere = new Critere();
        $critere->name=$request->name;
        $critere->description=$request->description;
        $critere->weight=$request->weight;
        $critere->save();



        return redirect()->route('criteres.index')->with('success', 'Critère créé avec succès');
    }

    // Mettre à jour un critère
    public function update(Request $request, $id)
    {
        $critere = Critere::find($id);
        if (!$critere) {
            return Inertia::render('Errors/NotFound', ['message' => 'Critère non trouvé']);
        }

        $critere->name=$request->name;
        $critere->description=$request->description;
        $critere->weight=$request->weight;
        $critere->update();


        return redirect()->route('criteres.index', $id)->with('success', 'Critère mis à jour avec succès');
    }

    public function destroy($id)
    {
        $critere = Critere::find($id);
        if (!$critere) {
            return Inertia::render('Errors/NotFound', ['message' => 'Critère non trouvé']);
        }

        $critere->delete();

        return redirect()->route('criteres.index')->with('success', 'Critère supprimé avec succès');
    }
}

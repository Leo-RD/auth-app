<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article; // Ne pas oublier d'importer le modèle

class ArticleController extends Controller
{


    public function index()
    {
        // Récupère les articles triés par date de création décroissante
        $articles = Article::latest()->get();

        // Renvoie la vue 'index' en lui passant la liste des articles
        return view('articles.index', ['articles' => $articles]);
    }

    // 1. Afficher le formulaire
    public function create()
    {
        return view('articles.create');
    }

    // 2. Traiter les données envoyées
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048' // Vérifie que c'est bien une image (max 2Mo)
        ]);

        // Si une image a été envoyée
        if ($request->hasFile('image')) {
            // Sauvegarde l'image dans storage/app/public/articles
            $validated['image'] = $request->file('image')->store('articles', 'public');
        }

        Article::create($validated);

        return redirect('/articles'); // On redirige vers la liste des articles
    }
}

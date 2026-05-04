<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all(); 
        // recupera tutti gli articoli e salva in una colleizone
        return view('articles.index', compact('articles') //in compact passare la chiave
        // ['articles' => $articles]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        // SALVO IN VARIABILI I DATI INSERITI DALL'UTENTE 
        $_title = $request->input('title');
        $_subtitle = $request->input('subtitle');
        $_description = $request->input('description');
        
        // VALIDAZIONE 
        // QUUESTO PROVEDIMENTO E' UTILE PER LE IMMAGINI MA PER IL RESTO DEI DATI DOBBIAMO INTERVENIRE SU REQUEST DI LARAVEL CASTOMIZZANDOLO 
        //(php artisan make:request ProductRequest)
            // se l'utente non passa nulla diamo un valore di defaul a $img
            $_img = null;

            // se assegna a $img un valore l'utente  allo $img viene popolato
            if ($request->file('img')){
                $_img = $request
                    ->file('img') //cattura upload 
                    ->store('img', 'public'); // salva il file nel percorso 'storage/app/public/img'
            }
            

        // MASS ASSIGNMENT
        // aasegniamo i valori del form alle chevi del metod
        Article::create([
                'title' => $_title,
                'subtitle' => $_subtitle,
                'description' => $_description,
                'img' => $_img
        ]);

        return redirect()->back()->with('message', 'articolo inserito con successo');

    }


    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}

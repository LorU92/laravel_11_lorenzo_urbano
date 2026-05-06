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
        return view('article.index', compact('articles') //in compact passare la chiave
        // ['articles' => $articles]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
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
        
    
        // METODO 2 MASS ASSIGNMENT + CONTROLLO SE L'UTENTE HA PASSATO L'IMMAGINE O NO
                // creo l'articolo indipendentemente se l'utente ha passato l'immagine oppure no poi..
                //MASS ASSIGNMENT
                $article = Article::create([
                    'title' => $_title,
                    'subtitle' => $_subtitle,
                    'description' => $_description,
                    // 'img' => $_img
                    ]);
                // fino a qui l'immagine dell'articolo è quella di default inserita nel model

                // .. mi chiedo poi l'utente mi ha passato l'immagine?
                // se si - mi cicla l'if 
                    if($request->file('img')){
                        // devo sovrascrivere l'immagine di default con quella passata dall'utente
                        // salviamo in una variabile che risulta essere quella di default
                        $article->img = $request->file('img')->store('img', 'public');
                        // salvami l'immagine nel database
                        // in questo modo sovrascrivo il defeault inserito nel metod
                        $article->save();
                    }

        // ritorna alla pagina di create con un messaggio di successo
        return redirect()->back()->with('message', 'articolo inserito con successo');

    }


    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        // modifica l'articolo assegnando ai fillable del metodo i nuovi dati attraverso update() che accetta un array (come create())
        // Aggiorna i dati del request in store(request)
        $article->update([
            'title' => $request->input('title'),
            'subtitle' => $request->input('subtitle'),
            'description' => $request->input('description')

        ]);
            
            // VALIDAZIONE 
                // se assegna a $img un valore l'utente allo $img viene popolato
                if ($request->file('img')){
                    $_img = $request
                        ->file('img') //cattura upload 
                        ->store('img', 'public'); // salva il file nel percorso 'storage/app/public/img'
                }else{
                    $_img = $article->img;
                }
            
            // ritorna alla pagina di index con un messaggio di successo
            return redirect(route('article.index'))->with('message', 'articolo modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect(route('article.index'))->with('message', 'articolo eliminato con successo');
    }
}

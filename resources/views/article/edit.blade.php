<x-layout>
    
    <header>
        <div class="container h-100">
            <div class="row justify-content-center align-content-center h-100">
                <div class="col-12 col-md-6">
                    <h1 class="text-center">Modifica articolo</h1>
                </div>
            </div>
        </div>
    </header>
    

    <!-- codice per mostrare errori di validazioni -->

    <x-display-errors></x-display-errors>

<!-- Create Post Form -->

    <div class="container">
        <div class="row mt-5 justify-content-center mb-5">
            <div class="col-12 col-md-6 justify-content-center">
                <form 
                class="rounded-4 shadow bg-secondary-subtle p-3"
                 {{--rotta parametrica aupdate che si porta anche tutto l'articolo e quindi compact('article')  --}}
                action="{{route('article.update', compact('article'))}}" 
                method="POST"
                {{-- cattura i dati complessi non più come stringa o numero ma come file in modo da poter inserire anche immagini o video --}}
                enctype="multipart/form-data">
                    
                    @method('PUT')
                    {{-- spoofing - da inserire all'interno del form --}}
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo articolo</label>
                        <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title" value="{{$article->title}}">
                    </div>
                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Sottotitolo</label>
                        <input type="text" class="form-control" id="subtitle" aria-describedby="emailHelp" name="subtitle" value="{{$article->subtitle}}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione Articolo</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{$article->description}}</textarea>
                    </div>
                    {{-- inseriamo immagine attuale per un anteprima. --}}
                    <div class="mb-3">
                        <span class="form-label">Immagine attuale</span>
                        <img src="{{ $article->img == 'img/default.jpg' ? asset($article->img) : Storage::url($article->img) }}" alt="nome" width="600" class="img-fluid mx-auto d-block mt-2">
                    </div>
                    <div class="mb-3">
                        <label for="img" class="form-label">Inserisci immagine</label>
                        <input type="file" class="form-control" id="img" aria-describedby="emailHelp" name="img">
                    </div>
                    <button type="submit" class="btn btn-primary">Modifica Articolo</button>
                </form>
            </div>
        </div>
    </div>
    
</div>
</x-layout>


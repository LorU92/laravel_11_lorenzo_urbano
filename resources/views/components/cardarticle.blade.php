            <div class="col-12 col-md-3 mt-5 d-flex justify-content-center">
            <div class="card" style="width: 20rem;">
                {{-- Storage::url - ricostruisce la sorgente e invece di cercare in storage.. cerca direttamente in public visibile dall'esterno --}}
                <img src="{{Storage::url($article->img)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$article->title}}</h5>
                    <p class="card-subtitlet">{{$article->subtitle}}</p>
                    <p class="card-text">{{\Illuminate\Support\Str::limit($article->description), 400}}</p> 
                    {{-- dettaglio articolo  --}}
                    {{-- con compact indico tutto l'articolo ma si prendereà solo id --}}
                    <a href="{{route('article.show', compact('article'))}}" class="btn btn-primary">Leggi tutto</a>
                </div>
            </div>          
            </div>
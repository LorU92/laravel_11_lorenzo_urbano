            <div class="col-12 col-md-3 mt-5 d-flex justify-content-center">
            <div class="card" style="width: 20rem;">
                
                <img src="{{ $article->img == 'img/default.jpg' ? asset($article->img) : Storage::url($article->img) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$article->title}}</h5>
                    <p class="card-subtitlet">{{$article->subtitle}}</p>
                    <p class="card-text">{{\Illuminate\Support\Str::limit($article->description, 400)}}</p> 
                    {{-- dettaglio articolo  --}}
                    {{-- con compact indico tutto l'articolo ma si prendereà solo id --}}
                    <div class="d-flex justify-content-center gap-2">
                        <a href="{{route('article.show', compact('article'))}}" class="btn btn-primary p-1">Leggi tutto</a>
                        {{-- edit --}}
                        <a href="{{route('article.edit', compact('article'))}}" class="btn btn-secondary p-1">Modifica</a>
                        {{-- delete --}}
                        <form 
                        action="{{route('article.destroy', compact('article'))}}" 
                        method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-secondary p-1">Elimina</button>
                        </form>
                    </div>
                </div>
            </div>          
            </div>
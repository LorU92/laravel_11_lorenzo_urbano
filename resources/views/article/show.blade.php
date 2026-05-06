<x-layout>
    <header>
        <div class="container h-100">
            <div class="row justify-content-center align-content-center h-100">
                <div class="col-12 col-md-6">
                    <h1 class="titlearticolo text-center">{{$article->title}}</h1>
                    <h1 class="sottotitlearticolo text-center">{{$article->subtitle}}</h1>
                </div>
            </div>
        </div>
    </header>
    
    <section class="container">
         <div class="row">
                <div class="linea mt-5"></div>
                <div class="col-12 col-md-4 articolotitle-custom">
                    <div class="card-custom-img my-5">
                        <img src="{{ $article->img == 'img/default.jpg' ? asset($article->img) : Storage::url($article->img) }}" class="card-img-top rounded-4" alt="...">
                    </div>
                </div>
                <div class="col-12 col-md-6 articolotext-custom my-5">
                    {{$article->description}}
                </div>
            <div class="linea"></div>
         </div>  


</x-layout>
<x-layout>
    <header>
        <div class="container h-100">
            <div class="row justify-content-center align-content-center h-100">
                <div class="col-12 col-md-6">
                    <h1 class="text-center">ARTICOLI</h1>
                </div>
            </div>
        </div>
    </header>
    
    <div class="container">
        <div class="row mt-5">
            @foreach($articles as $article)
            <x-cardarticle
                {{-- utilizzo questa sintassi per passare al componente tutto il riferimento dell'oggetto product senza separare le varie informazioni in singole proprietà  --}}
                :article="$article">
            </x-cardarticle>

            @endforeach
    </div>
</div>


</x-layout>
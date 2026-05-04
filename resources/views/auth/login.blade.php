<x-layout>
    
    <header>
        <div class="container h-100">
            <div class="row justify-content-center align-content-center h-100">
                <div class="col-12 col-md-6">
                    <h1 class="text-center">LOGIN</h1>
                </div>
            </div>
        </div>
    </header>

    <x-display-errors></x-display-errors>
    
    <div class="container">
        <div class="row justify-content-center align-content-center mt-5">
            <div class="col-12 col-md-6">
                <form
                class="p-4 shadow rounded-4 bg-body-secondary"
                action="{{route('login')}}"
                method="POST">
                @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp"  name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
 
                    <button type="submit" class="btn btn-primary">Accedi</button>
                </form>
            </div>
        </div>
    </div>
    
</div>
</x-layout>
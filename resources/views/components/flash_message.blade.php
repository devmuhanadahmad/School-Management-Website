@if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        <p class="text-success">{{ session('success') }}</p>
    </div>
@endif
@if (session()->has('errore'))
    <div class="alert alert-danger" role="alert">
        <p class="text-danger">{{ session('errore') }}</p>
    </div>
@endif

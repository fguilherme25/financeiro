@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Fechar"></button>
    </div>  
@endif

@if (session('error'))
    <div class="alert alert-danger" role="alert">
        <div>
            {{ session('error') }}
        </div>
    </div>
@endif

@if ($errors->has('code'))

    <div class="alert alert-danger" role="alert">
        @foreach ($errors->get('code') as $error)
            <div>
                {{ $error }}
            </div>
        @endforeach
    </div>
@endif

@if ($errors->has('name'))
    <div class="alert alert-danger" role="alert">
        @foreach ($errors->get('name') as $error)
            <div>
                {{ $error }}
            </div>
        @endforeach
    </div>
@endif
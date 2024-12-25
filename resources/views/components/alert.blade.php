@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

@if (session('error'))
    <p>{{ session('error') }}</p>
@endif

@if ($errors->has('code'))
    <span>
        @foreach ($errors->get('code') as $error)
            {{ $error }} <br><br>
        @endforeach
    </span>
@endif

@if ($errors->has('name'))
    <span>
        @foreach ($errors->get('name') as $error)
            {{ $error }} <br><br>
        @endforeach
    </span>
@endif
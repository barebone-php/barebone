@extends('layouts.default')
@section('content')

    <h2>Login</h2>

    <form action="/login" method="post">

        @if ( $error )
            <p class="error">{{ $error }}</p>
        @endif

        <p class="input-group"><input class="input" placeholder="e-mail" type="email" name="email" required></p>
        <p class="input-group"><input class="input" placeholder="password" type="password" name="password" required></p>

        <button type="submit">Authenticate</button>

    </form>

    <a href="/signup">Need an account?</a>

@endsection
@extends('layouts.default')
@section('content')

    <h2>Signup</h2>

    <form action="/signup" method="post">

        @if ( $error )
            <p class="error">{{ $error }}</p>
        @endif

        <p class="input-group"><input class="input" placeholder="your name" type="text" name="name" required></p>
        <p class="input-group"><input class="input" placeholder="e-mail" type="email" name="email" required></p>
        <p class="input-group"><input class="input" placeholder="password" type="password" name="password" required></p>

        <button type="submit">Create Account</button>
    </form>

    <a href="/login">Already registered? Login here.</a>


@endsection
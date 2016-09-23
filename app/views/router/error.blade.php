@extends('layouts.default')
@section('content')

    <h1>System Error</h1>
    <p>Something went wrong. Please use the following info to identify the problem.</p>
    <pre><code>{{ $error }}: {{ $subject }}</code></pre>

@endsection
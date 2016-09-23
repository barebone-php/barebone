@extends('layouts.default')
@section('content')

    <h1>Route not found</h1>
    <p>The requested URL does not exist.</p>
    <pre><code>{{ $subject }}</code></pre>

@endsection
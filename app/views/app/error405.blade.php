@extends('layouts.default')
@section('content')

    <h1>405 Method not allowed</h1>
    <p>The requested URL does not support the HTTP Request Method.</p>
    <pre><code>Allowed are: {{ join(', ', $allowed) }}</code></pre>

@endsection
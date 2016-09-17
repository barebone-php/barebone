@extends('layouts.default')
@section('content')

    <h1>File not found</h1>
    <p>The requested URL does not exist.</p>
    <pre><code>{{ $url }}</code></pre>

@endsection
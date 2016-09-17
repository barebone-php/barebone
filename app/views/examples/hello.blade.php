<!--
View File for "Example.php" Controller.
You can delete or rename it and start your own naming scheme
-->
@extends('layouts.default')
@section('content')

    <h1>Hello {{ $name }}!</h1>
    <p>The parameter route worked. Edit this 'hello' template in <code>app/views/site/</code></p>

@endsection
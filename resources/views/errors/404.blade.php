@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>404</h1>
    <h2>{{ $exception->getMessage() }}</h2>
</div>

@endsection


@extends('start')

@section('title', 'Show Service')

@section('content')
    <div class="w-50 row g-3">
        <h3>{{ $service->name }}</h3>
    </div>
@endsection

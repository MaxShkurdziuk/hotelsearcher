@extends('start')

@section('title', 'Show review')

@section('content')
    <div class="w-100 row g-3">
        <h3>{{ $review->name }} (Rating: {{ $review->rating }})</h3>
        <p>{!! nl2br(strip_tags($review->description)) !!}</p>
    </div>
@endsection

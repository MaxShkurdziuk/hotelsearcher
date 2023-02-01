@extends('start')

@section('title', 'Show hotel')

@section('content')
    <div class="w-100 row g-3">
        <h3>{{ $hotel->name }} {{ $hotel->stars }}* ({{ $hotel->open_year }})</h3>
        <h4>{{ $hotel->country }} ({{ $hotel->city }})</h4>
        <p class="mb-1">Услуги отеля:
            @foreach($hotel->services as $service)
                <span>{{ $service->name }}</span>
            @endforeach
        </p>
        <p>{!! nl2br(strip_tags($hotel->description)) !!}</p>
    </div>
    <div class="w-100 row g-3 mt-3 mb-2">
        <h4>Write a review about this hotel</h4>
        @yield('review')
    </div>
    <div class="w-100 row g-3 p-2">
        <h5>Reviews</h5>
        @foreach($reviews as $review)
            <h6> {{ $review->user->name }} (Rating: {{ $review->rating }})</h6>
            <p class="m-0">{!! nl2br(strip_tags($review->description)) !!}</p>
        @endforeach
    </div>
@endsection

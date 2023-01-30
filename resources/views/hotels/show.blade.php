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
    </div>
    @yield('review')
@endsection

@extends('start')

@section('title', 'Main')

@section('content')

    <div class="row mt-4">
        <div class="col-md-8">
            @if($hotels->isEmpty())
                <h2>Hotels not found</h2>
            @endif
            @foreach($hotels as $hotel)
                <article class="mb-3">
                    <h2 class="mb-1">{{ $hotel->name }} {{ $hotel->stars }}*</h2>
                    <p class="mb-1">
                        @foreach($hotel->services as $service)
                            <span>{{ $service->name }}</span>
                        @endforeach
                    </p>
                    <a href="{{ route('hotels.show', ['hotel' => $hotel->id]) }}" class="btn btn-info">Info</a>
                </article>
            @endforeach
            <div class="d-flex justify-content-start">
                {!! $hotels->links() !!}
            </div>
        </div>
        <div class="col-md-4">
            <ul class="list-unstyled d-flex justify-content-start">
                <form action="{{ route('main') }}">
                    <div class="input-group">
                        <input class="form-control mb-2" type="text" placeholder="Title" name="name"
                               value="{{ request()->get('name') }}">
                    </div>
                    <div class="input-group">
                        <input class="form-control mb-2" type="text" placeholder="Country" name="country"
                               value="{{ request()->get('country') }}">
                    </div>
                    <label for="services">{{ __('validation.attributes.services') }}</label>

                    @foreach($services as $service)
                        <div class="form-check">
                            <input type="checkbox"
                                   name="services[]"
                                   value="{{ $service->id }}"
                                   @if(in_array($service->id, request()->get('services', [])))
                                   checked
                                @endif
                            > {{ $service->name }}
                        </div>
                    @endforeach

                    <button class="btn btn-primary btn-success">Search</button>
                </form>
            </ul>
        </div>
    </div>
@endsection

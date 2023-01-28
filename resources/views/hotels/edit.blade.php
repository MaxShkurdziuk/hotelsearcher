@extends('start')

@section('title', 'Edit Hotel')

@section('content')
    <div>
        <form action="{{ route('hotels.edit', ['hotel' => $hotel->id]) }}" method="post">
            @csrf
            <div class="w-50 row g-3">
                <div class="col-sm-6">
                    <label for="name">{{ __('validation.attributes.name') }}</label>
                    <input value="{{ old('name', $hotel->name) }}" type="text" name="name"
                           class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-sm-6">
                    <label for="open_year">{{ __('validation.attributes.open_year') }}</label>
                    <input value="{{ old('open_year', $hotel->open_year) }}" type="text" name="open_year"
                           class="form-control @error('open_year') is-invalid @enderror">
                    @error('open_year')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-sm-6">
                    <label for="stars">{{ __('validation.attributes.stars') }}</label>
                    <input value="{{ old('stars', $hotel->stars) }}" type="text" name="stars"
                           class="form-control @error('stars') is-invalid @enderror">
                    @error('stars')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-sm-6">
                    <label for="country">{{ __('validation.attributes.country') }}</label>
                    <input value="{{ old('country', $hotel->country) }}" type="text" name="country"
                           class="form-control @error('country') is-invalid @enderror">
                    @error('country')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-sm-6">
                    <label for="city">{{ __('validation.attributes.city') }}</label>
                    <input value="{{ old('city', $hotel->city) }}" type="text" name="city"
                           class="form-control @error('city') is-invalid @enderror">
                    @error('city')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">{{ __('validation.attributes.services') }}</label>
                    @error('services')
                    <div>{{ $message }}</div>
                    @enderror
                    @foreach($services as $service)
                        <div class="form-check">
                            <input type="checkbox" name="services[]" value="{{ $service->id }}" class="form-check-input"
                                   @if($hotel->services->contains('id', $service->id)) checked @endif
                            > {{ $service->name }}
                        </div>
                    @endforeach
                </div>

                <div class="mb-3">
                    <label for="description">{{__('validation.attributes.description') }}</label>
                    <textarea name="description" rows="3"
                              class="form-control @error('description') is-invalid @enderror">{{ old('description', $hotel->description) }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button class="w-100 btn btn-primary btn-lg btn-success" type="submit">Edit hotel information</button>
            </div>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger w-50 mt-2">Error was found!</div>
        @endif
    </div>
@endsection

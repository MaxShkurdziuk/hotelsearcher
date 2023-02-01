@extends('hotels.show')

@section('review')
    <div>
        <form action="{{ route('reviews.add') }}" method="post">
            @csrf
            <div class="w-50 row g-3">
                <input type="hidden" name="hotel" value="{{ $hotel->id }}"/>

                <div class="col-sm-2">
                    <label for="rating">{{ __('validation.attributes.rating') }}</label>
                    <input value="{{ old('rating') }}" type="text" name="rating"
                           class="form-control @error('rating') is-invalid @enderror">
                    @error('rating')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description">{{ __('validation.attributes.text') }}</label>
                    <textarea name="description" rows="3" placeholder="Write your opinion about the hotel..."
                              class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button class="w-100 btn btn-primary btn-lg btn-success" type="submit">Send your opinion</button>
            </div>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger w-50 mt-2">Error was found!</div>
        @endif
    </div>
@endsection

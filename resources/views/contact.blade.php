@extends('start')

@section('title', 'Contact us')

@section('content')
    <div>
        <form action="{{ route('contact_store') }}" method="post">
            @csrf
            <div class="w-50 row g-3">
                <div class="col-sm-6">
                    <label for="name">{{ __('validation.attributes.name') }}</label>
                    <input value="{{ old('name') }}" type="text" name="name"
                           class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-sm-6">
                    <label for="phone">{{ __('validation.attributes.phone') }}</label>
                    <input value="{{ old('phone') }}" type="text" name="phone"
                           class="form-control @error('phone') is-invalid @enderror">
                    @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 mb-2">
                    <label for="email">{{ __('validation.attributes.email') }}</label>
                    <input value="{{ old('email') }}" type="email" name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           placeholder="you@example.com">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="text">{{__('validation.attributes.text') }}</label>
                    <textarea name="text" rows="3"
                              class="form-control @error('text') is-invalid @enderror">{{ old('text') }}</textarea>
                    @error('text')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button class="w-100 btn btn-primary btn-lg btn-success" type="submit">Send a message</button>
            </div>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger w-50 mt-2">Error was found!</div>
        @endif
    </div>
@endsection

@extends('start')

@section('title', 'Sign Up')

@section('content')
    <div>
        @if ($errors->any())
            <div class="alert alert-danger w-50 mt-2">Error was found!</div>
        @endif
        <form action="{{ route('sign-up') }}" method="post">
            @csrf
            <div class="w-50 row g-3">
                <div class="col-12 mb-2">
                    <label for="name">{{ __('validation.attributes.name') }}</label>
                    <input value="{{ old('name') }}" type="text" name="name"
                           class="form-control @error('name') is-invalid @enderror">
                    @error('name')
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

                <div class="col-12 mb-2">
                    <label for="password">{{ __('validation.attributes.password') }}</label>
                    <input value="{{ old('password') }}" type="password" name="password"
                           class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 mb-2">
                    <label for="password_confirmation">{{ __('validation.attributes.password_confirmation') }}</label>
                    <input value="{{ old('password_confirmation') }}" type="password" name="password_confirmation"
                           class="form-control @error('password_confirmation') is-invalid @enderror">
                    @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="checkbox col-12 mb-2">
                    <input type="checkbox" name="rules_accept"
                           class="@error('rules_accept') is-invalid @enderror">I accept the rules of
                    HotelSearcher</input>
                    @error('rules_accept')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button class="w-100 btn btn-primary btn-lg btn-success">Sign Up</button>
            </div>
        </form>
    </div>
@endsection

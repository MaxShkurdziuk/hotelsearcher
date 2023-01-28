@extends('start')

@section('title', 'Edit Service')

@section('content')
    <div>
        <form action="{{ route('services.edit', ['service' => $service->id]) }}" method="post">
            @csrf
            <div class="w-50 row g-3">
                <div class="col-sm-6">
                    <label for="name">{{ __('validation.attributes.name') }}</label>
                    <input value="{{ old('name', $service->name) }}" type="text" name="name"
                           class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-50 row g-3">
                    <button class="btn btn-primary btn-lg" type="submit">Edit a hotel service</button>
                </div>
            </div>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger w-50 mt-2">Error was found!</div>
        @endif
    </div>
@endsection


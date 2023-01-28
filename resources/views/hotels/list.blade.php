@extends('start')

@section('title', 'Hotels List')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Country (City)</th>
            <th scope="col">Open year</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($hotels as $hotel)
            <tr>
                <th scope="row">{{ $hotel->id }}</th>
                <td>{{ $hotel->name }} {{ $hotel->stars }}*</td>
                <td>{{ $hotel->country }} ({{ $hotel->city }})</td>
                <td>{{ $hotel->open_year }}</td>
                <td>
                    <a href="{{ route('hotels.show', ['hotel' => $hotel->id]) }}" class="btn btn-info">Info</a>

                    @can('edit', $hotel)
                        <a href="{{ route('hotels.edit.hotel', ['hotel' => $hotel->id]) }}"
                           class="btn btn-warning">Edit</a>
                    @endcan

                    @can('delete', $hotel)
                        <form action="{{ route('hotels.delete', ['hotel' => $hotel->id]) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">
                                Delete
                            </button>
                        </form>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $hotels->links() !!}
@endsection

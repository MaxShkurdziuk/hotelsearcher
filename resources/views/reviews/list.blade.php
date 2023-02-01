@extends('start')

@section('title', 'Hotel reviews')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Hotel</th>
            <th scope="col">Rating</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($reviews as $review)
            <tr>
                <td>{{ $review->user->name }}</td>
                <td>{{ $review->hotel->name }} {{ $review->hotel->stars }}*</td>
                <td>{{ $review->rating }}</td>
                <td><a href="{{ route('reviews.show', ['review' => $review->id]) }}" class="btn btn-info">More</a>
                    @can('delete', $review)
                        <form action="{{ route('reviews.delete', ['review' => $review->id]) }}" method="post">
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
    {!! $reviews->links() !!}
@endsection

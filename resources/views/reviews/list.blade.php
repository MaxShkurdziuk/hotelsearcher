@extends('start')

@section('title', 'Hotel reviews')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Rating</th>
            <th scope="col">Description</th>
        </tr>
        </thead>
        <tbody>
        @foreach($reviews as $review)
            <tr>
                <td>{{ $review->name }}</td>
                <td>{{ $review->rating }}</td>
                <td><a href="{{ route('reviews.show', ['review' => $review->id]) }}" class="btn btn-info">Info</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $reviews->links() !!}
@endsection

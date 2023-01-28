@extends('start')

@section('title', 'Services List')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($services as $service)
            <tr>
                <th scope="row">{{ $service->id }}</th>
                <td>{{ $service->name }}</td>
                <td>
                    @can('edit', $service)
                        <a href="{{ route('services.edit.service', ['service' => $service->id]) }}"
                           class="btn btn-warning">Edit</a>
                    @endcan

                    @can('delete', $service)
                        <form action="{{ route('services.delete', ['service' => $service->id]) }}" method="post">
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
    {!! $services->links() !!}
@endsection

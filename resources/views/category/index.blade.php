@extends('layouts.header')

@section('content')


<button class="btn btn-success" onClick="window.location.href='{{ route('category.create') }}'">Create</button>
<div class="mt-5">

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                {{-- <th>Image</th> --}}
                <th>Status</th>
                <th>Created Date</th>
                {{-- <th>Actions</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    {{-- <td>
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="img-thumbnail" width="100">
                        @endif
                    </td> --}}
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->created_at->format('Y-m-d') }}</td>
                    {{-- <td> --}}
                        <!-- Add action buttons here -->
                        {{-- <a href="{{ route('edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a> --}}
                        {{-- <a href="{{ route('delete', $item->id) }}" class="btn btn-danger btn-sm">Delete</a> --}}
                    {{-- </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection

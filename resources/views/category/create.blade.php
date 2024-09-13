@extends('layouts.header')

@section('content')

{{-- @php dd($categories); @endphp --}}
<button class="btn btn-dark" onClick="window.location.href='{{ route('category') }}'">Back</button>
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h2 class="text-center">Create Category</h2>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select class="form-select @error('category') is-invalid @enderror" name="category">
                            {{-- <option selected>Select Category</option> --}}
                            @foreach($categories as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status">
                            {{-- <option selected>Select St</option> --}}
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Sub Category Name</label>
                        <input type="text" class="form-control" id="subcategory" name="subcategory" placeholder="Enter title">
                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@extends('../welcome')
@section('body')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <a href="{{ route('products.index') }}" class="btn btn-primary">
                Back to products listing
            </a>
            <div class="card">
                <div class="card-header">
                    Edit Products {{ $product->name }}
                </div>
                <div class="card-body">
                    <form action="{{ route('products.update', $product->id) }}" method="POST">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" value="{{ old('name') ?? $product->name }}" id="name" name="name"
                                class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" value="{{ old('description') ?? $product->description }}"
                                id="description" name="description"
                                class="form-control @error('description') is-invalid @enderror">
                            @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
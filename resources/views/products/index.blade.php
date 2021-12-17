@extends('../welcome')
@section('body')
<div class="container mt-5">
    @if(session()->has('message'))
    <div class="mb-3 alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif

    <a href="{{ route('products.create') }}" class="btn btn-primary">
        Create new Products
    </a>
    <div class="row my-3">
        <div class="col">
            <div class="card">
                <div class="card-header">Daftar Product</div>
                <div class="card-body">
                    <ul>
                        @foreach ($products as $product)
                        <li class="">
                            {{ $product->name }}
                            <p>{{ $product->description }}</p>
                            <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                <a href="{{ route('products.edit', $product->id) }}"
                                    class="btn btn-sm btn-success mb-1">Edit Data</a>
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger mb-1"
                                    onclick="return confirm('Are you sure want to delete this data ? ')">Delete
                                    Data</button>
                            </form>
                            <hr>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
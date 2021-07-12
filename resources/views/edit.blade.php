@extends('layouts.welcome')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger mb-2">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif

    <div class="card uper">
        <div class="card-header">
            Edit Product
        </div>
        
        <form action="/update_prod/{{ $prod['id'] }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <div class="form-row mb-1">
                    <div class="col-4">
                        <label for="name">Product Name:</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Product Name" value="{{ $prod['name'] }}" />
                    </div>
                    <div class="col-4">
                        <label for="stock">Stock:</label>
                        <input type="number" class="form-control" min="1.00" step="0.01" id="stock" name="stock" value="{{ $prod['stock'] }}" placeholder="Stock" />
                    </div>
                    <div class="col-4">
                        <label for="price">Price:</label>
                        <input type="number" class="form-control" min="1.00" step="0.01" id="price" name="price" value="{{ $prod['price'] }}" placeholder="Price" />
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <a href="{{ route('index') }}" class="btn btn-light">
                    <i class="fas fa-times"></i> Close
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update
                </button>
            </div>
        </form>
    </div>
@endsection
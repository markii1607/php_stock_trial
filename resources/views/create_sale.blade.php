@extends('layouts.welcome')

@section('content')
<div class="card uper">
    <div class="card-header">
        Add Product Sale
    </div>
    
    <form action="{{ route('sales.store') }}" method="POST">
        @csrf
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            @foreach ($products as $key => $prod)
                <div class="form-row mb-1">
                    <input type="hidden" class="form-control" name="product_id[{{ $key }}]" value="{{ $prod['id'] }}" />
                    <input type="hidden" class="form-control" name="product_price[{{ $key }}]" value="{{ $prod['price'] }}" />
                    <div class="col-9">
                        <input type="text" class="form-control" name="product_name[{{ $key }}]" placeholder="Product Name" value="{{ $prod['name'] }}" readonly />
                    </div>
                    <div class="col-3">
                        <input type="number" class="form-control" min="1" step="0.01" name="product_qty[{{ $key }}]" max="{{ $prod['stock'] }}" placeholder="Quantity" />
                    </div>
                </div>
            @endforeach
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('index') }}" class="btn btn-light">
                <i class="fas fa-times"></i> Close
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Save
            </button>
        </div>
    </form>
</div>
@endsection
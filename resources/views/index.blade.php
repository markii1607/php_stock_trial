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

    <h3>Products List</h3>
    <form action="{{ route('sales.add') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success mb-2">
            <i class="fas fa-plus"></i> ADD SALE
        </button>
        <table class="table table-condensed table-bordered table-striped table-hover mb-5">
            <thead>
                <tr>
                    <th></th>
                    <th>Products</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($products) > 0)
                    @foreach ($products as $key => $prod)
                    <tr>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $prod }}" name="products[]" id="flexCheckDefault">
                            </div>
                        </td>
                        <td>{{ $prod->name }}</td>
                        <td>{{ number_format($prod->stock, 2) }}</td>
                        <td>{{ number_format($prod->price, 2) }}</td>
                        <td>
                            <a href="/edit_prod/{{ $prod['id'] }}" class="btn btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="2" class="text-center">No products found!</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </form>

    <h3>Sales Conducted</h3>
    <table class="table table-condensed table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>Date</th>
                <th>Total Sales</th>
            </tr>
        </thead>
        <tbody>
            @if (count($sales) > 0)
                @foreach ($sales as $key1 => $sale)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($sale->created_at)->format('F j, Y h:i:s A') }}</td>
                    <td>{{ number_format($sale->total_sales, 2) }}</td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="2" class="text-center">No sales found!</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
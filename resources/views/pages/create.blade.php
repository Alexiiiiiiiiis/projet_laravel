@extends('layouts.master')

@section('title', 'Create')

@section('contenu')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/saveproduct') }}" method="POST" class="form-horizontal">
        @csrf
        <div class="form-group">
            <label>Product</label>
            <input type="text" name="product_name" placeholder="Product Name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Product Price</label>
            <input type="text" name="product_price" placeholder="Product Price" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Product description</label>
            <textarea name="product_description" cols="30" rows="10" class="form-control" required></textarea>
        </div>
        <input type="submit" value="Add Product" class="btn btn-primary">
    </form>
@endsection

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
        <div class="form-group {{ $errors->has('product_name') ? 'has-error' : '' }}">
            <label class="control-label">Product</label>
            <input type="text" name="product_name" value="{{ old('product_name') }}" placeholder="Product Name" class="form-control" required>
            @error('product_name')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group {{ $errors->has('product_price') ? 'has-error' : '' }}">
            <label class="control-label">Product Price</label>
            <input type="number" name="product_price" value="{{ old('product_price') }}" min="0" step="1" placeholder="Product Price" class="form-control" required>
            @error('product_price')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group {{ $errors->has('product_description') ? 'has-error' : '' }}">
            <label class="control-label">Product description</label>
            <textarea name="product_description" cols="30" rows="10" class="form-control" required>{{ old('product_description') }}</textarea>
            @error('product_description')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>
        <input type="submit" value="Add Product" class="btn btn-primary">
    </form>
@endsection

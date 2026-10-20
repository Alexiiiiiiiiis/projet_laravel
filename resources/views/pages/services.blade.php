@extends('layouts.master')

@section('title', 'Services')

@section('contenu')
    <h1>Bienvenue sur la page Services</h1>

    @if (Session::has('status'))
        <div class="alert alert-success">
            {{ Session::get('status') }}
        </div>
    @endif

    @foreach ($produits as $produit)
        <div class="well">
            <h1><a href="/show/{{ $produit->id }}">{{ $produit->product_name }}</a></h1>
        </div>
    @endforeach
    {{ $produits->links() }}
@endsection

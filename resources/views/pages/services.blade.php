@extends('layouts.master')

@section('title', 'Services')

@section('contenu')
    <h1>Bienvenue sur la page Services</h1>
    @foreach ($produits as $produit)
        <div class="well">
            <h1><a href="/show/{{ $produit->id }}">{{ $produit->product_name }}</a></h1>
        </div>
    @endforeach
    {{-- {{ $produits->links() }} --}}
@endsection

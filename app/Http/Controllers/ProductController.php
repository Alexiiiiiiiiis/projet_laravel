<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::all());
    }

    public function create()
    {
        return view('pages.create');
    }

    public function saveproduct(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'product_price' => 'required',
            'product_description' => 'required',
        ]);

        $product = new Product();
        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->product_description = $request->input('product_description');

        $product->save();

        // Début : Query Builder
        // Déclarer une variable qui va contenir toutes
        // les valeurs des input du formulaire

        // $data = array();
        // $data['product_name'] = $request->input('product_name');
        // $data['product_price'] = $request->input('product_price');
        // $data['product_description'] = $request->input('product_description');

        // DB::table('products')->insert($data);

        return redirect('/services')->with('status', 'Le produit ' .
            $request->input('product_name') . ' a été inséré avec succès !!!');
    }
}

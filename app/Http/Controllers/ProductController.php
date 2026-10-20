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

    // Règles de validation communes à l'ajout et à la mise à jour
    private function validerProduit(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'product_price' => 'required|integer|min:0',
            'product_description' => 'required',
        ], [
            'product_name.required' => 'Le nom du produit est obligatoire.',
            'product_price.required' => 'Le prix est obligatoire.',
            'product_price.integer' => 'Le prix doit être un nombre entier.',
            'product_price.min' => 'Le prix ne peut pas être négatif.',
            'product_description.required' => 'La description est obligatoire.',
        ]);
    }

    public function saveproduct(Request $request)
    {
        $this->validerProduit($request);

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

    public function deleteproduct($id)
    {
        // Laravel Eloquent
        // $product = Product::find($id);
        // $product->delete();

        // Laravel Query Builder
        DB::table('products')->where('id', $id)->delete();

        return redirect('/services')->with('status',
            'Votre produit a été supprimé avec succès !!!');
    }

    public function editproduct($id)
    {
        // Eloquent
        $product = Product::find($id);

        // print("<h1>" . $product . "</h1>");

        return view('pages.editproduct')->with('product', $product);
    }

    public function updateproduct(Request $request, $id)
    {
        $this->validerProduit($request);

        // Eloquent
        // $product = Product::find($id);

        // $product->product_name = $request->input('product_name');
        // $product->product_price = $request->input('product_price');
        // $product->product_description = $request->input('product_description');

        // $product->update();

        // Query Builder
        $data = array();
        $data['product_name'] = $request->input('product_name');
        $data['product_price'] = $request->input('product_price');
        $data['product_description'] = $request->input('product_description');

        DB::table('products')->where('id', $id)->update($data);

        return redirect('/services')->with('status',
            'Votre produit a été mis à jour avec succès !!!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Insert
    public function store()
    {
        Product::create([
            'name' => 'Laptop',
            'price' => 50000,
            'quantity' => 5
        ]);

        return "Product Added";
    }

    // Display
    public function index()
    {
        return Product::all();
    }

    // Update
    public function updateProduct($id)
    {
        $product = Product::find($id);

        $product->update([
            'price' => 55000
        ]);

        return "Product Updated";
    }

    // Delete
    public function destroy($id)
    {
        Product::find($id)->delete();

        return "Product Deleted";
    }
}
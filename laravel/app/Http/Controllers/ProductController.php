<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // --- Get /api/products
    public function getProducts() {
        return Product::all();
    }

    // --- Post /api/categories
    public function createProduct() {
        $product = Product::create([
            'category_id' => 1,
            'name' => "New Product",
            'pricing' => 500
        ]);
        $product->save();
        return $product;
    }

    // --- Get /api/products/{products}
    public function getProduct($productId) {
        return Product::find($productId);
    }

    // --- Patch /api/products/{productId}
    public function updateProduct($productId) {
        $product = Product::find($productId);
        $product->name = "Heng Heng";
        $product->save();
        return $product;
    }

    public function deleteProduct($productId) {
        $product = Product::find($productId);
        $product->delete();
        return $product;    
    }

}

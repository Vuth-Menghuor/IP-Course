<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Psy\TabCompletion\Matcher\FunctionDefaultParametersMatcher;

class CategoryController extends Controller
{
    // --- Get /api/categories
    public function getCategories() {
        return Category::all();
    }    

    // --- Post /api/categories
    public function createCategory(Request $request) {
        $category = Category::create(['name' => $request->name]);
        // $category->name = $request->name;
        return $category;
    }

    // --- Get /api/categories/{categoryId}
    public function getCategory($categoryId) {
        return Category::find($categoryId);
    }

    // --- Patch /api/categories/{categoryId}
    public function updateCategory(Request $request, $categoryId) {
        $category = Category::find($categoryId);
        $category->name = $request->name;
        $category->save();
        return $category;
    }

    public function deleteCategory($categoryId) {
        $category = Category::find($categoryId);
        $category->delete();
        return $category;    
    }

}


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
    public function createCategory() {
        $category = Category::create([
            'name' => "New Category",
        ]);
        $category->save();
        return $category;
    }

    // --- Get /api/categories/{categoryId}
    public function getCategory($categoryId) {
        return Category::find($categoryId);
    }

    // --- Patch /api/categories/{categoryId}
    public function updateCategory($categoryId) {
        $category = Category::find($categoryId);
        $category->name = "Goku";
        $category->save();
        return $category;
    }

    public function deleteCategory($categoryId) {
        $category = Category::find($categoryId);
        $category->delete();
        return $category;    
    }

}


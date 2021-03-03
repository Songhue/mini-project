<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use Illuminate\Http\Request;
use Validator;

class CategoryController extends Controller
{
    function createCategory(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|max:20',

        ]);
        $category = Category::create($validator);
        if($category != null)
        {
            return response()->json([
                'status' => true,
                'category' => $category
            ]);
        }else
        {
            return response()->json([
                'status' => false,
                'category' => null
            ]);

        }
    }
    
    function getAllCategories()
    {
        $categories = Category::all();
        if($categories != null)
        {
            return response()->json([
                'status' => true,
                'categories' => $categories
            ]);
        }else
        {
            return response()->json([
                'status' => false,
                'categories' => null
            ]);

        }
    }

}

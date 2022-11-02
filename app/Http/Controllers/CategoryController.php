<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Show Category View
    public function index() {
        return view('components.categories',
            ['categories' => auth()->user()->categories()->orderBy('category', 'asc')->get()]);
    }

    // Store Category
    public function store(Request $request, Category $category) {
        $formFields = $request->validate([
            'category' => 'required'
        ]);

        $formFields['user_id'] = auth()->id();

        Category::create($formFields);

        // return redirect('/app/')->with('message', 'Listing created successfully!');
        return back();
    }

    // Delete Category
    public function destroy(Category $category) {
        $category->delete();
        return back()->with('message', 'Category deleted seccessfully.');
    }
}

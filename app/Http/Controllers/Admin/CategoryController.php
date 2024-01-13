<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {
    public function create() {
        return view('admin.categories.create');
    }

    public function store(Request $request, Category $category) {
        $data = $request->all();

        $category = $category->create($data);
    
        return redirect()->route('home.index');
    }
}
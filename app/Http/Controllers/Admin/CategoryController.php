<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Requests\CatogryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::latest()->paginate(5);
    
        return view('Admin/Category-list',compact('categories'));
    
        // $category = Category::all();
        // return view('Admin/Category-list', ['categories' => $categories]);
    }

    public function create()
    {
        // dd("working");
        return view('Admin/Add-Category');
    }

    public function store(CatogryRequest $request)
    {
        $request->validate([
            'name' => 'required',

        ]);

        $data = $request->all();
        $category = Category::create([
            'name' => $data['name'],
        ]);

        return redirect()->back()->with('message', 'Category Added Successfully');
    }
}

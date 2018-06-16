<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CategoriesController extends Controller
{

    public function index()
    {
        $categories = Category::where('customer_id', session('customer_id'))
            ->orderBy('name', 'asc')
            ->get();
        return view('admin.categories.index', ['categories' => $categories]);
    }


    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
        ]);

        $city = new Category();
        $city->fill($request->all());
        $city->customer_id = session('customer_id');
        $city->save();
        return redirect()->route('admin.categories.index');
    }


    public function show(Category $categories)
    {
        //
    }


    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', ['category' => $category]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
        ]);

        $category = Category::find($id);
        $category->fill($request->all());
        $category->customer_id = session('customer_id');
        $category->save();
        return redirect()->route('admin.categories.index');
    }


    public function delete($id)
    {
        Category::find($id)->delete();
        return redirect()->route('admin.categories.index');
    }
}

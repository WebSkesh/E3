<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\Category;
use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;


class InstitutionsController extends Controller
{

    public function index(Request $request)
    {
        $cities = City::where('customer_id', session('customer_id'))
            ->orderBy('name', 'asc')
            ->get();

        $categories = Category::where('customer_id', session('customer_id'))
            ->orderBy('name', 'asc')
            ->get();

        $institutions = Institution::where('customer_id', session('customer_id'))
            ->where(function ($query) use ($request) {
                if(!empty($request->city_id)) {
                    $query->where('city_id', $request->city_id);
                }
            })
            ->where(function ($query) use ($request) {
                if(!empty($request->category_id)) {
                    $query->where('category_id', $request->category_id);
                }
            })
            ->orderBy('name', 'asc')
            ->get();

        return view('admin.institutions.index', [
            'institutions' => $institutions,
            'cities' => $cities,
            'categories' => $categories,
            'category_id' => $request->category_id,
            'city_id' => $request->city_id,
        ]);
    }


    public function create()
    {
        $cities = City::where('customer_id', session('customer_id'))
            ->orderBy('name', 'asc')
            ->get();

        $categories = Category::where('customer_id', session('customer_id'))
            ->orderBy('name', 'asc')
            ->get();

        return view('admin.institutions.create', [
            'cities' => $cities,
            'categories' => $categories,
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'password' => 'required|max:100',
            'phone' => 'required|max:20',
            'contact_person' => 'required|max:100',
            'password' => 'required|max:100',
        ]);

        $institution = new Institution();
        $institution->fill($request->all());
        $institution->password = Hash::make($request->get('password'));
        $institution->customer_id = session('customer_id');
        $institution->save();
        return redirect()->route('admin.institutions.index');
    }


    public function show(Institution $institution)
    {
        //
    }


    public function edit($id)
    {
        $institution = Institution::find($id);

        $cities = City::where('customer_id', session('customer_id'))
            ->orderBy('name', 'asc')
            ->get();

        $categories = Category::where('customer_id', session('customer_id'))
            ->orderBy('name', 'asc')
            ->get();

        return view('admin.institutions.edit', [
            'institution' => $institution,
            'cities' => $cities,
            'categories' => $categories,
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'password' => 'required|max:100',
            'phone' => 'required|max:20',
            'contact_person' => 'required|max:100',
            'password' => 'required|max:100',
        ]);

        $institution = Institution::find($id);
        $institution->fill($request->all());
        $institution->password = Hash::make($request->get('password'));
        $institution->customer_id = session('customer_id');
        $institution->save();
        return redirect()->route('admin.institutions.index');
    }


    public function delete($id)
    {
        Institution::find($id)->delete();
        return redirect()->route('admin.institutions.index');
    }
}
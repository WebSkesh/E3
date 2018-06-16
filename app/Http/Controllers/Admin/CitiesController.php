<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class CitiesController extends Controller
{
    public function index()
    {
        $cities = City::where('customer_id', session('customer_id'))
            ->orderBy('name', 'asc')
            ->get();
        return view('admin.cities.index', ['cities' => $cities]);
    }


    public function create()
    {
        return view('admin.cities.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'password' => 'required|max:100',
            'email' => 'required|max:100',
            'phone' => 'required|max:20',
        ]);

        $city = new City();
        $city->fill($request->all());
        $city->password = Hash::make($request->get('password'));
        $city->customer_id = session('customer_id');
        $city->save();
        return redirect()->route('admin.cities.index');
    }


    public function show(City $city)
    {
        //
    }


    public function edit($id)
    {
        $city = City::find($id);
        return view('admin.cities.edit', ['city' => $city]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'password' => 'required|max:100',
            'email' => 'required|max:100',
            'phone' => 'required|max:20',
        ]);

        $city = City::find($id);
        $city->fill($request->all());
        $city->password = Hash::make($request->get('password'));
        $city->customer_id = session('customer_id');
        $city->save();
        return redirect()->route('admin.cities.index');
    }


    public function delete($id)
    {
        City::find($id)->delete();
        return redirect()->route('admin.cities.index');
    }
}

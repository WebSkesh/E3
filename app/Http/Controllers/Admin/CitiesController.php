<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CitiesController extends Controller
{
    public function index()
    {
        $cities = City::where('customer_id', session(['customer_id']))
            ->orderBy('name', 'asc')
            ->get();
        return view('admin.cities.index', ['cities' => $cities]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(City $city)
    {
        //
    }


    public function edit(City $city)
    {
        //
    }


    public function update(Request $request, City $city)
    {
        //
    }


    public function delete(City $city)
    {
        //
    }
}

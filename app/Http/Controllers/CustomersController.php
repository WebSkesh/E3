<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class CustomersController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return response()->view('customers.index', ['customers' => $customers]);
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'number_of_objects' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'started_at' => 'required|date',
            'paid_to' => 'required|date',
            'paid_all' => 'required',
        ]);

        $customer = new Customer();
        $customer->fill($request->all());
        $customer->password = Hash::make($request->get('password'));
        $customer->save();
        return redirect()->route('customers.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function delete($id)
    {
        Customer::find($id)->delete();
        return redirect()->route('customers.index');
    }
}

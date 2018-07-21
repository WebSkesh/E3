<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Customer;
use App\Models\Category;
use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomersController extends Controller
{
    private $customer;
    private $city;
    private $category;

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
            'name' => 'required|max:100',
            'city' => 'required|max:100',
            'password' => 'required|max:100',
            'number_of_objects' => 'required|integer|max:5000',
            'email' => 'required|max:100',
            'phone' => 'required|max:20',
            'started_at' => 'required|date',
            'one_institution_price' => 'required|max:100',
            'paid_to' => 'required|date',
            'paid_all' => 'required|numeric|max:20',
        ]);

        $customer = new Customer();

        $customer->fill($request->all());
        $customer->password = Hash::make($request->get('password'));

        if($customer->save()) {
            $this->customer = $customer;
            $this->setCity();
            $this->setRootCategory();
            $this->setAdmin();
            $this->setChief();
        }

        return redirect()->route('customers.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customers.edit', ['customer' => $customer]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'password' => 'required|max:100',
            'number_of_objects' => 'required|integer|max:5000',
            'email' => 'required|max:100',
            'phone' => 'required|max:20',
            'started_at' => 'required|date',
            'one_institution_price' => 'required|max:100',
            'paid_to' => 'required|date',
            'paid_all' => 'required|numeric|max:20',
        ]);

        $customer = Customer::find($id);
        $customer->fill($request->all());
        $customer->password = Hash::make($request->get('password'));
        $customer->save();
        return redirect()->route('customers.index');
    }

    public function delete($id)
    {
        Customer::find($id)->delete();
        return redirect()->route('customers.index');
    }

    private function setCity()
    {
        $city = new City();
        $city->customer_id = $this->customer->id;
        $city->name = $this->customer->city;
        $city->email = $this->customer->email;
        $city->phone = $this->customer->phone;
        $city->contact_person = $this->customer->contact_person;
        if($city->save()){
            $this->city = $city;
            return true;
        }

        return false;
    }

    private function setRootCategory()
    {
        $category = new Category();

        $category->customer_id = $this->customer->id;
        $category->name = trans('messages.other');
        if($category->save()){
            $this->category = $category;
            return true;
        }

        return false;
    }

    private function setAdmin() {
        $admin = new Institution();

        $admin->customer_id = $this->customer->id;
        $admin->city_id = $this->city->id;
        $admin->category_id = $this->category->id;
        $admin->user_role_id = 2; // admin
        $admin->name = trans('messages.admin'); // admin
        $admin->email = $this->customer->email;
        $admin->phone = $this->customer->phone;
        $admin->contact_person = $this->customer->contact_person;
        $admin->password = Hash::make('101010');
        $admin->address = $this->customer->address;
        if($admin->save()){
            return true;
        }

        return false;
    }

    private function setChief() {
        $chief = new Institution();

        $chief->customer_id = $this->customer->id;
        $chief->city_id = $this->city->id;
        $chief->category_id = $this->category->id;
        $chief->user_role_id = 4; // chief
        $chief->name = trans('messages.chief'); // chief
        $chief->email = $this->customer->email;
        $chief->phone = $this->customer->phone;
        $chief->contact_person = $this->customer->contact_person;
        $chief->password = Hash::make('101010');
        $chief->address = $this->customer->address;
        if($chief->save()){
            return true;
        }

        return false;
    }
}

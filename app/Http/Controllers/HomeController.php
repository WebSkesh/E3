<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;


class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('index', ['customers' => $customers]);
    }

    public function welcome($id) {

        session(['customer_id' => $id]);

        $customer = Customer::find($id);
        return view('welcome', ['customer' => $customer]);
    }


}

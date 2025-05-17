<?php

namespace App\Http\Controllers;

use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::withCount('orders')->paginate(10);

        return view('customers.index', compact('customers'));
    }
}

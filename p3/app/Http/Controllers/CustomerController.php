<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = new Customer;
        $customers = $customer::orderBy('id', 'asc')->get();
        return view('customers/index', ['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address'  => 'required',
            'phone_no' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ]);

        $first_name  = $request->input('first_name');
        $last_name  = $request->input('last_name');
        $address  = $request->input('address');
        $phone_no  = $request->input('phone_no');


        $customer = new Customer;
        $customer->first_name = $first_name;
        $customer->last_name = $last_name;
        $customer->address = $address;
        $customer->phone_no = $phone_no;
        $customer->save();

        return redirect('/customers/create')->with('message', 'Customer created successfully');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = new Customer;
        $customer = $customer::where('id', $id)->first();
        return view('customers/edit', ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address'  => 'required',
            'phone_no' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ]);

        $first_name  = $request->input('first_name');
        $last_name  = $request->input('last_name');
        $address  = $request->input('address');
        $phone_no  = $request->input('phone_no');


        $customer = new Customer;
        $customer = $customer::find($id);
        $customer->first_name = $first_name;
        $customer->last_name = $last_name;
        $customer->address = $address;
        $customer->phone_no = $phone_no;
        $customer->save();

        return redirect('/customers/' . $id . '/edit')->with('message', 'The customer information has been updated');
    }
}
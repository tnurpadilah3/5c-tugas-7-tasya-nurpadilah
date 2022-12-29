<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Pelayan;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customers = customer::get();
        return view('customer.index', compact('customers'));
    }

    public function create(){
        return view('customer.create');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'no_antrian' => 'required|numeric',
            'nama_customer' => 'required',
            'jenis_kelamin' => 'required',
            'menu_buket' => 'required',
        ]);

        Customer::create($validate);
        return redirect() -> route('customer.index') -> with('message', "Data Customer {$validate['nama_customer']} berhasil ditambahkan");
    }

    public function destroy(Customer $customer){
        $customer->delete();
        return redirect()->route('customer.index') -> with('message', "Data Customer {$customer->nama_customer} berhasil dihapus");
    }

    public function edit(Costomer $customer){
        return view('customer.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer){
        $validate = $request->validate([
            'no_antrian' => 'required|numeric',
            'nama_customer' => 'required',
            'jenis_kelamin' => 'required',
            'menu_buket' => 'required',
        ]);

        $customer -> update($validate);

        return redirect() -> route('customer.index') -> with('message', "Data Customer {$customer->nama_customer} berhasil diubah");
    }

    public function show(customer $customer)
    {
        return view('customer.show', compact('customer'));
    }

    public function take(Customer $customer){
        $pelayans = Pelayan::get();
        return view('customer.take', compact('customer', 'pelayans'));
    }

    public function takeStore(Request $request, customer $customer){
        $pelayans = Pelayan::find($request->pelayan_id);
        $customer -> pelayans() -> sync($pelayans);

        return redirect() -> route('customer.index') -> with('message', 'Berhasil menambahkan pesanan');
    }
}

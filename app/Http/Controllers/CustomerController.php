<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    // Menampilkan seluruh customer
    public function index(Request $request)
    {
        $search = $request->query('q');

        $customers = Customer::query()
            ->when(is_string($search) && $search !== '', function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('phone', 'like', '%' . $search . '%');
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('customers.index', compact('customers'));
    }

    // Menampilkan form tambah customer
    public function create()
    {
        return view('customers.create', ['customer' => new Customer()]);
    }

    // Menyimpan customer baru
    public function store(Request $request)
    {
        Customer::create($this->validatedData($request));

        return redirect()->route('customers.index')
            ->with('success', 'Customer berhasil ditambahkan.');
    }

    // Menampilkan detail customer
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    // Menampilkan form edit customer
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    // Memperbarui customer
    public function update(Request $request, Customer $customer)
    {
        $customer->update($this->validatedData($request, $customer));

        return redirect()->route('customers.index')
            ->with('success', 'Customer berhasil diperbarui.');
    }

    // Menghapus customer
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')
            ->with('success', 'Customer berhasil dihapus.');
    }

    private function validatedData(Request $request, ?Customer $customer = null): array
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => [
                'nullable',
                'email',
                'max:255',
                Rule::unique('customers', 'email')->ignore($customer),
            ],
            'address' => 'nullable|string',
        ]);
    }
}

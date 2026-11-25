<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use illuminate\validation\Rule;

class OwnerController extends Controller
{
    public function index()
    {
        $owners = Owner::latest()->paginate(10);
        return view('owners.index', compact('owners'));
    }

    public function create()
    {
        return view('owners.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|digits_between:10,15',
            'email' => 'nullable|email|unique:owners,email',
            'address' => 'nullable|string|max:500',
        ]);

        Owner::create($data);

        return redirect()->route('owners.index')->with('success', 'Pemilik berhasil ditambahkan');
    }

    public function edit(Owner $owner)
    {
        return view('owners.edit', compact('owner'));
    }

    public function update(Request $request, Owner $owner)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|digits_between:10,15',
            'email' => ['nullable', 'email', Rule::unique('owners', 'email')->ignore($owner->id)],
            'address' => 'nullable|string|max:500',
        ]);

        $owner->update($data);

        return redirect()->route('owners.index')->with('success', 'Data pemilik berhasil diperbarui');

    }

    public function destroy(Owner $owner)
    {
        $owner->delete();

        return redirect()->route('owners.index')->with('success', 'Pemilik berhasil dihapus');
    }
}

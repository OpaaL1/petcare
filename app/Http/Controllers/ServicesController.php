<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Services::latest()->paginate(10);
        return view('services.index', compact('services'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:services,name',
            'description' => 'nullable|string|max:500',
            'price' => 'required|integer|min:0',
            'duration' => 'required|integer|min:1|max:1440',
        ]);

        Services::create($data);

        return redirect()->route('services.index')->with('success', 'Layanan berhasil ditambahkan');
    }

    public function edit(Services $service)
    {
        return view('services.edit', ['services' => $service]);
    }

    public function update(Request $request, Services $service)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('services', 'name')->ignore($service->id)],
            'description' => 'nullable|string|max:500',
            'price' => 'required|integer|min:0',
            'duration' => 'required|integer|min:1|max:1440',
        ]);

        $service->update($data);

        return redirect()->route('services.index')->with('success', 'Data layanan berhasil diperbarui');
    }

    public function destroy(Services $service)
    {
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Layanan berhasil dihapus');
    }
}
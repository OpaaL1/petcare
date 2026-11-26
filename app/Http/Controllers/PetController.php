<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Owner;
use Illuminate\Http\Request;

class PetController extends Controller
{
    private function rules(): array
    {
        return [
            'owner_id'   => 'required|exists:owners,id',
            'name'       => 'required|string|max:255',
            'species'    => 'required|string|max:100',
            'breed'      => 'nullable|string|max:100',
            'gender'     => 'required|in:jantan,betina',
            'birth_date' => 'nullable|date|before_or_equal:today',
            'weight'     => 'nullable|numeric|min:0|max:999.99',
            'notes'      => 'nullable|string|max:500',
        ];
    }

    public function index()
    {
        $pets = Pet::with('owner')->latest()->paginate(10);
        return view('pets.index', compact('pets'));
    }

    public function create()
    {
        $owners = Owner::orderBy('name')->get();
        return view('pets.create', compact('owners'));
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());

        Pet::create($data);

        return redirect()->route('pets.index')
            ->with('success', 'Hewan berhasil ditambahkan.');
    }

    public function edit(Pet $pet)
    {
        $owners = Owner::orderBy('name')->get();
        return view('pets.edit', compact('pet', 'owners'));
    }

    public function update(Request $request, Pet $pet)
    {
        $data = $request->validate($this->rules());

        $pet->update($data);

        return redirect()->route('pets.index')
            ->with('success', 'Data hewan berhasil diperbarui.');
    }

    public function destroy(Pet $pet)
    {
        $pet->delete();

        return redirect()->route('pets.index')
            ->with('success', 'Hewan berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Cage;
use Illuminate\Http\Request;

class CageController extends Controller
{
    public function index()
    {
        $cages = Cage::all();
        return view('cages.index', compact('cages'));
    }

    public function create()
    {
        return view('cages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
        ]);

        Cage::create([
            'name' => $request->name,
            'capacity' => $request->capacity,
        ]);

        return redirect()->route('cages.index')->with('success', 'Клетка успешно создана!');
    }

    public function show(Cage $cage)
    {
        return view('cages.show', compact('cage'));
    }

    public function edit(Cage $cage)
    {
        return view('cages.edit', compact('cage'));
    }

    public function update(Request $request, Cage $cage)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
        ]);

        $cage->update([
            'name' => $request->name,
            'capacity' => $request->capacity,
        ]);

        return redirect()->route('cages.index')->with('success', 'Клетка успешно обновлена!');
    }

    public function destroy(Cage $cage)
{
    if ($cage->animals->isEmpty()) {
        $cage->delete();
        return redirect()->route('cages.index')->with('success', 'Клетка успешно удалена!');
    }

    return back()->with('error', 'Невозможно удалить клетку, в клетке есть животные.');
}

}

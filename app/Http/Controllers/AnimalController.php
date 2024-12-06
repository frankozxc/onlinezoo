<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Cage;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index()
    {
        $animals = Animal::all();
        return view('animals.index', compact('animals'));
    }

    public function create()
    {
        $cages = Cage::all();
        return view('animals.create', compact('cages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:191',
            'species' => 'required|string|max:191',
            'age' => 'required|integer',
            'description' => 'nullable|string',
            'cage_id' => 'required|exists:cages,id',
        ]);
    
        $cage = Cage::findOrFail($request->cage_id);
    
        if ($cage->capacity <= $cage->animals->count()) {
            \Log::info('Переполнение клетки: ' . $cage->name);
            return back()->withErrors('В этой клетке нет места для добавления нового животного.');
        }
    
        $animal = new Animal($request->all());
        $animal->save();
    
        \Log::info('Животное добавлено: ' . $animal->name);
    
        return redirect()->route('animals.index')->with('success', 'Животное успешно добавлено!');
    }
    

    public function edit(Animal $animal)
    {
        $cages = Cage::all();
        return view('animals.edit', compact('animal', 'cages'));
    }

    public function update(Request $request, Animal $animal)
    {
        $request->validate([
            'name' => 'required|string|max:191',
            'species' => 'required|string|max:191',
            'age' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        $animal->fill($request->all());

        if ($request->hasFile('image')) {
            $animal->image = $request->file('image')->store('animals', 'public');
        }

        $animal->save();

        return redirect()->route('animals.index')->with('success', 'Животное успешно обновлено!');
    }

    public function destroy(Animal $animal)
    {
        $animal->delete();

        return redirect()->route('animals.index')->with('success', 'Животное успешно удалено!');
    }

    public function show(Animal $animal)
    {
        return view('animals.show', compact('animal'));
    }
}

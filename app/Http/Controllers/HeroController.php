<?php

namespace App\Http\Controllers;

use App\Events\UserLog;
use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heroes = Hero::all();
        return view('heroes.index', compact('heroes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('heroes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'lore' => 'required|string',
        ]);
        //
        Hero::create($request->all());
        // $log_entry = "'Added an Hero' . $hero->name . 'with the ID#' . $hero.id " ;

        // event(new UserLog($log_entry));
        return redirect()->route('heroes.index')->with('success', 'Hero created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $hero = Hero::findOrFail($id);
        return view('heroes.show', compact('hero'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $hero = Hero::findOrFail($id);
        return view('heroes.edit', compact('hero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'lore' => 'required|string',
        ]);

        $hero = Hero::findOrFail($id);
        $hero->update($validatedData);

        return redirect()->route('heroes.index')->with('success', 'Hero updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hero = Hero::findOrFail($id);
        $hero->delete();

        return redirect()->route('heroes.index')->with('success', 'Hero deleted successfully.');
    }
}

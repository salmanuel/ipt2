<?php

namespace App\Http\Controllers;

use App\Events\UserLog;
use App\Models\Fruit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FruitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fruits = Fruit::all();
        return view('dashboard', ['fruits' => $fruits]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fruits.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fruit_name' => 'required|string',
            'description' => 'required|string',
            'classification' => 'required|string',
        ]);
        //
        $fruit = Fruit::create($request->all());
        $log_entry = "Added an fruit" . $fruit->name . "with the ID#" . $fruit->id ;

        event(new UserLog($log_entry));
        return redirect()->route('dashboard')->with('success', 'Fruit added to the list.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fruit $fruit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fruit $fruit)
    {
        return view('fruits.edit', ['fruit' => $fruit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fruit $fruit)
    {
        $request->validate([
            'fruit_name'    => 'required|string',
            'description' => 'required|string',
            'classification'      => 'required|string',
        ]);

        $fruit->update($request->all());

        $log_entry = "Updated fruit " . $fruit->fruit_title . " with the ID#" . $fruit->id;
        event(new UserLog($log_entry));

        return redirect()->route('dashboard')->with('success', 'Fruit updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fruit $fruit)
    {
        $log_entry = "Deleted the fruit " . $fruit->fruit_name . " with the ID# " . $fruit->id;
        event(new UserLog($log_entry));

        $fruit->delete();

        return redirect()->route('dashboard')->with('success', 'Fruit deleted successfully!');
    }
}

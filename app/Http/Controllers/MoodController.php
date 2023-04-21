<?php

namespace App\Http\Controllers;

use App\Models\Mood;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $moods = Mood::all();

        return view('moods.index')->with('moods', $moods);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('moods.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:moods,name',
            'color' => 'required|string|unique:moods,color',
        ]);

        Mood::create($request->all());

        return redirect()->route('moods.index')
            ->with('success', 'Mood created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Mood $mood)
    {
        return view('moods.show')->with('mood', $mood);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mood $mood)
    {
        return view('moods.edit')->with('mood', $mood);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mood $mood)
    {
        $request->validate([
            'name' => 'required|string|unique:moods,color,' . $mood->id . ',id',
            'color' => 'required|string|unique:moods,color,' . $mood->id . ',id'
        ]);

        $updatedMood = $request->all();
        $mood->update($updatedMood);

        return redirect()->route('moods.show', [$mood->id])
            ->with('success', 'Mood updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mood $mood)
    {
        $mood->delete();

        return redirect()->route('moods.index')
        ->with('success', 'Mood deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\Mood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Store all entries in cache for 1 hour (3600 seconds) in ascending order of date
        $entries = Cache::remember('entries', 3600, function () {
            return Entry::orderBy('date', 'ASC')->get();
        });

        return view('entries.index')->with('entries', $entries);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Store all moods in cache for 1 hour (3600 seconds) in ascending order of name
        $moods = Cache::remember('moods', 3600, function () {
            return Mood::orderBy('name', 'ASC')->get();
        });

        return view('entries.create')->with('moods', $moods);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Date must be in format Y-M-D. Must also not already exist in entries table date column
        // Selected mood_id must exist in the moods table under column id
        $request->validate([
            'date' => 'required|date|date_format:Y-m-d|unique:entries,date',
            'notes' => 'required',
            'mood_id' => 'required|exists:moods,id',
        ]);

        Entry::create($request->all());

        return redirect()->route('entries.index')
            ->with('success', 'Entry created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Entry $entry)
    {
        // show entry with id
        return view('entries.show')->with('entry', $entry);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entry $entry)
    {
        // Store all moods in cache for 1 hour (3600 seconds) in ascending order of name
        $moods = Cache::remember('moods', 3600, function () {
            return Mood::orderBy('name', 'ASC')->get();
        });

        return view('entries.edit')->with('entry', $entry)->with('moods', $moods);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entry $entry)
    {
        // Date must be in format Y-M-D. Must also not already exist in entries table date column
        // Selected mood_id must exist in the moods table under column id
        $request->validate([
            'date' => 'required|date|date_format:Y-m-d|unique:entries,date,' . $entry->id,
            'notes' => 'required',
            'mood_id' => 'required|exists:moods,id',
        ]);

        $updatedEntry = $request->all();
        $entry->update($updatedEntry);

        return redirect()->route('entries.show', [$entry->id])
        ->with('success', 'Entry updated.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entry $entry)
    {
        // Destroy entry with id
        $entry->delete();

        return redirect()->route('entries.index')
            ->with('success', 'Entry deleted successfully');
    }
}

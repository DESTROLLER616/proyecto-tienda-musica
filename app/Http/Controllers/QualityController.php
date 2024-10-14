<?php

namespace App\Http\Controllers;

use App\Models\Quality;
use Illuminate\Http\Request;

class QualityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $qualities = Quality::paginate(10);

        return view('quality.index', compact('qualities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('quality.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        $quality = Quality::create($validatedData);

        return redirect()->route('qualities.create')->with('success', 'Quality is successfully saved');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $quality = Quality::findOrFail($id);

        return view('quality.edit', compact('quality'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        Quality::whereId($id)->update($validatedData);

        return redirect()->route('qualities.index')->with('success', 'Quality is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

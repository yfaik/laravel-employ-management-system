<?php

namespace App\Http\Controllers;

use App\Models\Matekexpot;
use Illuminate\Http\Request;

class MatekexpotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('search');

        if ($query) {
            $matekexpots = Matekexpot::where('reference', 'LIKE', "%{$query}%")
                ->orWhere('color', 'LIKE', "%{$query}%")
                ->get();
        } else {
            $matekexpots = Matekexpot::all();
        }

        return view('matekexpots.index', compact('matekexpots'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $matekexpots = Matekexpot::all();
        return view('matekexpots.create', compact('matekexpots'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'reference' => 'required|string|max:255',
            'article' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'color' => 'required|string|max:255',
              'price' => 'required|numeric',
           
        ]);

        $path = $request->file('photo')->store('photos', 'public');

        Matekexpot::create([
            'reference' => $validated['reference'],
            'article' => $validated['article'],
            'photo_path' => $path,
            'color' => $validated['color'],
            'price' => $validated['price'],
        ]);

        return redirect()->route('matekexpots.index')
                         ->with('success', 'Référence créée avec succès.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Matekexpot $matekexpot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matekexpot $matekexpot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Matekexpot $matekexpot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matekexpot $matekexpot)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $animals = Animal::all();

        return view("admin.animals.index", compact("animals"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.animals.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        // $newAnimal = Animal::create($data);

        $newAnimal = new Animal();
        $newAnimal->name = $data["name"];
        $newAnimal->description = $data["description"];
        $newAnimal->origin = $data["origin"];
        $newAnimal->img_url = $data["img_url"];
        $newAnimal->additional_info = $data["additional_info"];
        $newAnimal->save();


        return redirect()->route("admin.animals.show", $newAnimal);
    }

    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {
        // $animal = Animal::findOrFail($id);
        return view("admin.animals.show", compact("animal"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal)
    {
        return view("admin.animals.edit", compact("animal"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Animal $animal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {
        //
    }
}

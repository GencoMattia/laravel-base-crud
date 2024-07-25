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
        $data = $request->validate([
            "name" => "required|unique:animals|min:3|max:25",
            "description" => "required|max:65535|nullable",
            "origin" => "required|min:3|max:50",
            "img_url" => "required|url|max:65535|nullable",
            "additional_info" => "required|max:65535|nullable"
        ]);

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
        // dd($animal);
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
        $data = $request->validate([
            "name" => "required|min:3|max:25",
            "description" => "required|max:65535|nullable",
            "origin" => "required|min:3|max:50",
            "img_url" => "required|url|max:65535|nullable",
            "additional_info" => "required|max:65535|nullable"
        ],
        [
            "name.required" => "Il campo nome è obbligatorio.",
            "name.min" => "Il nome deve contenere almeno 3 caratteri.",
            "name.max" => "Il nome non può superare i 25 caratteri.",

            "description.required" => "Il campo descrizione è obbligatorio.",
            "description.max" => "La descrizione non può superare i 65535 caratteri.",

            "origin.required" => "Il campo origine è obbligatorio.",
            "origin.min" => "L'origine deve contenere almeno 3 caratteri.",
            "origin.max" => "L'origine non può superare i 50 caratteri.",

            "img_url.required" => "L'URL dell'immagine è obbligatorio.",
            "img_url.url" => "L'URL dell'immagine non è valido.",
            "img_url.max" => "L'URL dell'immagine non può superare i 65535 caratteri.",

            "additional_info.required" => "Il campo informazioni aggiuntive è obbligatorio.",
            "additional_info.max" => "Le informazioni aggiuntive non possono superare i 65535 caratteri.",
        ]);

        // $animal->update($data);

        $animal->name = $data["name"];
        $animal->description = $data["description"];
        $animal->origin = $data["origin"];
        $animal->img_url = $data["img_url"];
        $animal->additional_info = $data["additional_info"];
        $animal->update();

        return redirect()->route("admin.animals.show", $animal)->with("message", $animal->name . " è stato modificato con successo");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {
        $animal->delete();
        return redirect()->route("admin.animals.index")->with("message", $animal->name . " è stato cancellato con successo");;
    }

    public function deletedIndex(Animal $animal){

        $animals = Animal::onlyTrashed()->get();

        return view("admin.animals.deletedIndex", compact("animals"));
    }

    public function restore(string $id){
        $animal = Animal::onlyTrashed()->findOrFail($id);
        $animal->restore();

        return redirect()->route("animals.deletedIndex")->with("message", $animal->name . " è stato ripristinato con successo");
    }

    public function permanentDelete(string $id){
        $animal = Animal::onlyTrashed()->findOrFail($id);
        $animal->forceDelete();

        return redirect()->route("animals.deletedIndex")->with("message", $animal->name . " è stato rimosso con successo");
    }
}

<?php

namespace Database\Seeders;

use App\Functions\Helpers;
use App\Models\Animal;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use InvalidArgumentException;

class AnimalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $animals = Helpers::getCsvInfo(__DIR__ . "/../../resources/assets/fantastic-animal.csv");

        foreach ($animals as $index => $animal) {
            if ($index > 0) {
                $newAnimal = new Animal();
                $newAnimal->name = $animal[0];
                $newAnimal->description = $animal[1];
                $newAnimal->origin = $animal[2];
                $newAnimal->img_url = $animal[3];
                $newAnimal->additional_info = $animal[4];
                $newAnimal->save();
            }
        }
    }

}

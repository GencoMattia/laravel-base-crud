<?php

namespace Database\Seeders;

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
        $animals = $this->getCsvInfo(__DIR__ . "/fantastic-animal.csv");
        var_dump($animals);

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

    static function getCsvInfo($filePath){
        $csvData = [];

        $fileData = fopen($filePath,"r");

        if ($fileData === false) {
            throw new InvalidArgumentException("File not found");
        }

        while ( ( $csvRow = fgetcsv($fileData) ) !== false ) {
            $csvData[] = $csvRow;
        }

        fclose($fileData);

        return $csvData;
    }
}

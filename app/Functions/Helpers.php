<?php

namespace App\Functions;

class Helpers {

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

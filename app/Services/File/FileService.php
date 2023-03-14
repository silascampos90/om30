<?php

namespace App\Services\File;

use App\Models\Patient;

class FileService implements FileServiceContracts
{
    /**
     * @inheritdoc
     */
    public function readCsvFile(string $pathFile)
    {
        $csvFile = fopen(base_path($pathFile), 'r');

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ',')) !== false) {
            if (! $firstline) {
                Patient::create([
                    'name' => 'job1',
                    'mother_name' => 'mother job',
                    'cpf' => '85257332165',
                    'cnd' => '12345635',
                    'foto' => 'path/foto'
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}

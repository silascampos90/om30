<?php

namespace App\Services\File;

interface FileServiceContracts
{
    /**
     * @param string $pathFile;
     */
    public function readCsvFile(string $pathFile);

    /**
     * @param array $data
     */
    public function uploadCsvFile(array $data);
}

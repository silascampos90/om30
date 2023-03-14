<?php

namespace App\Services\File;

interface FileServiceContracts
{
    /**
     * @param string $pathFile;
     */
    public function readCsvFile(string $pathFile);
}

<?php

namespace App\Http\Controllers;

use App\Builders\Responses\ResponseBuilder;
use App\Http\Requests\FileCsvRequest;
use App\Jobs\ReadCsvFileJob;
use App\Services\File\FileServiceContracts;
use Illuminate\Http\Response;

class FileCsvController extends Controller
{
    /**
     * @var FileServiceContracts
     */
    protected $fileService;

    /**
     * @param FileServiceContracts $fileService
     */
    public function __construct(FileServiceContracts $fileService)
    {
        $this->fileService = $fileService;
    }

    public function uploadCsv(FileCsvRequest $request)
    {
        try {
            $data = $request->all();

            $request->validated();

            $filePath = $this->fileService->uploadCsvFile($data);

            ReadCsvFileJob::dispatch($filePath);

            return ResponseBuilder::init()
            ->status(Response::HTTP_CREATED)
            ->message('Arquivo Enviado com Sucesso.')
            ->build();
        } catch (\Exception $e) {
            return ResponseBuilder::init()
            ->status(Response::HTTP_BAD_REQUEST)
            ->message($e->getMessage())
            ->build();
        }
    }
}

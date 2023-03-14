<?php

namespace App\Http\Controllers;

use App\Builders\Responses\ResponseBuilder;
use Illuminate\Http\Response;

class FileCsvController extends Controller
{
    public function __construct()
    {
    }

    public function __invoke()
    {
        try {
            //code...
        } catch (\Exception $e) {
            return ResponseBuilder::init()
            ->status(Response::HTTP_BAD_REQUEST)
            ->message($e->getMessage())
            ->build();
        }
    }
}

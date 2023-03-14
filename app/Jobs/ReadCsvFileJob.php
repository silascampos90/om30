<?php

namespace App\Jobs;

use App\Services\File\FileServiceContracts;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ReadCsvFileJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public $tries = 3;

    protected $pathFile;
    private $fileservice;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $pathFile)
    {
        $this->pathFile = $pathFile;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(FileServiceContracts $fileservice)
    {
        $this->fileservice = $fileservice;

        $this->fileservice->readCsvFile($this->pathFile);
    }
}

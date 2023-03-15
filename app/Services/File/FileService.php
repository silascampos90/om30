<?php

namespace App\Services\File;

use App\Services\Address\AddressServiceContracts;
use App\Services\Patient\PatientServiceContracts;

class FileService implements FileServiceContracts
{
    /**
     * @var PatientServiceContracts
     */
    protected $patientService;

    /**
     * @var AddressServiceContracts
     */
    protected $addressService;

    /**
     * @param PatientServiceContracts $patientService
     * @param AddressServiceContracts $addressService
     */
    public function __construct(
        PatientServiceContracts $patientService,
        AddressServiceContracts $addressService
    ) {
        $this->patientService = $patientService;
        $this->addressService = $addressService;
    }

    /**
     * @inheritdoc
     */
    public function readCsvFile(string $pathFile)
    {
        $csvFile = fopen(public_path($pathFile), 'r');

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ',')) !== false) {
            if (! $firstline) {
                $patient = $this->patientService->store([
                    'name' => $data[0],
                    'mother_name' => $data[1],
                    'cpf' => $data[2],
                    'cns' => $data[3],
                    'foto' => $data[4]
                ]);

                $address = [
                    'cep' => $data[5],
                    'address' => $data[6],
                    'complement' => $data[7],
                    'number' => $data[8],
                    'district' => $data[9],
                    'state' => $data[10],
                    'city' => $data[11]
                ];

                $this->addressService->store($address, $patient);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }

    public function uploadCsvFile(array $data)
    {
        $csv = request()->file('file');
        $csvName = time() . '.' . $csv->getClientOriginalExtension();
        $acsvPath = public_path('/csv/patient');
        $csv->move($acsvPath, $csvName);

        return 'csv/patient/' . $csvName;
    }
}

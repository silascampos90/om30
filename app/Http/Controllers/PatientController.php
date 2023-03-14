<?php

namespace App\Http\Controllers;

use App\Builders\Responses\ResponseBuilder;
use App\Http\Requests\CepRequest;
use App\Http\Requests\PatientRequest;
use App\Services\Address\AddressServiceContracts;
use App\Services\Patient\PatientServiceContracts;
use Illuminate\Http\Response;

class PatientController extends Controller
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

    public function view()
    {
        return view('patient.form-patient');
    }

    /**
     * @param PatientRequest $request
     */
    public function store(PatientRequest $request)
    {
        try {
            $data = $request->all();
            $validated = $request->validated();

            $patient = $this->patientService->store($validated);

            $this->addressService->store($data, $patient);

            return ResponseBuilder::init()
                ->data($data)
                ->status(Response::HTTP_CREATED)
                ->message('Paciente Criado Com Sucesso')
                ->build();
        } catch (\Exception $e) {
            return ResponseBuilder::init()
                ->status(Response::HTTP_BAD_REQUEST)
                ->message($e->getMessage())
                ->build();
        }
    }

    /**
     * @param CepRequest $request
     */
    public function cepFind(CepRequest $request)
    {
        try {
            $validated = $request->validated();

            $cep = $this->patientService->findPatientCep($validated);

            return ResponseBuilder::init()
                ->data($cep)
                ->status(Response::HTTP_CREATED)
                ->message('Paciente Criado Com Sucesso')
                ->build();
        } catch (\Exception $e) {
            return ResponseBuilder::init()
                ->status(Response::HTTP_BAD_REQUEST)
                ->message($e->getMessage())
                ->build();
        }
    }
}

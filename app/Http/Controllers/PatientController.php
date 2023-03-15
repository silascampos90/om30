<?php

namespace App\Http\Controllers;

use App\Builders\Responses\ResponseBuilder;
use App\Http\Requests\CepRequest;
use App\Http\Requests\PatientRequest;
use App\Http\Resources\PatientListResource;
use App\Http\Resources\PatientResource;
use App\Http\Resources\ViaCepResource;
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
        $csvFile = fopen(public_path('csv/patient/1678838476.csv'), 'r');

        return view('patient.form-patient');
    }

    public function upload()
    {
        return view('patient.upload-patient');
    }

    public function list()
    {
        try {
            $patients = PatientListResource::collection($this->patientService->getWithRelation('address'))->resolve();

            return view('patient.list-patient', [
                'patients' => $patients
            ]);
        } catch (\Exception $e) {
            return ResponseBuilder::init()
            ->status(Response::HTTP_BAD_REQUEST)
            ->message($e->getMessage())
            ->build();
        }
    }

    public function show($id)
    {
        try {
            $patient = (object) PatientResource::make($this->patientService->getByIdAndWithRelations($id, ['address']))->resolve();

            return view('patient.update-patient', [
                'patient' => $patient
            ]);
        } catch (\Exception $e) {
            return ResponseBuilder::init()
                ->status(Response::HTTP_BAD_REQUEST)
                ->message($e->getMessage())
                ->build();
        }
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
     * @param PatientRequest $request
     */
    public function update(PatientRequest $request)
    {
        try {
            $data = $request->all();
            $request->validated();

            $this->patientService->update($data);
            $this->addressService->update($data);

            return ResponseBuilder::init()
                ->status(Response::HTTP_CREATED)
                ->message('Paciente Atualizado Com Sucesso')
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
                ->data(ViaCepResource::make($cep))
                ->status(Response::HTTP_CREATED)
                ->message(! isset($data['erro']) ? 'Endereço encontrado.' : 'Endereço não encontrado.')
                ->build();
        } catch (\Exception $e) {
            return ResponseBuilder::init()
                ->status(Response::HTTP_BAD_REQUEST)
                ->message($e->getMessage())
                ->build();
        }
    }
}

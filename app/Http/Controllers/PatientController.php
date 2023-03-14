<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Services\Patient\PatientServiceContracts;

class PatientController extends Controller
{
    /**
     * @var PatientServiceContracts
     */
    protected $patientService;

    /**
     * @param PatientServiceContracts $patientService
     */
    public function __construct(
        PatientServiceContracts $patientService
    ) {
        $this->patientService = $patientService;
    }

    public function view()
    {
        return view('patient.form-patient');
    }

    public function store(PatientRequest $request)
    {
        try {
            $validated = $request->validated();

            $patient = $this->patientService->store($validated);

            return $this->patientService->store($validated);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}

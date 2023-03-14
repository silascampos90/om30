<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function view()
    {
        return view('patient.form-patient');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}

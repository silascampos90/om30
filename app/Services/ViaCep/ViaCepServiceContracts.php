<?php

namespace App\Services\ViaCep;

interface ViaCepServiceContracts
{
    public function get(string $cep): mixed;
}

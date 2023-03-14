<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'mother_name' => $this->mother_name,
            'cpf' => $this->cpf,
            'cns' => $this->cns,
            'foto' => $this->foto,
            'cep' => $this->address->cep,
            'address' => $this->address->address,
            'complement' => $this->address->complement,
            'number' => $this->address->number,
            'district' => $this->address->district,
            'state' => $this->address->state,
            'city' => $this->address->city
        ];
    }
}

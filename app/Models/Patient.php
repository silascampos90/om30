<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mother_name',
        'cpf',
        'cns',
    ];

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'id', 'patient_id');
    }
}

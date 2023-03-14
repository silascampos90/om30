<?php

namespace App\Rules;

use App\Services\Cns\CnsServiceContracts;
use Illuminate\Contracts\Validation\Rule;

class ValidateCNS implements Rule
{
    /**
     * @var CnsServiceContracts
     */
    protected $cnsService;

    /**
     * @var string
     */
    protected $message;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(
        CnsServiceContracts $cnsService
    ) {
        $this->cnsService = $cnsService;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}

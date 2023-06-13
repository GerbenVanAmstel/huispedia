<?php

namespace App\Http\Requests;

use App\Enums\WoningOnderhoudEnum;
use App\Enums\WoningTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class GetWoningWaardeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'naam' => ['required', 'string'],
            'email' => ['required', 'email'],
            'postcode' => ['required', 'regex:/^(?:\d{4} ?[A-Z]{2})$/i'],
            'huisnummer' => ['required', 'string'],
            'woningtype' => ['required', new Enum(WoningTypeEnum::class)],
            'onderhoud' => ['required', new Enum(WoningOnderhoudEnum::class)],
            'woonoppervlakte' => ['required', 'numeric'],
            'perceeloppervlakte' => ['required', 'numeric'],
        ];
    }
}

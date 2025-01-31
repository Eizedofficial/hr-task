<?php

namespace App\Http\Requests\Account;

use App\Rules\Double;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property \double $value
 * @property string $description
 */
class AccountOperationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'value' => ['required', 'numeric', new Double(), 'min:0'],
            'description' => ['sometimes', 'string', 'max:255']
        ];
    }
}

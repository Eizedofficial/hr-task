<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\In;

/**
 * @property string $description
 * @property string $date_sort_order
 */
class UserTransactionsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'description' => ['sometimes', 'string', 'max:255'],
            'date_sort_order' => ['sometimes', 'string', new In('asc', 'desc')]
        ];
    }
}

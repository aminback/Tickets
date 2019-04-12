<?php

namespace App\Http\Requests;

use App\Rules\OpenTicketDescriptionRule;
use Illuminate\Foundation\Http\FormRequest;

class TicketUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'summary' => 'required|String',
            'description' => [new OpenTicketDescriptionRule]
        ];
    }
}

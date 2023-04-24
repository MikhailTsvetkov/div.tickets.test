<?php

namespace App\Http\Requests;

use App\Enums\TicketStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateTicketRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'admin_id' => 'required|integer',
            'status' => [new Enum(TicketStatusEnum::class)],
            'comment' => 'required_if:status,Resolved|string|max:1000',
        ];
    }
}

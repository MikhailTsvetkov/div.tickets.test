<?php

namespace App\Http\Requests;

use App\Enums\TicketDirectionEnum;
use App\Enums\TicketStatusEnum;
use App\Rules\TicketFieldsRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rules\Enum;

class IndexTicketRequest extends FormRequest
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
            'status' => [new Enum(TicketStatusEnum::class)],
            'created_at' => 'date',
            'updated_at' => 'date',
            'sort'  => [new TicketFieldsRule()],
            'direction'  => [new Enum(TicketDirectionEnum::class)],
            'offset'  => 'integer',
            'limit'  => 'integer',
        ];
    }

    /**
     * Set default values for sort options
     *
     * @return void
     */
    public function prepareForValidation()
    {
        $this->mergeIfMissing([
            'sort'  => 'created_at',
            'direction'  => 'asc',
            'offset'  => 0,
            'limit'  => 50,
        ]);
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}

<?php

namespace App\Http\Requests\ProducerController;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        // TODO
        return [
            'name' => ['required'],
            'company_name' => ['required'],
            'email' => ['required'],
            'tel' => ['required'],
            'postcode' => ['required'],
            'address' => ['required'],
        ];
    }

    /**
     * @return array
     */
    public function substitutable()
    {
        return $this->only([
            'name',
            'company_name',
            'email',
            'tel',
            'postcode',
            'address',
        ]);
    }
}

<?php

namespace App\Http\Requests\MortgageRent;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    protected function prepareForValidation(): array  
    {  
        $this->merge([  
            'mortgage_amount' => str_replace(',', '', $this->input('mortgage_amount')),  
            'rent_amount' => str_replace(',', '', $this->input('rent_amount')),  
        ]);  
    
        return $this->all();  
    }  
    public function rules(): array
    {
        return [
            'address' => 'string|required',
            'location_id' => 'required',
            'type_id' => 'required',
            'facilities' => 'required',
            'area' => 'required',
            'floor' => 'required',
            'num_rooms' => 'required',
            'door' => 'required',
            'parking' => 'required',
            'warehouse' => 'required',
            'tenant' => 'required',
            'location_text' => 'required',
            'mortgage_amount' => 'required',
            'rent_amount' => 'required',
            'customer' => 'required',
            'customer_mobile' => 'required',
            'status' => 'required',
            'description' => 'nullable',
        ];
    }
    public function validated($key = null, $default = null) {
        $validated = parent::validated();
        unset(
            $validated['facilities'],
        );

        return $validated;
    }
}

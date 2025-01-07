<?php

namespace App\Http\Requests\Selling;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
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
            'amount' => str_replace(',', '', $this->input('amount')),  
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
            'document' => 'required',
            'infrastructure' => 'required',
            'year_making' => 'required',
            'floor' => 'required',
            'num_rooms' => 'required',
            'parking' => 'required',
            'warehouse' => 'required',
            'location_text' => 'required',
            'amount' => 'required',
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

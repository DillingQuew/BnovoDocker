<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuestCreateRequest extends FormRequest
{
    protected $createRules = [
            'first_name' => "required|string|max:255",
            'last_name' => "required|string|max:255",
            'email' => "required|string|email|max:255|unique:guests,email",
            'phone' => "required|string|regex:/^\+[1-9]{1,4} [1-9]{3,4} [1-9]{3} [1-9]{2} [1-9]{2}$/|unique:guests,phone",
            'country' => "sometimes|string|max:255",
        ];

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
    public function rules(): array
    {
        $rules = $this->createRules;
        if (isset($this->guest->id)) {
            $rules['email'].=",".$this->guest->id;
            $rules['phone'].=",".$this->guest->id;
        }
        return $rules;
    }
}

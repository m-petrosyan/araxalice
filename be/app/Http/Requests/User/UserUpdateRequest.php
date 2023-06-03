<?php

namespace App\Http\Requests\User;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UserUpdateRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['nullable', 'min:2'],
            'email' => ['nullable', 'email', 'unique:users,email,' . auth()->id(), 'max:100'],
            'password_current' => [
                'nullable',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, auth()->user()->password)) {
                        $fail('Current Password is Wrong');
                    }
                },
            ],
            'password' => ['nullable', 'required_with:password_current', 'min:8'],
            'password_re' => ['nullable', 'required_with:password_current', 'same:password'],
        ];
    }
}

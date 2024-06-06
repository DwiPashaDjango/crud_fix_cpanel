<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => [
                'required', 'email', Rule::unique((new User)->getTable())->ignore($this->route()->user->id ?? null)
            ],
            'password' => [
                $this->route()->user ? 'nullable' : 'required', 'confirmed', 'min:6'
            ],
            'role' => [
                'required', 'min:3'
            ],
            'site1' => [
                'required', 'min:3'
            ],
            'site2' => [
                'required', 'min:3'
            ],
            'site3' => [
                'required', 'min:3'
            ],
            'site4' => [
                'required', 'min:3'
            ],
            'site5' => [
                'required', 'min:3'
            ],
            'site6' => [
                'required', 'min:3'
            ],
            'site7' => [
                'required', 'min:3'
            ],
            'site8' => [
                'required', 'min:3'
            ],
            'site9' => [
                'required', 'min:3'
            ],
            'site10' => [
                'required', 'min:3'
            ]
        ];
    }
}

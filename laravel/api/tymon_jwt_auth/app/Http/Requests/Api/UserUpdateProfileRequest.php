<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\User\UserGenderStatus;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\Rules\Password;

class UserUpdateProfileRequest extends FormRequest
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
    public function rules(): array
    {
        $userId = $this->user()->id;
        return [
            // 'first_name' => 'required|string|max:255',
            // 'last_name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            // 'city'         => 'required|string|max:255',
            // 'post_code'    => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email' . ($userId ? ",$userId" : ''),
            ],
        ];
    }
}

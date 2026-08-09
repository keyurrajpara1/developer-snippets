<?php
namespace App\Http\Requests\Api;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
class UserRequest extends FormRequest
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
    public function rules(): array
    {
        $userId = $this->route('id');
        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:191',
                'unique:users,email' . ($userId ? ",$userId" : ''),
            ],
            'password' => array_filter([
                $userId ? 'nullable' : 'required',
                'string',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols(),
            ]),
        ];
    }
}

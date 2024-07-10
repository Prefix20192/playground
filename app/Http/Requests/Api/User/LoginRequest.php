<?php

namespace App\Http\Requests\Api\User;

use App\DTO\User\LoginDTO;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'email' => ['required', 'email:rfc,dns'],
            'password' => ['required', 'string', 'min:8', 'max:255', 'confirmed'],
        ];
    }
    public function messages(): array
    {
        return [
            'email.required' => 'Поле Email обезательно',
            'password.required' => 'Поле Пароль обезательное',
            'password.string' => 'Поле Пароль должно быть в виде строки',
            'password.min' => 'Поле Пароль должно быть больше 8 символов',
            'password.max' => 'Поле Пароль не должно быть больше 255 символов',
            'password.confirmed' => 'Поле Пароль должно быть подтверждено',
        ];
    }

    public function toDTO(): LoginDTO
    {
        return new LoginDTO(
            email: $this->email,
            password: $this->password
        );
    }

    protected function failedValidation(Validator $validator): ValidationException
    {
        $response = new JsonResponse([
            'status' => 'Validation Error',
            'message' => $validator->errors(),
        ], 422);

        throw new ValidationException($validator, $response);
    }
}

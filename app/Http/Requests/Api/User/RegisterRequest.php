<?php

namespace App\Http\Requests\Api\User;

use App\DTO\User\RegisterDTO;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email:rfc,dns', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'max:255'],
            'surname' => ['required', 'string']
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Поле Имя обезательное',
            'name.string' => 'Поле Имя должно быть в виде строки',
            'email.required' => 'Поле Email обезательно',
            'email.unique' => 'Поле Email не должно повторяться',
            'password.required' => 'Поле Пароль обезательное',
            'password.string' => 'Поле Пароль должно быть в виде строки',
            'password.min' => 'Поле Пароль должно быть больше 8 символов',
            'password.max' => 'Поле Пароль не должно быть больше 255 символов',
            'surname.required' => 'Поле Фамилия обезательное',
            'surname.string' => 'Поле Фамилия должно быть в виде строки',
        ];
    }

    protected function failedValidation(Validator $validator): ValidationException
    {
        $response = new JsonResponse([
            'status' => 'Validation Error',
            'message' => $validator->errors(),
        ], 422);

        throw new ValidationException($validator, $response);
    }

    public function toDTO(): RegisterDTO
    {
        return new RegisterDTO(
            name: $this->name,
            email: $this->email,
            password: $this->password,
            surname: $this->surname
        );
    }
}

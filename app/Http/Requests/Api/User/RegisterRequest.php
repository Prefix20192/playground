<?php

namespace App\Http\Requests\Api\User;

use App\DTO\RegisterUserDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

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

    public function toDTO(): RegisterUserDTO
    {
        return new RegisterUserDTO(
            name: $this->name,
            email: $this->email,
            password: $this->password,
            surname: $this->surname
        );
    }
}

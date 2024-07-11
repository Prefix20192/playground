<?php

namespace App\Http\Requests\Api\User;

use App\DTO\User\ResetDTO;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class ResetPasswordRequest extends FormRequest
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
            'email' => [
                'required',
                'email:rfc,dns',
                 Rule::exists('users', 'email')->withoutTrashed()
            ],

            'token' => 'required',
            'password' => ['required', 'confirmed']
        ];
    }

    public function toDTO():ResetDTO
    {
        return new ResetDTO(
            email: $this->email,
            password: $this->password,
            token: $this->token
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

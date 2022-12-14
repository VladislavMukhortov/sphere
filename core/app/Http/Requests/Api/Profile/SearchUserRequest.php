<?php

namespace App\Http\Requests\Api\Profile;

use App\Http\Requests\Api\BaseRequest;
use App\Rules\PhoneOrEmail;

class SearchUserRequest extends BaseRequest
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
    public function rules()
    {
        return [
            'login' => ['required', 'string', new PhoneOrEmail()],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'login' => __('validation.attributes.login')
        ];
    }
}

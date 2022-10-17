<?php

namespace App\Http\Requests\Api;

use App\Models\Goal;
use Illuminate\Foundation\Http\FormRequest;

class StoreFeedbackRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Goal::where('id', $this->goal_id)
            ->where('user_id', $this->user_id)
            ->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'goal_id' => ['required', 'exists:goals,id'],
            'user_id' => ['required', 'exists:users,id'],
            'rank'    => ['required', 'integer', 'min:1', 'max:5'],
            'comment' => ['required', 'string', 'min:1', 'max:1000'],
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Domain\Event;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EventRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'days_of_week' => ['required', 'array'],
            'start_date' => ['required', 'date', 'before:end_date'],
            'end_date' => ['required', 'date', 'after:start_date']
        ];
    }

    public function payload()
    {
        return $this->only([
            'name',
            'days_of_week',
            'start_date',
            'end_date'
        ]);
    }
}

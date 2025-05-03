<?php

namespace App\Http\Requests;

use App\Domain\Enum\Priority;
use App\Domain\Enum\Status;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255','min:3'],
            'description' => ['nullable', 'string', 'max:5000', 'min:3'],
            'due_date' => ['nullable', 'date'],
            'priority' => 'in:' . implode(',', array_column(Priority::cases(), 'value')),
            'status' => 'in:' . implode(',', array_column(Status::cases(), 'value')),
            'list_id' => ['integer', 'exists:to_do_lists,id'],
        ];
    }
}

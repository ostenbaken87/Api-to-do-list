<?php

namespace App\Http\Requests\Task;

use App\Enums\Status;
use App\Dto\Task\TaskUpdateDto;
use Illuminate\Foundation\Http\FormRequest;

class TaskUpdateRequest extends FormRequest
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
            "title" => "sometimes|string|max:255",
            "description" => "nullable|string|max:255",
            "status" => "sometimes|in:" . implode(',', Status::values())
        ];
    }

    public function toDto(): TaskUpdateDto
    {
        return new TaskUpdateDto(
            $this->title,
            $this->description,
            $this->status ? Status::from($this->status) : null
        );
    }
}

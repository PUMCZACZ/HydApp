<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'         => ['required', 'max:255', 'min:1'],
            'lastname'     => ['required', 'max:255', 'min:1'],
            'phone_number' => ['required', 'max:255', 'min:1'],
        ];
    }

    public function toData(): array
    {
        return [
            'name'         => $this->input('name'),
            'lastname'     => $this->input('lastname'),
            'phone_number' => $this->input('phone_number'),
        ];
    }
}

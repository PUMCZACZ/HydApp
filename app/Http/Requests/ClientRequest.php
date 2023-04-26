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
            'name'         => ['string', 'required', 'max:255', 'min:1'],
            'lastname'     => ['string', 'required', 'max:255', 'min:1'],
            'phone_number' => ['string', 'required', 'max:255', 'min:1'],
            'email' => ['email'],
            'city' => ['string', 'min:1', 'max:50'],
            'street' => ['string', 'min:1'],
            'post_code' => ['string'],
        ];
    }
}

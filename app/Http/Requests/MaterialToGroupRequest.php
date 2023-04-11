<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class MaterialToGroupRequest extends FormRequest
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
            'quantity' => ['numeric', 'required'],
        ];
    }

    public function toData(): array
    {
        return [
            'quantity'          => $this->input('quantity'),
            'material_id'       => $this->input('material_id'),
            'material_group_id' => $this->input('material_group_id'),
        ];
    }
}

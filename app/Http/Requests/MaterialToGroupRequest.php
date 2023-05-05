<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class MaterialToGroupRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'quantity'          => ['numeric', 'required'],
            'material_id'       => ['required', 'integer', 'exists:materials,id'],
            'material_group_id' => ['required', 'integer', 'exists:material_groups,id'],
        ];
    }
}

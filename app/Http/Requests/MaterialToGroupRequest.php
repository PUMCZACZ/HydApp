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
            'quantity'    => ['numeric', 'required'],
        ];
    }

    public function toData(): array
    {
        return [
            'quantity'          => $this->input('quantity'),
            'material_id'       => $this->input('material_id'),
            'material_group_id' => $this->input('material_group_id'),
            'id'                => $this->input('id'),
        ];
    }
}

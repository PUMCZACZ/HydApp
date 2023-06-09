<?php
namespace App\Http\Requests;

use App\Models\Group;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class MaterialRequest extends FormRequest
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
            'material_name'  => ['required', 'string', 'max:255', 'min:1'],
            'purchase_price' => ['required', 'numeric', 'min:0.01'],
            'margin'         => ['required', 'numeric', 'min:0.01'],
            'material_code' => ['required', 'string', 'min:1'],
            'unit_si_id'        => ['required', 'integer', 'exists:unit_sis,id'],
        ];
    }

    private function refactorMargin(): float
    {
        return str_replace('/,/', '.', $this->input('margin')) / 100;
    }

    private function refactorPrice(): float
    {
        return str_replace('/,/', '.', $this->input('purchase_price'));
    }

    public function group(): ?Group
    {
        return Group::find($this->input('group_id'));
    }

    public function toData(): array
    {
        return [
            'material_name'  => $this->input('material_name'),
            'purchase_price' => $this->refactorPrice(),
            'margin'         => $this->refactorMargin(),
            'unit_si_id'        => $this->input('unit_si_id'),
            'material_code'  => $this->input('material_code'),
        ];
    }
}

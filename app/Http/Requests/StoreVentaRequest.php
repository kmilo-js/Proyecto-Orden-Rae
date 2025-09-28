<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVentaRequest extends FormRequest
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
        'Fecha_venta' => 'required|date',
        'Total_venta' => 'required|numeric|min:0',
        'Estado_venta' => 'nullable|string|in:completada,pendiente,cancelada',
        'pedido_id' => 'nullable|exists:pedido,ID_PEDIDO',
        'fidelizacion_id' => 'nullable|exists:fidelizacion,ID_FIDELIZACION',
        ];
    }
}

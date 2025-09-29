<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePedidoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'Fecha_de_compra'   => 'required|date',
            'Fecha_de_entrega'  => 'required|date|after_or_equal:Fecha_de_compra',
            'Metodo_pago'       => 'required|string|in:credito,efectivo,pago_movil,tarjeta,transferencia,voucher',
            'Total_de_pago'     => 'required|numeric|min:0',
            'Estado_pedido'     => 'required|string|in:En proceso,Cancelado,Devuelto,Entregado,Enviado,Pendiente',
            'ID_USUARIO'        => 'required|exists:usuarios,ID_USUARIO', // ⚠️ Corregido: tabla 'usuario', no 'usuarios'
            
            // ✅ Reemplazamos ID_PRODUCTO por productos (array)
            'productos'                     => 'required|array|min:1',
            'productos.*.producto_id'       => 'required|exists:producto,ID_PRODUCTO',
            'productos.*.cantidad'          => 'required|integer|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            // Fecha de compra
            'Fecha_de_compra.required'  => 'La fecha de compra es obligatoria.',
            'Fecha_de_compra.date'      => 'La fecha de compra debe tener un formato válido (AAAA-MM-DD).',

            // Fecha de entrega
            'Fecha_de_entrega.required' => 'La fecha de entrega es obligatoria.',
            'Fecha_de_entrega.date'     => 'La fecha de entrega debe tener un formato válido (AAAA-MM-DD).',
            'Fecha_de_entrega.after_or_equal' => 'La fecha de entrega no puede ser anterior a la fecha de compra.',

            // Método de pago
            'Metodo_pago.required'      => 'Por favor, selecciona un método de pago.',
            'Metodo_pago.string'        => 'El método de pago debe ser un texto válido.',
            'Metodo_pago.in'            => 'El método de pago seleccionado no es válido. Opciones permitidas: credito, efectivo, pago Móvil, tarjeta, transferencia o voucher.',

            // Total de pago
            'Total_de_pago.required'    => 'El total de pago es obligatorio.',
            'Total_de_pago.numeric'     => 'El total debe ser un número válido.',
            'Total_de_pago.min'         => 'El total no puede ser negativo.',

            // Estado del pedido
            'Estado_pedido.required'    => 'Por favor, selecciona el estado del pedido.',
            'Estado_pedido.string'      => 'El estado del pedido debe ser un texto válido.',
            'Estado_pedido.in'          => 'El estado solo puede ser: En proceso, Cancelado, Devuelto, Entregado, Enviado o Pendiente.',

            // Usuario
            'ID_USUARIO.required' => 'Debes seleccionar un usuario.',
            'ID_USUARIO.exists'   => 'El usuario seleccionado no es válido.',

            // Productos
            'productos.required'                => 'Debes agregar al menos un producto.',
            'productos.array'                   => 'El formato de productos no es válido.',
            'productos.min'                     => 'Debes agregar al menos un producto.',
            'productos.*.producto_id.required'  => 'Cada producto debe tener una selección válida.',
            'productos.*.producto_id.exists'    => 'Uno de los productos seleccionados no es válido.',
            'productos.*.cantidad.required'     => 'La cantidad es obligatoria para cada producto.',
            'productos.*.cantidad.integer'      => 'La cantidad debe ser un número entero.',
            'productos.*.cantidad.min'          => 'La cantidad debe ser al menos 1.',
        ];
    }
}
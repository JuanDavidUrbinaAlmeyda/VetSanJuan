@extends('layouts.navfoot')
@section('title')
    <title>Pago</title>
@endsection
@section('content')
<div class="container py-4">
    <h2 class="mb-4">Resumen de tu compra</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio unitario</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach ($carrito as $item)
                @php $subtotal = $item['cantidad'] * $item['precio']; $total += $subtotal; @endphp
                <tr>
                    <td>{{ $item['nombre'] }}</td>
                    <td>{{ $item['cantidad'] }}</td>
                    <td>${{ number_format($item['precio'], 2) }}</td>
                    <td>${{ number_format($subtotal, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4 class="mt-4">Total a pagar: <strong>${{ number_format($total, 2) }}</strong></h4>

    <form action="{{ route('pago.confirmar') }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre completo</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección de entrega</label>
            <input type="text" name="direccion" id="direccion" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono de contacto</label>
            <input type="tel" name="telefono" id="telefono" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="metodo_pago" class="form-label">Método de pago</label>
            <select name="metodo_pago" id="metodo_pago" class="form-select" required>
                <option value="tarjeta">Tarjeta de crédito</option>
                <option value="nequi">Nequi</option>
                <option value="daviplata">Daviplata</option>
            </select>
        </div>

        <input type="hidden" name="total" value="{{ $total }}">

        <button type="submit" class="btn btn-success w-100">Confirmar y pagar</button>
    </form>
</div>
@endsection

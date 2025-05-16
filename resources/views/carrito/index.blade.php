@extends('layouts.navfoot')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Carrito de Compras</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(count($carrito) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($carrito as $id => $item)
                    @php $total += $item['precio'] * $item['cantidad']; @endphp
                    <tr>
                        <td>{{ $item['nombre'] }}</td>
                        <td>{{ $item['cantidad'] }}</td>
                        <td>${{ number_format($item['precio'], 2) }}</td>
                        <td>${{ number_format($item['precio'] * $item['cantidad'], 2) }}</td>
                        <td>
                            <form action="{{ route('carrito.eliminar', $id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h4>Total: ${{ number_format($total, 2) }}</h4>
        <a href="{{ route('carrito.limpiar') }}" class="btn btn-warning">Vaciar Carrito</a>
        <a href="{{ route('pago.checkout') }}" class="btn btn-success">Ir a Pagar</a>
    @else
        <p>No hay productos en el carrito.</p>
    @endif
</div>
@endsection

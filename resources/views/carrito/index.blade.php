@extends('layouts.navfoot')

@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col">
            <h2 class="display-5 mb-4 fw-bold">Carrito de Compras</h2>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(count($carrito) > 0)
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Total</th>
                                <th class="text-end">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp
                            @foreach($carrito as $id => $item)
                                @php $total += $item['precio'] * $item['cantidad']; @endphp
                                <tr>
                                    <td class="fw-semibold">{{ $item['nombre'] }}</td>
                                    <td>{{ $item['cantidad'] }}</td>
                                    <td>${{ number_format($item['precio'], 2) }}</td>
                                    <td>${{ number_format($item['precio'] * $item['cantidad'], 2) }}</td>
                                    <td class="text-end">
                                        <form action="{{ route('carrito.eliminar', $id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger btn-sm">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card mt-4 shadow-sm">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h4 class="mb-0">Total: <span class="text-primary">${{ number_format($total, 2) }}</span></h4>
                    </div>
                    <div class="col-md-6 text-md-end mt-3 mt-md-0">
                        <a href="{{ route('carrito.limpiar') }}" class="btn btn-warning me-2">
                            <i class="fas fa-trash-alt"></i> Vaciar Carrito
                        </a>
                        <a href="{{ route('pago.formulario') }}" class="btn btn-primary" style="background-color: #003673">
                            <i class="fas fa-credit-card"></i> Proceder al Pago
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="card shadow-sm">
            <div class="card-body text-center py-5">
                <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
                <p class="lead mb-0">No hay productos en el carrito.</p>
                <a href="{{ route('shop') }}" class="btn btn-primary mt-3">Continuar Comprando</a>
            </div>
        </div>
    @endif
</div>
@endsection

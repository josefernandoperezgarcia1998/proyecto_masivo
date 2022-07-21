@extends('layouts.general')

@push('css')

@endpush

@section('title_page','Actualizar')

@section('content_page')
<div class="container shadow p-3 mb-5 bg-body rounded">
    <form action="{{ route('licencias.update', $licencia) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="modificar">
                <label class="form-check-label" for="modificar">
                    Resetear datos
                </label>
            </div>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de la persona</label>
            <input type="text" class="form-control" id="nombre" name="nombre"
                value="{{ old('nombre', $licencia->nombre) }}" autocomplete="off">
            @error('nombre')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="correo" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="correo" name="correo"
                value="{{ old('correo', $licencia->correo) }}" autocomplete="off">
            @error('correo')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono"
                value="{{ old('telefono', $licencia->telefono) }}" autocomplete="off">
            @error('telefono')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="licencia" class="form-label">Licencia</label>
            <select class="form-select w-50" name="licencia" id="licencia">
                <option value="" selected>Selecciona una licencia</option>
                <option
                    {{ old('licencia') == 'Básica' ? 'selected' : ($licencia->licencia == 'Básica' ? 'selected' : '') }}
                    value="Básica">Básica</option>
                <option
                    {{ old('licencia') == 'Premium' ? 'selected' : ($licencia->licencia == 'Premium' ? 'selected' : '') }}
                    value="Premium">Premium</option>
            </select>
            @error('licencia')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="text" class="form-control" id="cantidad" name="cantidad"
                value="{{ old('cantidad', $licencia->cantidad) }}" autocomplete="off">
            @error('cantidad')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="subtotal" class="form-label">Subtotal</label>
            <input type="text" class="form-control" id="subtotal" name="subtotal"
                value="{{ old('subtotal', $licencia->subtotal) }}" autocomplete="off" readonly>
            @error('subtotal')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="iva" class="form-label">IVA</label>
            <input type="text" class="form-control" id="iva" name="iva" value="{{ old('iva', $licencia->iva) }}"
                autocomplete="off" readonly>
            @error('iva')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="total" class="form-label">Total</label>
            <input type="text" class="form-control" id="total" name="total" value="{{ old('total', $licencia->total) }}"
                autocomplete="off" readonly>
            @error('total')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select class="form-select w-50" name="estado" id="estado">
                <option value="" selected>Selecciona un estado</option>
                <option {{ old('estado') == 'Pagado' ? 'selected' : ($licencia->estado == 'Pagado' ? 'selected' : '') }}
                    value="Pagado">Pagado</option>
                <option
                    {{ old('estado') == 'No pagado' ? 'selected' : ($licencia->estado == 'No pagado' ? 'selected' : '') }}
                    value="No pagado">No pagado</option>
            </select>
            @error('estado')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary" id="update_data">Actualizar</button>
        <a href="{{ route('licencias.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    var valores = [];
    valores[0] = $('#nombre').val();
    valores[1] = $('#correo').val();
    valores[2] = $('#telefono').val();
    valores[3] = $('#licencia').val();
    valores[4] = $('#cantidad').val();
    valores[5] = $('#subtotal').val();
    valores[6] = $('#iva').val();
    valores[7] = $('#total').val();
    valores[8] = $('#estado').val();
    console.log({valores});

    // Variables
    const precio_basico = 1199,
        precio_premium = 1799,
        iva_portentaje = 0.16;

    $(document).ready(function () {
        //set initial state.
        $('#modificar').val(this.checked);

        $('#modificar').change(function () {
            if (this.checked) {
                $(this).prop("checked");
                console.log('check');
                $('#cantidad').val('');
                $('#iva').val('');
                $('#subtotal').val('');
                $('#total').val('');
                hello;
            } else {
                $('#nombre').val(valores[0]);
                $('#correo').val(valores[1]);
                $('#telefono').val(valores[2]);
                $('#licencia').val(valores[3]);
                $('#cantidad').val(valores[4]);
                $('#subtotal').val(valores[5]);
                $('#iva').val(valores[6]);
                $('#total').val(valores[7]);
                $('#estado').val(valores[8]);
            }
        });
    });
var hello;
    hello = $("#licencia").change(function () {
                    var licencia = $("#licencia").val();
                    console.log(licencia);
                    if (licencia == "Básica") {
                        console.log('Licencia básica');
                        $('#cantidad').keyup(function () {

                            var nuevo_valor = $(this).val();
                            var importe_total = 0;

                            $("#cantidad").each(
                                function (index, value) {
                                    if ($.isNumeric($(this).val())) {
                                        importe_total += parseInt($(this).val());
                                    }
                                }
                            );

                            // Obteniendo la cantidad
                            console.log('Cantidad: ' + importe_total);

                            // Obteniendo el subtotal
                            $("#subtotal").val(importe_total * precio_basico);
                            let cantUni = $("#subtotal").val();
                            console.log('subtotal: ' + cantUni);

                            // Obteniendo el iva
                            $("#iva").val(cantUni * iva_portentaje);
                            let iva = $("#iva").val();
                            console.log('iva: ' + iva);

                            let ivaInt = parseFloat(iva);
                            let cantUniInt = parseFloat(cantUni);
                            $("#total").val(ivaInt + cantUniInt);
                            let total = $("#total").val();
                            console.log('total: ' + total);

                            // $("#total").val(totalProducto);
                        });
                    } else if (licencia == "Premium") {
                        console.log('Licencia premium');
                        $('#cantidad').keyup(function () {

                            var nuevo_valor = $(this).val();
                            var importe_total = 0;

                            $("#cantidad").each(
                                function (index, value) {
                                    if ($.isNumeric($(this).val())) {
                                        importe_total += parseInt($(this).val());
                                    }
                                }
                            );

                            // Obteniendo la cantidad
                            console.log('Cantidad: ' + importe_total);

                            // Obteniendo el subtotal
                            $("#subtotal").val(importe_total * precio_premium);
                            let cantUni = $("#subtotal").val();
                            console.log('subtotal: ' + cantUni);

                            // Obteniendo el iva
                            $("#iva").val(cantUni * iva_portentaje);
                            let iva = $("#iva").val();
                            console.log('iva: ' + iva);

                            // Convirtiendo a flotantes los numeros y mostrando el total
                            let ivaInt = parseFloat(iva);
                            let cantUniInt = parseFloat(cantUni);
                            $("#total").val(ivaInt + cantUniInt);
                            let total = $("#total").val();
                            console.log('total: ' + total);
                        });
                    } else {
                        console.log('sin seleccionar');
                    }
                });

</script>
@endpush

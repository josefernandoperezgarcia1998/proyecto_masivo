@extends('layouts.masivo-general')

@section('leyenda')
    ¡Adquiere tu licencia!
@endsection

@section('leyenda_desc')
Los beneficios que contiene el software te llevará un nivel arriba de las demás empresas.
@endsection

@section('section')
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-lg-8 col-xl-6 text-center">
            <h2 class="mt-0">FORMULARIO</h2>
            <hr class="divider">
            <p class="text-muted mb-5">Completa los siguientes campos</p>
        </div>
    </div>
    <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
        <div class="col-lg-6">
            <!-- * * * * * * * * * * * * * * *-->
            <!-- * * SB Forms Contact Form * *-->
            <!-- * * * * * * * * * * * * * * *-->
            <!-- This form is pre-integrated with SB Forms.-->
            <!-- To make this form functional, sign up at-->
            <!-- https://startbootstrap.com/solution/contact-forms-->
            <!-- to get an API token!-->
            <form action="{{ route('licencias.storePublic') }}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- Name input-->
                <div class="form-floating mb-3">
                    <input class="form-control" id="nombre" type="text" placeholder="Ingresa tu nombre" data-sb-validations="required" autocomplete="off" data-sb-can-submit="no" name="nombre" value="{{ old('nombre') }}">
                    <label for="name" class="text-dark">Nombre de la persona</label>
                    <div class="invalid-feedback" data-sb-feedback="name:required">Nombre es requerido.</div>
                    @error('nombre')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <!-- Email address input-->
                <div class="form-floating mb-3">
                    <input class="form-control" id="email" type="email" placeholder="nombre@example.com" data-sb-validations="required,email" autocomplete="off" data-sb-can-submit="no" name="correo" value="{{ old('correo') }}">
                    <label for="email" class="text-dark">Correo electrónico</label>
                    @error('correo')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="invalid-feedback" data-sb-feedback="email:required">Correo es requerido.</div>
                    <div class="invalid-feedback" data-sb-feedback="email:email">Correo no es válido.</div>
                </div>
                <!-- Phone number input-->
                <div class="form-floating mb-3">
                    <input class="form-control" id="phone" type="tel" placeholder="9611234567" data-sb-validations="required" data-sb-can-submit="no" name="telefono" value="{{ old('telefono') }}">
                    <label for="phone" class="text-dark">Teléfono</label>
                    @error('telefono')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="invalid-feedback" data-sb-feedback="phone:required">Teléfono es requerido.</div>
                </div>
                <!-- Cantidad input-->
                <div class="form-floating mb-3">
                    <select class="form-select" name="licencia" id="licencia" data-sb-validations="required" data-sb-can-submit="no">
                        <option value="" selected>Selecciona una licencia</option>
                        <option {{ old('licencia') == 'Básica' ? 'selected' : '' }} value="Básica">Básica</option>
                        <option {{ old('licencia') == 'Premium' ? 'selected' : '' }} value="Premium">Premium</option>
                    </select>
                    @error('licencia')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <label for="Licencia" class="text-dark">Licencia</label>
                    <div class="invalid-feedback" data-sb-feedback="phone:required">Cantidad es requerido.</div>
                </div>
                <!-- Subtotal input-->
                <div class="form-floating mb-3">
                    <input class="form-control" id="cantidad" type="text" placeholder="1" autocomplete="off" name="cantidad" value="{{ old('cantidad') }}">
                    <label for="cantidad" class="text-dark">Cantidad</label>
                    @error('cantidad')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <!-- Subtotal input-->
                <div class="form-floating mb-3">
                    <input class="form-control" id="subtotal" type="text" placeholder="1" autocomplete="off" readonly name="subtotal">
                    <label for="subtotal" class="text-dark">Subtotal</label>
                </div>
                <!-- Iva input-->
                <div class="form-floating mb-3">
                    <input class="form-control" id="iva" type="text" placeholder="1" autocomplete="off" readonly name="iva">
                    <label for="iva" class="text-dark">IVA</label>
                </div>
                <!-- Total input-->
                <div class="form-floating mb-3">
                    <input class="form-control" id="total" type="text" placeholder="1" autocomplete="off" readonly name="total">
                    <label for="total" class="text-dark">Total</label>
                </div>
                <!-- Submit Button-->
                <div class="d-grid"><button class="btn btn-primary btn-xl" type="submit">Siguiente</button></div>
            </form>
        </div>
    </div>
</div>
@endsection


@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    // Variables
    const precio_basico = 1199,
        precio_premium = 1799,
        iva_portentaje = 0.16;

    $("#licencia").change(function () {
        var licencia = $("#licencia").val();
        // console.log(licencia);
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

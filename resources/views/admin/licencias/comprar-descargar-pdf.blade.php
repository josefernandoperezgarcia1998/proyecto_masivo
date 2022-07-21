@extends('layouts.masivo-general')

@section('leyenda')
    ¡MUY BIEN!
@endsection

@section('leyenda_desc')
Desliza hacia abajo para descargar el PDF y hacer el pago de tu licencia.
@endsection

@section('section')
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-lg-8 col-xl-6 text-center">
            <h2 class="mt-0">FORMULARIO</h2>
            <hr class="divider">
            <p class="text-muted mb-5">Tus datos para adquirir el producto son los siguientes</p>
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
                    <input class="form-control" id="nombre" type="text" placeholder="Ingresa tu nombre" data-sb-validations="required" autocomplete="off" data-sb-can-submit="no" name="nombre"  value="{{ old('nombre', $datosLicencia->nombre) }}" readonly>
                    <label for="name" class="text-dark">Nombre de la persona</label>
                    <div class="invalid-feedback" data-sb-feedback="name:required">Nombre es requerido.</div>
                    @error('nombre')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <!-- Email address input-->
                <div class="form-floating mb-3">
                    <input class="form-control" id="email" type="email" placeholder="nombre@example.com" data-sb-validations="required,email" autocomplete="off" data-sb-can-submit="no" name="correo" value="{{ old('correo', $datosLicencia->correo) }}" readonly>
                    <label for="email" class="text-dark">Correo electrónico</label>
                    @error('correo')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="invalid-feedback" data-sb-feedback="email:required">Correo es requerido.</div>
                    <div class="invalid-feedback" data-sb-feedback="email:email">Correo no es válido.</div>
                </div>
                <!-- Phone number input-->
                <div class="form-floating mb-3">
                    <input class="form-control" id="phone" type="tel" placeholder="9611234567" data-sb-validations="required" data-sb-can-submit="no" name="telefono" value="{{ old('telefono', $datosLicencia->telefono) }}" readonly>
                    <label for="phone" class="text-dark">Teléfono</label>
                    @error('telefono')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="invalid-feedback" data-sb-feedback="phone:required">Teléfono es requerido.</div>
                </div>
                <!-- Cantidad input-->
                <div class="form-floating mb-3">
                    <input class="form-control" id="licencia" type="text" placeholder="licencia" data-sb-validations="required" data-sb-can-submit="no" name="licencia" value="{{ old('licencia', $datosLicencia->licencia) }}" readonly>
                    @error('licencia')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <label for="Licencia" class="text-dark">Licencia</label>
                    <div class="invalid-feedback" data-sb-feedback="phone:required">Cantidad es requerido.</div>
                </div>
                <!-- Subtotal input-->
                <div class="form-floating mb-3">
                    <input class="form-control" id="cantidad" type="text" placeholder="1" autocomplete="off" name="cantidad" value="{{ old('cantidad', $datosLicencia->cantidad) }}" readonly>
                    <label for="cantidad" class="text-dark">Cantidad</label>
                    @error('cantidad')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <!-- Subtotal input-->
                <div class="form-floating mb-3">
                    <input class="form-control" id="subtotal" type="text" placeholder="1" autocomplete="off" readonly name="subtotal" value="{{ old('subtotal', $datosLicencia->subtotal) }}">
                    <label for="subtotal" class="text-dark">Subtotal</label>
                </div>
                <!-- Iva input-->
                <div class="form-floating mb-3">
                    <input class="form-control" id="iva" type="text" placeholder="1" autocomplete="off" readonly name="iva" value="{{ old('iva', $datosLicencia->iva) }}">
                    <label for="iva" class="text-dark">IVA</label>
                </div>
                <!-- Total input-->
                <div class="form-floating mb-3">
                    <input class="form-control" id="total" type="text" placeholder="1" autocomplete="off" readonly name="total" value="{{ old('total', $datosLicencia->total) }}">
                    <label for="total" class="text-dark">Total</label>
                </div>
                <!-- Submit Button-->
                <div class="d-grid">    
                    {{-- Botón para descargar cita registrada en un PDF según el id --}}    
                    <a href="{{ route('licencias.cita.pdf-download', $datosLicencia->id) }}" class="btn btn-primary btn-xl"><i
                        class="material-icons">Descargar PDF</i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@push('js')

@endpush

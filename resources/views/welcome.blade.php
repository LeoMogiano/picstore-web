@extends('layouts.user_type.guest')

@section('content')

    <body class="bg-gradient-primary">
        <br>
        <br>
        <div class="container-fluid ">
            <div class="row justify-content-center mt-5">
                <div class="col-lg-10 col-md-12">
                    <div class="card h-100 shadow border-0 text-center">
                        <div style="display: flex; justify-content: center ">
                            <h1 class="display-5 font-weight-bold">¡Bienvenido a PicStore!&nbsp; </h1>
                            <img style="width: 60px; height: 60px;" src="{{ asset('img/fav.png') }}" alt="">
                        </div>
                        <p class="lead">¡Captura y comparte tus mejores momentos!</p>
                        <p class="lead">Gestiona y vende tus fotos de eventos o adquiere las fotografías de tus recuerdos.
                        </p>
                        <br>

                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center mt-5">
                <div class="col-lg-10 col-md-12">
                    <div class="card h-100 shadow border-0">
                        <div class="row no-gutters">
                            <div class="col-md-6 d-flex align-items-center justify-content-center">
                                <div class="card-body text-center">
                                    <h2 class="font-weight-bold">¡Tus recuerdos más especiales en un solo lugar!</h2>
                                    <p class="lead">Las fotos de tus eventos están seguras con nosotros. Gestiona, vende o
                                        adquiere tus fotografías en un abrir y cerrar de ojos.</p>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <img src="{{ asset('img/welcome-foto.png') }}" alt="Imagen de suscripción" class="card-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-lg-10 col-md-12">
                <div class="row">

                    @foreach ($suscrips as $sus)
                        <div class="col-lg-4 col-md-4">
                            <div class="card  shadow border-0" style="height: 30rem;">
                                <div class="card-body text-center">
                                    <h5 class="card-title mb-4">Plan {{ $sus->nombre }}</h5>
                                    <div class="d-flex justify-content-center mb-4">
                                        <img width="100px" src="{{ asset($sus->logo) }}" alt="Logo" class="logo-image">
                                    </div>
                                    <h3 class="card-price">${{ $sus->precio }}/mes</h3>
                                    <p class="card-text font-weight-bold mb-3">Funciones básicas</p>
                                    <ul class="list-unstyled text-start" style="margin-left: 35px">
                                        @foreach ($sus->funciones as $func)
                                            <li class="mb-2">- {{ $func }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="col-lg-4 col-md-4">
                        <div class="card h-100 shadow border-0">
                            <div class="card-body text-center">
                                <h5 class="card-title">Plan Pro</h5>
                                <h3 class="card-price">$19.99/mes</h3>
                                <p class="card-text">Funciones avanzadas</p>
                                <ul class="list-unstyled">
                                    <li>Característica 1</li>
                                    <li>Característica 2</li>
                                    <li>Característica 3</li>
                                    <!-- Agrega más características aquí -->
                                </ul>
                                <a href="#" class="btn bg-gradient-dark btn-block">Seleccionar</a>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="col-lg-4 col-md-4">
                        <div class="card h-100 shadow border-0">
                            <div class="card-body text-center">
                                <h5 class="card-title">Plan Premium</h5>
                                <h3 class="card-price">$29.99/mes</h3>
                                <p class="card-text">Funciones premium</p>
                                <ul class="list-unstyled">
                                    <li>Característica 1</li>
                                    <li>Característica 2</li>
                                    <li>Característica 3</li>
                                    <!-- Agrega más características aquí -->
                                </ul>
                                <a href="#" class="btn bg-gradient-dark btn-block">Seleccionar</a>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <p class="text-center mt-4"><small><em>* Una vez registrado, debera añadir su tarjeta a su perfil, para
                            desbloquear las funciones.</em></small></p>
            </div>
        </div>
        </div>

    </body>
@endsection

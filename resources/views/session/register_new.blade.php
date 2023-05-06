@extends('layouts.user_type.guest')

@section('content')
    <section class="min-vh-100 mb-8">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-10 mx-3 border-radius-lg"
            style="background-image: url('../assets/img/background-register2.jpg');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">Bienvenido!</h1>
                        <p class="text-lead text-white">Elige la mejor suscripción que satisfasga tus necesidades!</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card z-index-0">
                        <div class="card-header text-center pt-4 pb-2">
                            <h5>Selecciona tu suscripción:</h5>
                        </div>
                        <div class="card-body">
                            <form action="/register" method="post">
                                @csrf
                               
                                <div class="btn-group p-1 pt-0 pb-0" data-toggle="buttons">
                                    <label class="btn btn-outline-light">
                                        <input type="radio" name="rol" autocomplete="off" value="Organizador" checked 
                                            class="subscription-option">
                                        <div class="d-flex flex-column text-dark tex align-items-center">
                                            <span style="font-size: 11px">Organizador</span>
                                            <div
                                                style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap">
                                                <span style="font-size: 20px; padding-right: 5px">$6 </span>
                                                <img style="width: 30x; height: 30px; "
                                                    src="{{ asset('storage/img/organizador.png') }}" alt=""
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                    </label>
                                    <label class="btn btn-outline-light">
                                        <input type="radio" name="rol" autocomplete="off" value="Fotografo" class="subscription-option">
                                        <div class="d-flex flex-column text-dark tex align-items-center">
                                            <span style="font-size: 11px">Fotógrafo</span>
                                            <div
                                                style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap">
                                                <span style="font-size: 20px; padding-right: 5px">$9 </span>
                                                <img style="width: 30x; height: 30px; "
                                                    src="{{ asset('storage/img/fotografo.png') }}" alt=""
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                    </label>
                                    <label class="btn btn-outline-light">
                                        <input type="radio" name="rol" autocomplete="off" value="Invitado" class="subscription-option">
                                        <div class="d-flex flex-column text-dark tex align-items-center">
                                            <span style="font-size: 11px">Invitado</span>
                                            <div
                                                style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap">
                                                <span style="font-size: 20px; padding-right: 5px">$0 </span>
                                                <img style="width: 30x; height: 30px; "
                                                    src="{{ asset('storage/img/invitado.png') }}" alt=""
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input type="text" name="name" id="name" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Correo electrónico</label>
                                        <input type="email" name="email" id="email" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Contraseña</label>
                                        <input type="password" name="password" id="password" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="form-control bg-gradient-dark text-light">Registrarse</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

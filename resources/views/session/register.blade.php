@extends('layouts.user_type.guest')

@section('content')
    <section class="min-vh-100 mb-8">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-10 mx-3 border-radius-lg"
            style="background-image: url('../img/background-register2.jpg');">
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
                    <div class="card z-index-0 flex-wrap">
                        <div class="card-header text-center pt-4 pb-2">
                            <h5>Selecciona tu suscripción:</h5>
                        </div>
                        <div class="card-body ">
                            <form action="/register" method="post" enctype="multipart/form-data">
                                @csrf



                                <div class="btn-group p-1 pt-0 pb-0 flex-wrap" data-toggle="buttons">
                                    @foreach ($suscrips as $sus)
                                        <label class="btn btn-outline-light">
                                            <input type="radio" name="rol" autocomplete="off" checked
                                                class="subscription-option" value="{{ $sus->nombre }}">
                                            <div class="d-flex flex-column text-dark tex align-items-center">
                                                <span style="font-size: 11px">{{ $sus->nombre }}</span>
                                                <div
                                                    style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap">
                                                    <span
                                                        style="font-size: 20px; padding-right: 5px">${{ number_format($sus->precio, $sus->precio == (int) $sus->precio ? 0 : 2) }}
                                                    </span>
                                                    <img style="width: 30x; height: 30px; " src="{{ asset($sus->logo) }}"
                                                        alt="" class="img-fluid">
                                                </div>
                                            </div>
                                        </label>
                                    @endforeach
                                    
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
                                        <label for="numero">Numero de Tarjeta</label>
                                        <input type="number" name="numero" id="numero" class="form-control" required>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ccv">CVV</label>
                                                <input type="number" name="cvc" id="cvc" class="form-control" maxlength="3" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fecha">Fecha de Vencimiento</label>
                                                <input type="date" name="fecha_v" id="password" class="form-control" required>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="photo1">Foto de Perfil</label>
                                                <input type="file" class="form-control" id="photo1" name="photo1" required>
                                               
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="photo2">FotoDetección Facial</label>
                                                <input type="file" class="form-control" id="photo2" name="photo2" required>
                                                
                                            </div>
                                        </div>
                                        
                                    </div>

                                    

                                    
                                    <div class="form-group">
                                        <button type="submit"
                                            class="form-control bg-gradient-dark text-light">Registrarse</button>
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

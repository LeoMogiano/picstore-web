@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="container-fluid p-0">
            <div class="page-header min-height-300 border-radius-xl mt-0"
                style="background-image: url('../img/portada_gen.jpg'); background-position-y: 40%; background-size: cover;">
                {{--  <span class="mask bg-gradient-primary opacity-6"></span> --}}
            </div>
            <div class="card card-body blur shadow-blur mx-4 mt-n6">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="col-auto">
                            <div class="avatar avatar-xl position-relative" onclick="toggleCentered(event)">
                                <img src="{{ Auth::user()->photo1 ?? asset('img/fav.jpg') }}" alt="..."
                                    class="w-100 h-100 border-radius-lg shadow-sm"
                                    style="cursor: pointer; object-fit: cover">
                            </div>
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{ auth()->user()->name }}
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                {{ auth()->user()->rol }}
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="container-fluid py-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">Información de Perfil</h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <form action="/user-profile" method="POST" role="form text-left" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
                            <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                                <span class="alert-text text-white">
                                    {{ $errors->first() }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <i class="fa fa-close" aria-hidden="true"></i>
                                </button>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="m-3  alert alert-info alert-dismissible fade show" id="myAlert1" role="alert">
                                <span class="alert-text text-white">
                                    {{ session('success') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <i class="fa fa-close" aria-hidden="true"></i>
                                </button>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-name" class="form-control-label">Nombre Completo</label>
                                    <div class="@error('user.name')border border-danger rounded-3 @enderror">
                                        <input class="form-control" value="{{ auth()->user()->name }}" type="text"
                                            placeholder="Nombre" id="user-name" name="name">
                                        @error('name')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-email" class="form-control-label">{{ __('Email') }}</label>
                                    <div class="@error('email')border border-danger rounded-3 @enderror">
                                        <input class="form-control" value="{{ auth()->user()->email }}" type="email"
                                            placeholder="@example.com" id="user-email" name="email">
                                        @error('email')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-ci" class="form-control-label">Carnet de Identidad</label>
                                    <div class="@error('ci')border border-danger rounded-3 @enderror">
                                        <input class="form-control" value="{{ auth()->user()->ci }}" type="text"
                                            placeholder="6287905 SC" id="user-ci" name="ci">
                                        @error('ci')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-password" class="form-control-label">Nueva Contraseña</label>
                                    <div class="@error('user.password')border border-danger rounded-3 @enderror">
                                        <input class="form-control" value="" type="password" placeholder="Contraseña"
                                            id="user-password" name="password">
                                        @error('password')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user.phone" class="form-control-label">Celular</label>
                                    <div class="@error('user.phone')border border-danger rounded-3 @enderror">
                                        <input class="form-control" type="tel" placeholder="40770888444"
                                            id="number" name="phone" value="{{ auth()->user()->phone }}">
                                        @error('phone')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user.location" class="form-control-label">Dirección</label>
                                    <div class="@error('user.location') border border-danger rounded-3 @enderror">
                                        <input class="form-control" type="text" placeholder="Tu Ubicación"
                                            id="name" name="location" value="{{ auth()->user()->location }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="about">Sobre Mi</label>
                            <div class="@error('user.about')border border-danger rounded-3 @enderror">
                                <textarea class="form-control" id="about" rows="3" placeholder="Di algo sobre ti" name="about_me">{{ auth()->user()->about_me }}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="photo1">Foto de Perfil</label>
                                    <input type="file" class="form-control" id="photo1" name="photo1">
                                    @error('photo1')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="photo2">Foto para Reconocimiento Facial IA</label>
                                    <input type="file" class="form-control" id="photo2" name="photo2">
                                    @error('photo2')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">

                                <div class="avatar avatar-xxl position-relative " style="margin-left: 1.5rem"
                                    onclick="toggleCentered(event)">
                                    <img src="{{ auth()->user()->photo2 }}" alt="..."
                                        class="w-300 height-100 border-radius-lg shadow-sm"
                                        style="cursor: pointer; object-fit: cover">

                                </div>

                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-2">GUARDAR</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        @if (Auth::user()->rol == 'Fotografo')
            <div class="container-fluid py-4">
                <div class="card">
                    <div class="d-flex justify-content-between m-3" style="margin-right: 6px; position: relative; ">
                        <div class="col-xl-3 col-sm-4 " style="width: 15rem;">
                            <div class="card">
                                <div class="card p-3">
                                    <div class="row">

                                        <div class="col-7">
                                            <div class="numbers mt-1">
                                                <h5 class="font-weight-bolder mb-0">
                                                    Portafolio
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="col-5 text-end">
                                            <div
                                                class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md icon-sm">
                                                <i class="fas fa-briefcase text-xs opacity-10" aria-hidden="true"
                                                    style="color: #ffff;"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-2 text-end" style="display: flex; justify-content: flex-end;">
                            <form action="{{ route('portafolios.store') }}" method="POST" role="form text-left"
                                enctype="multipart/form-data" style="flex: 1; order: 2;">
                                @csrf
                                <input type="file" id="seleccionarFoto1" name="foto" style="display:none;"
                                    required>
                                <button type="submit" class="btn bg-gradient-dark btn-md "
                                    style="width: 100%; height: 50px;">Guardar</button>
                            </form>
                            <button onclick="document.getElementById('seleccionarFoto1').click();"
                                class="btn bg-gradient-dark btn-md" style="margin-right: 10px; order: 1;"><b>+</b> Foto
                            </button>
                        </div>

                    </div>
                    <div class="row">
                        @foreach ($portafolios as $portafolio)
                            <div class="col-md-4">
                                <div class="card" style="overflow: hidden; margin: 15px;">
                                    <img src="{{ $portafolio->foto }}" alt="Imagen de la carta" class="card-img"
                                        style="width: 100%; height: 300px; object-fit: cover; cursor: pointer;"
                                        onclick="toggleCentered(event)">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </div>
    @endif

    @if (Auth::user()->rol == 'Invitado')
        <div class="container-fluid py-4">
            <div class="card">
                <div class="d-flex justify-content-between m-3" style="margin-right: 6px; position: relative; ">
                    <div class="col-xl-3 col-sm-4 " style="width: 21.6rem;">
                        <div class="card">
                            <div class="card p-3">
                                <div class="row">

                                    <div class="col-7">
                                        <div class="numbers mt-1">
                                            <h5 class="font-weight-bolder mb-0">
                                                Fotos Compradas
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-5 text-end">
                                        <div
                                            class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md icon-sm">
                                            <i class="fas fa-image text-xs opacity-10" aria-hidden="true"
                                                style="color: #ffff;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-2 text-end" style="display: flex; justify-content: flex-end;">
                        <form action="{{ route('portafolios.store') }}" method="POST" role="form text-left"
                            enctype="multipart/form-data" style="flex: 1; order: 2;">
                            @csrf
                            <input type="file" id="seleccionarFoto1" name="foto" style="display:none;" hidden>
                            <button type="submit" class="btn bg-gradient-dark btn-md "
                                style="width: 100%; height: 50px;" hidden>Guardar</button>
                        </form>
                        <button onclick="document.getElementById('seleccionarFoto1').click();"
                            class="btn bg-gradient-dark btn-md" style="margin-right: 10px; order: 1;" hidden><b>+</b> Foto
                        </button>
                    </div>

                </div>
                <div class="row">
                    @foreach ($fotous as $fotou)
                        @foreach ($fotos as $foto)
                            @if ($fotou->foto_id == $foto->id and $fotou->estado == 'Comprado')
                                <div class="col-md-4">
                                    <div class="card" style="overflow: hidden; margin: 15px;">
                                        <img src="{{ $foto->foto }}" alt="Imagen de la carta" class="card-img"
                                            style="width: 100%; height: 300px; object-fit: cover; cursor: pointer;"
                                            onclick="toggleCentered(event)">
                                        <a href="{{ route('download', ['url' => $foto->foto]) }}">
                                            <button class="btn bg-gradient-dark btn-md mt-4 mb-2" style="position: absolute; bottom: 0px; right: 0px;">Descargar</button>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>

            </div>
        </div>
        </div>
    @endif



    <div id="overlay" class="overlay" style="display: none;">
        <div class="close-button" onclick="toggleCentered()">x</div>
        <img id="overlay-image" src="" alt="Imagen Ampliada">
    </div>
    {{-- REUTILIZABLE --}}
    <style>
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            justify-content: center;
            align-items: center;
        }

        .overlay img {
            border-radius: 10px;
            max-width: 90%;
            max-height: 90%;
        }

        .overlay .close-button {
            position: absolute;
            top: 2rem;
            right: 5rem;
            color: #fff;
            font-size: 24px;
            cursor: pointer;
            background-color: #000;
            width: 2rem;
            height: 2rem;
            padding-bottom: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 0.4rem;
        }

    </style>





    <script>
        function toggleCentered(event) {
            const overlay = document.querySelector('.overlay');
            const overlayImage = overlay.querySelector('#overlay-image');

            // Si la imagen ya está visible, ocultarla
            if (overlay.style.display === 'flex') {
                overlay.style.display = 'none';
                overlayImage.src = '';
            } else {
                // Obtener la imagen clickeada
                const clickedImageSrc = event.target.src;
                // Mostrar la imagen en el overlay
                overlayImage.src = clickedImageSrc;
                overlay.style.display = 'flex';
            }

            // Agregar evento de tecla "Escape" para cerrar el overlay
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    overlay.style.display = 'none';
                    overlayImage.src = '';
                }
            });
        }
    </script>


    <script>
        var alertElement = document.getElementById("myAlert1");
        setTimeout(function() {
            alertElement.style.display = "none";
        }, 2000);
    </script>
@endsection

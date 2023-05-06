@extends('layouts.user_type.auth')

@section('content')
    <div class="mb-12">



        <div class="d-flex justify-content-between mb-2" style="margin-right: 6px; position: relative; ">
            <div class="col-xl-3 col-sm-4 " style="width: 22rem;">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-1 align-content-center">
                                <a href="{{ route('eventos.edit', $evento_id) }}" class="text-decoration-none">
                                    <div class="icon icon-shape text-center border-radius-md icon-sm"
                                        style="padding-right: 6px;">
                                        <i class="fas fa-arrow-left text-xs opacity-10 mt-2" aria-hidden="true"
                                            style="color: #495057; margin: 0 auto;"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="col-7">
                                <div class="numbers mt-1">
                                    <h5 class="font-weight-bolder mb-0">
                                        Añadir Fotógrafo
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md icon-sm">
                                    <i class="fas fa-camera text-xs opacity-10" aria-hidden="true"
                                        style="color: #ffff;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <style>
            .card-container {
                position: relative;
            }

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

            .image-container:hover {
                cursor: pointer;
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

        <div class="card mt-4">
            <div class="card">
                <div class="col-md-12">
                    <div class="card-header " style="padding: 2rem 2rem 0rem 2rem">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0">Lista de Fotógrafos</h6>
                            </div>

                        </div>
                    </div>
                    <br>
                    @foreach ($users as $user)
                        @php
                            $userExists = false;
                        @endphp

                        @foreach ($user_eventos as $user_evento)
                            @if ($user_evento->evento_id == $evento_id && $user_evento->user_id == $user->id)
                                @php
                                    $userExists = true;
                                    break;
                                @endphp
                            @endif
                        @endforeach
                        @if ($user->rol == 'Fotografo' && !$userExists)
                            <form
                                action="{{ route('user_evento.store', ['evento_id' => $evento_id, 'user_id' => $user->id]) }}"
                                method="POST" role="form text-left" enctype="multipart/form-data">
                                @csrf

                                <div class="card mb-3 mx-3 mt-3 ">
                                    <div class="card-body d-flex flex-wrap justify-content-between align-items-center">
                                        <div class="d-flex flex-column align-items-center mb-3 mb-lg-0">
                                            <div class="position-relative mb-2">
                                                <img src="{{ $user->photo1 ? $user->photo1 : asset('assets/img/team-2.jpg') }}"
                                                    class="rounded-circle" onclick="toggleCentered(event)" 
                                                    style="width: 80px; height: 80px; object-fit: cover; cursor: pointer;">
                                            </div>
                                            <h5 class="card-title mb-0">{{ $user->name }}</h5>
                                            <p class="card-text mb-0">{{ $user->location }}</p>
                                            <p class="card-text mb-0">{{ $user->phone }}</p>
                                        </div>
                                        <div class="d-flex justify-content-center flex-wrap flex-grow-1">
                                            @foreach ($portafolios as $port)
                                                @if ($port->user_id == $user->id)
                                                    <img onclick="toggleCentered(event)" src="{{ $port->foto }}"
                                                        class="mb-3 mr-3"
                                                        style="object-fit: cover; width: 160px; height: 135px; border-radius: 10px; margin-right: 2em">
                                                @endif
                                            @endforeach
                                            
                                        </div>
                                        <div class="d-flex align-items-center ">
                                            <button class="btn bg-gradient-dark btn-sx" type="submit"
                                                data-user="{{ $user->id }}" data-name="{{ $evento->nombre }}"
                                                data-tipo="{{ $evento->tipo }}" data-hora="{{ $evento->hora }}"
                                                data-fecha="{{ $evento->fecha }}"
                                                data-direccion="{{ $evento->direccion }}"
                                                data-imagen="{{ $evento->imagen }}">
                                                +
                                            </button>
                                        </div>
                                    </div>
                                </div>


                </div>
                </form>
                @endif
                @endforeach
            </div>
        </div>


        <div id="overlay" class="overlay">
            <div class="close-button" onclick="toggleCentered()">x</div>
            <img id="overlay-image" src="" alt="Imagen Ampliada">
        </div>

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

        {{-- <script>
            // Process for sending our request to socket.
            // so we need to run our node js app in 192.168.1.2 with port 3030
            // 192.168.1.2 depends on your machine ip.
            const socket = io.connect('http://localhost:3030');
            console.log('hola?');

            // Let's code the sending process
            // When the user click the button we need to send the item_id in our nodejs app.
            // Create an click event listener
            document.addEventListener('click', (e) => {
                // We need to strict the click event just in our button BUY to do that.
                if (e.target.tagName.toLowerCase() === 'button' && e.target.getAttribute('data-name')) {
                data-user='{{ $user->id }}' data-nombre='{{ $evento->name }}' data-tipo='{{ $evento->tipo }}' data-fecha='{{ $evento->fecha }}' data-hora='{{ $evento->hora }}' data-direccion='{{ $evento->direccion }}'>
                    // Get the item_id of item
                    const userID = e.target.getAttribute('data-user');
                    const eventNombre = e.target.getAttribute('data-nombre');
                    const eventTipo = e.target.getAttribute('data-tipo');
                    const eventFecha = e.target.getAttribute('data-fecha');
                    const eventHora = e.target.getAttribute('data-hora');
                    const eventDireccion = e.target.getAttribute('data-direccion');

                    // Send in our NodeJS App.
                    socket.emit('notification', {
                        item_id: userID,
                        item_nombre: eventNombre,
                        item_tipo: eventTipo,
                        item_fecha: eventFecha,
                        item_hora: eventHora,
                        item_direccion: eventDireccion,
                    })
                }
            });
        </script> --}}


        <script src="https://cdn.socket.io/3.1.3/socket.io.min.js"
            integrity="sha384-cPwlPLvBTa3sKAgddT6krw0cJat7egBga3DJepJyrLl4Q9/5WLra3rrnMcyTyOnh" crossorigin="anonymous">
        </script>
        <script>
            // Process for listening to an event push.
            // too lazy to make a single source of socket.io connection
            // you can do it on your own :)
            /* const socket = io.connect('http://localhost:3030'); */
            const socket = io.connect('https://mogi-web-service.onrender.com');

            document.addEventListener('click', (e) => {
                // We need to strict the click event just in our button BUY to do that.
                if (e.target.tagName.toLowerCase() === 'button' && e.target.hasAttribute('data-user')) {
                    // Get the item_id of item
                    const userId = e.target.getAttribute('data-user');
                    const nameE = e.target.getAttribute('data-name');
                    const typeE = e.target.getAttribute('data-tipo');
                    const dateE = e.target.getAttribute('data-fecha');
                    const timeE = e.target.getAttribute('data-hora');
                    const locationE = e.target.getAttribute('data-direccion');
                    const imagenE = e.target.getAttribute('data-imagen');
                    // Send in our NodeJS App.
                    socket.emit('notification', {
                        item_id: userId,
                        item_name: nameE,
                        item_type: typeE,
                        item_date: dateE,
                        item_time: timeE,
                        item_location: locationE,
                        item_imagen: imagenE,
                    })

                    console.log(item_id);
                }
            });
        </script>



    </div>
@endsection

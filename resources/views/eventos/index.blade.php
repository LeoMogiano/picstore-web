@extends('layouts.user_type.auth')

@section('content')
    <div class="mb-12">

        {{-- <div class="row mt-4">
        <div class="col-lg-4 mb-lg-0 mb-4">
            <div class="card w-100">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="d-flex flex-column h-100">
                                <p class="mb-1 pt-2 text-bold" style="font-size: 14px;">Built by developers</p>
                                <h5 class="font-weight-bolder" style="font-size: 18px;">Soft UI Dashboard</h5>
                                <p class="mb-5" style="font-size: 12px;">From colors, cards, typography to complex elements, you will find the full documentation.</p>
                                <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;" style="font-size: 12px;">
                                    Read More
                                    <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 ms-auto text-center mt-5 mt-lg-0">
                            <div class="bg-gradient-dark border-radius-lg h-100">
                                <img src="../assets/img/shapes/waves-white.svg" class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                                <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                    <img class="w-50 position-relative z-index-2 pt-4" alt="rocket">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-lg-0 mb-4">
            <div class="card w-100">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="d-flex flex-column h-100">
                                <p class="mb-1 pt-2 text-bold" style="font-size: 14px;">Built by developers</p>
                                <h5 class="font-weight-bolder" style="font-size: 18px;">Soft UI Dashboard</h5>
                                <p class="mb-5" style="font-size: 12px;">From colors, cards, typography to complex elements, you will find the full documentation.</p>
                                <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;" style="font-size: 12px;">
                                    Read More
                                    <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 ms-auto text-center mt-5 mt-lg-0">
                            <div class="bg-gradient-dark border-radius-lg h-100">
                                <img src="../assets/img/shapes/waves-white.svg" class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                                <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                    <img class="w-50 position-relative z-index-2 pt-4" alt="rocket">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-lg-0 mb-4">
            <div class="card w-100">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="d-flex flex-column h-100">
                                <p class="mb-1 pt-2 text-bold" style="font-size: 14px;">Built by developers</p>
                                <h5 class="font-weight-bolder" style="font-size: 18px;">Soft UI Dashboard</h5>
                                <p class="mb-5" style="font-size: 12px;">From colors, cards, typography to complex elements, you will find the full documentation.</p>
                                <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;" style="font-size: 12px;">
                                    Read More
                                    <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 ms-auto text-center align mt-5 mt-lg-0">
                            <div class="bg-gradient-dark border-radius-lg h-100">
                                <img src="../assets/img/shapes/waves-white.svg" class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                                <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                    <img class="w-50 position-relative z-index-2 pt-4" alt="rocket">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


        {{-- 
        LOGO EVENTO TAMAÑO GRANDE
        <div class="col-xl-3 col-sm-4 mb-xl-0 mb-4" style="width: 15rem">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers mt-2">
                  <h5 class="font-weight-bolder mb-0">
                    Eventos
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md">
                  <i class="fas fa-calendar-check text-lg opacity-10" aria-hidden="true" style="color: #ffff";></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> --}}

        <div class="d-flex justify-content-between mb-4" style="margin-right: 8px; position: relative;">
            <div class="col-xl-3 col-sm-4 " style="width: 12.5rem;">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers mt-1">
                                    <h5 class="font-weight-bolder mb-0">
                                        Eventos
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md icon-sm">
                                    <i class="fas fa-calendar-check text-xs opacity-10" aria-hidden="true"
                                        style="color: #ffff;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (Auth::user()->rol == 'Organizador')
                <div class="mt-4 mb-3" style="position: absolute; top: 8px; right: 0;">
                    <a href="{{ route('eventos.create') }}" class="btn bg-gradient-dark btn-md">Nuevo</a>
                </div>
            @endif
        </div>

        {{--  
    CODIGO PARA HARCERLO DE 3 COLUMNAS
    <div class="row mt-4 pb-7">
        <div class="col-lg-4 col-md-6 col-sm-12 mb-lg-0 mb-4">
            <div class="card w-100 h-100">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="d-flex flex-column h-100">
                                <p class="mb-1 pt-2 text-bold" style="font-size: 14px;">15/06/2023 - 20:00 horas</p>
                                <h5 class="font-weight-bolder" style="font-size: 15px">Fiesta de Graduación "Noche de Estrellas"</h5>
                                <p class="mb-3" style="font-size: 12px;"> <b>Dirección: </b> <br> Salón de Eventos "El Jardín de Ensueño", Av. Alemana, Ciudad Universitaria</p>
                                <a class="text-body text-sm font-weight-bolder mb-0 icon-move-right mt-1" href="javascript:;" style="font-size: 12px;">
                                    Revisar
                                    <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 ms-auto text-center mt-3 mt-lg-0">
                            <div class="bg-gradient-dark border-radius-lg h-100">
                                <img src="../assets/img/shapes/waves-white.svg" class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                                <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                    <img class="w-50 position-relative z-index-2 pt-4" alt="rocket">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12 mb-lg-0 mb-4">
            <div class="card w-100 h-100">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="d-flex flex-column h-100">
                                <p class="mb-1 pt-2 text-bold" style="font-size: 14px;">Built by developers</p>
                                <h5 class="font-weight-bolder" style="font-size: 18px;">Soft UI Dashboard</h5>
                                <p class="mb-5" style="font-size: 12px;">From colors, cards, typography to complex elements, you will find the full documentation.</p>
                                <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;" style="font-size: 12px;">
                                    Read More
                                    <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 ms-auto text-center mt-3 mt-lg-0">
                            <div class="bg-gradient-dark border-radius-lg h-100">
                                <img src="../assets/img/shapes/waves-white.svg" class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                                <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                    <img class="w-50 position-relative z-index-2 pt-4" alt="rocket">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12 mb-lg-0 mb-4">
            <div class="card w-100 h-100">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="d-flex flex-column h-100">
                                <p class="mb-1 pt-2 text-bold" style="font-size: 14px;">Built by developers</p>
                                <h5 class="font-weight-bolder" style="font-size: 18px;">Soft UI Dashboard</h5>
                                <p class="mb-5" style="font-size: 12px;">From colors, cards, typography to complex elements, you will find the full documentation.</p>
                                <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;" style="font-size: 12px;">
                                    Read More
                                    <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 ms-auto text-center mt-3 mt-lg-0">
                            <div class="bg-gradient-dark border-radius-lg h-100">
                                <img src="../assets/img/shapes/waves-white.svg" class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                                <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                    <img class="w-50 position-relative z-index-2 pt-4" alt="rocket">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div> --}}
        @if (Auth::user()->rol == 'Organizador')
            <div class="row mt-1 pb-0">





                @foreach ($eventos as $evento)
                    @if ($evento->org_id == Auth::user()->id)
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-lg-0 mb-4 pb-4">
                            <div class="card w-100 h-100 " id="eventoCard-{{ $evento->id }}">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="d-flex flex-column h-100 position-relative">
                                                <p class="mb-1 pt-2 text-bold" style="font-size: 14px;">
                                                    {{ \Carbon\Carbon::parse($evento->fecha)->format('d/m/Y') }} -
                                                    {{ \Carbon\Carbon::parse($evento->hora)->format('H:i') }} horas</p>
                                                <h5 class="font-weight-bolder mb-0" style="font-size: 16px;">
                                                    {{ $evento->nombre }}
                                                </h5>
                                                <b class="p-0 m-0">{{ $evento->tipo }}</b>
                                                <p class="mb-3" style="font-size: 12px;"> <b>Dirección: </b> <br>
                                                    {{ $evento->lugar }}, <br> {{ $evento->direccion }}</p>
                                                <a class="text-body text-sm font-weight-bolder mb-0 icon-move-right mt-auto"
                                                    href="{{ route('eventos.edit', $evento->id) }}"
                                                    style="font-size: 12px;">
                                                    Revisar
                                                    <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <!-- Botón de eliminación con confirmación -->
                                            {{-- <form action="{{ route('eventos.destroy', $evento) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <div class="position-absolute end-0 mt-2 ms-2" style="top: -16px;  ">
                                            <button class="btn  btn-icon btn-sm text-light btnEliminar" type="submit"
                                                title="Eliminar"
                                                style="background-color: #343a40;width: 25px;height: 25px;; border-radius: 35%; padding: 5px;"
                                                onclick="return confirm('¿Está seguro de que desea borrar este evento?');">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </form> --}}
                                        </div>
                                        <div class="col-lg-6 ms-auto text-center mt-3 mt-lg-0">
                                            <div class="bg-gradient-dark border-radius-lg h-100 position-relative">
                                                <img src="{{ $evento->imagen ? $evento->imagen : asset('img/evento_gen.jpg') }}"
                                                    style="cursor: pointer;object-fit: cover; "
                                                    class="position-absolute h-100 w-100 top-0 d-lg-block d-none border-radius-lg img-fluid"
                                                    onclick="toggleCentered(event)">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach


            </div>
        @endif

        @if (Auth::user()->rol == 'Fotografo')
            <div class="row mt-1 pb-0">


                @foreach ($user_eventos as $user_evento)
                    @foreach ($eventos as $evento)
                        @if (
                            $evento->id == $user_evento->evento_id and
                                $user_evento->user_id == Auth::user()->id and
                                $user_evento->estado == 'Aceptado')
                            <div class="col-lg-6 col-md-6 col-sm-12 mb-lg-0 mb-4 pb-4">
                                <div class="card w-100 h-100 " id="eventoCard-{{ $evento->id }}">
                                    <div class="card-body p-3">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="d-flex flex-column h-100 position-relative">
                                                    <p class="mb-1 pt-2 text-bold" style="font-size: 14px;">
                                                        {{ \Carbon\Carbon::parse($evento->fecha)->format('d/m/Y') }} -
                                                        {{ \Carbon\Carbon::parse($evento->hora)->format('H:i') }} horas</p>
                                                    <h5 class="font-weight-bolder mb-0" style="font-size: 16px;">
                                                        {{ $evento->nombre }}
                                                    </h5>
                                                    <b class="p-0 m-0">{{ $evento->tipo }}</b>
                                                    <p class="mb-3" style="font-size: 12px;"> <b>Dirección: </b> <br>
                                                        {{ $evento->lugar }}, <br> {{ $evento->direccion }}</p>
                                                    <a class="text-body text-sm font-weight-bolder mb-0 icon-move-right mt-auto"
                                                        href="{{ route('eventos.edit', $evento->id) }}"
                                                        style="font-size: 12px;">
                                                        Revisar
                                                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                                <!-- Botón de eliminación con confirmación -->
                                                {{-- <form action="{{ route('eventos.destroy', $evento) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <div class="position-absolute end-0 mt-2 ms-2" style="top: -16px;  ">
                                            <button class="btn  btn-icon btn-sm text-light btnEliminar" type="submit"
                                                title="Eliminar"
                                                style="background-color: #343a40;width: 25px;height: 25px;; border-radius: 35%; padding: 5px;"
                                                onclick="return confirm('¿Está seguro de que desea borrar este evento?');">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </form> --}}
                                            </div>
                                            <div class="col-lg-6 ms-auto text-center mt-3 mt-lg-0">
                                                <div class="bg-gradient-dark border-radius-lg h-100 position-relative">
                                                    <img src="{{ $evento->imagen ? $evento->imagen : asset('img/evento_gen.jpg') }}"
                                                        style="cursor: pointer;object-fit: cover; "
                                                        class="position-absolute h-100 w-100 top-0 d-lg-block d-none border-radius-lg img-fluid"
                                                        onclick="toggleCentered(event)">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach


            </div>
        @endif

        @if (Auth::user()->rol == 'Invitado')
            <div class="row mt-1 pb-0">


                @foreach ($user_eventos as $user_evento)
                    @foreach ($eventos as $evento)
                        @if ($evento->id == $user_evento->evento_id and $user_evento->user_id == Auth::user()->id)
                            <div class="col-lg-6 col-md-6 col-sm-12 mb-lg-0 mb-4 pb-4">
                                <div class="card w-100 h-100 " id="eventoCard-{{ $evento->id }}">
                                    <div class="card-body p-3">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="d-flex flex-column h-100 position-relative">
                                                    <p class="mb-1 pt-2 text-bold" style="font-size: 14px;">
                                                        {{ \Carbon\Carbon::parse($evento->fecha)->format('d/m/Y') }} -
                                                        {{ \Carbon\Carbon::parse($evento->hora)->format('H:i') }} horas</p>
                                                    <h5 class="font-weight-bolder mb-0" style="font-size: 16px;">
                                                        {{ $evento->nombre }}
                                                    </h5>
                                                    <b class="p-0 m-0">{{ $evento->tipo }}</b>
                                                    <p class="mb-3" style="font-size: 12px;"> <b>Dirección: </b> <br>
                                                        {{ $evento->lugar }}, <br> {{ $evento->direccion }}</p>
                                                    <a class="text-body text-sm font-weight-bolder mb-0 icon-move-right mt-auto"
                                                        href="{{ route('eventos.edit', $evento->id) }}"
                                                        style="font-size: 12px;">
                                                        Revisar
                                                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                                <!-- Botón de eliminación con confirmación -->
                                                {{-- <form action="{{ route('eventos.destroy', $evento) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <div class="position-absolute end-0 mt-2 ms-2" style="top: -16px;  ">
                                            <button class="btn  btn-icon btn-sm text-light btnEliminar" type="submit"
                                                title="Eliminar"
                                                style="background-color: #343a40;width: 25px;height: 25px;; border-radius: 35%; padding: 5px;"
                                                onclick="return confirm('¿Está seguro de que desea borrar este evento?');">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </form> --}}
                                            </div>
                                            <div class="col-lg-6 ms-auto text-center mt-3 mt-lg-0">
                                                <div class="bg-gradient-dark border-radius-lg h-100 position-relative">
                                                    <img src="{{ $evento->imagen ? $evento->imagen : asset('img/evento_gen.jpg') }}"
                                                        style="cursor: pointer;object-fit: cover; "
                                                        class="position-absolute h-100 w-100 top-0 d-lg-block d-none border-radius-lg img-fluid"
                                                        onclick="toggleCentered(event)">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach


            </div>
        @endif
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

        <div id="overlay" class="overlay" style="display: none;">
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




    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection

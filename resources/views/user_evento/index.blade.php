@extends('layouts.user_type.auth')

@section('content')
    <div class="mb-4">

        <div class="d-flex justify-content-between mb-1" style="margin-right: 8px; position: relative;">
            <div class="col-xl-3 col-sm-4 " style="width: 14rem;">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers mt-1">
                                    <h5 class="font-weight-bolder mb-0">
                                        Solicitudes
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md icon-sm">
                                    <i class="fas fa-briefcase text-xs opacity-10" aria-hidden="true"
                                        style="color: #ffff;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Solicitudes de Trabajo</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Organizador
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Evento</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Estado</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Fecha</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user_eventos as $user_evento)
                                    @if (Auth::user()->id == $user_evento->user_id)
                                        <tr>
                                            @foreach ($eventos as $evento)
                                                @if ($user_evento->evento_id == $evento->id)
                                                    @foreach ($users as $user)
                                                        @if ($evento->org_id == $user->id)
                                                            <td>
                                                                <div class="d-flex px-2 py-1">
                                                                    <div>
                                                                        <img src="{{ $user->photo1 ? $user->photo1 : asset('assets/img/team-2.jpg') }}"
                                                                            class="avatar avatar-sm me-3" alt="user1"
                                                                            style="object-fit: cover; cursor: pointer;" onclick="toggleCentered(event)">
                                                                    </div>

                                                                    <div class="d-flex flex-column justify-content-center">
                                                                        <h6 class="mb-0 text-sm">{{ $user->name }}
                                                                        </h6>
                                                                        <p class="text-xs text-secondary mb-0">
                                                                            {{ $user->email }} {{ $user->phone }}</p>
                                                                    </div>


                                                                </div>
                                                            </td>
                                                        @endif
                                                    @endforeach
                                                @endif

                                                @if ($user_evento->evento_id == $evento->id)
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">{{ $evento->nombre }}</p>
                                                        <p class="text-xs text-secondary mb-0">{{ $evento->direccion }} -
                                                            {{ $evento->lugar }}</p>
                                                    </td>
                                                @endif


                                                @if ($user_evento->evento_id == $evento->id)
                                                    @if ($user_evento->estado == 'Aceptado')
                                                        <td class="align-middle text-center text-sm">
                                                            <span
                                                                class="badge badge-sm bg-gradient-success">{{ $user_evento->estado }}</span>
                                                        </td>
                                                    @endif
                                                    @if ($user_evento->estado == 'Rechazado')
                                                        <td class="align-middle text-center text-sm">
                                                            <span
                                                                class="badge badge-sm bg-gradient-danger">{{ $user_evento->estado }}</span>
                                                        </td>
                                                    @endif

                                                    @if ($user_evento->estado == 'Pendiente')
                                                        <td class="align-middle text-center text-sm">
                                                            <span
                                                                class="badge badge-sm bg-gradient-secondary">{{ $user_evento->estado }}</span>
                                                        </td>
                                                    @endif
                                                    {{-- TODO: AUMENTAR VALIDACION PARA QUE SE BORE LOS BOTONES Y SI ESTA SEGURO ( TAMBIEN EN AÑADIR FOTOGRAFO) --}}
                                                    <td class="align-middle text-center">
                                                        <span
                                                            class="text-secondary text-xs font-weight-bold">{{ \Carbon\Carbon::parse($evento->fecha)->format('d/m/Y') }}
                                                            - {{ \Carbon\Carbon::parse($evento->hora)->format('H:i') }}
                                                        </span>
                                                    </td>
                                                    @if ($user_evento->estado == 'Pendiente')
                                                        <td class="align-middle">
                                                            <form
                                                                action="{{ route('user_evento.estado', ['user_evento_id' => $evento->id, 'user_id' => Auth::user()->id, 'estado' => 'Aceptado']) }}"
                                                                method="post">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-link text-secondary font-weight-bold text-xs"
                                                                    data-toggle="tooltip" data-original-title="Edit user"
                                                                    onclick="return confirm('¿Está seguro de aceptarlo? Tenga en cuenta que no hay vuelta atrás una vez que tome una decisión.')">
                                                                    <i class="fas fa-check"></i> <!-- Icono de aceptar -->
                                                                </button>
                                                            </form>

                                                            <form
                                                                action="{{ route('user_evento.estado', ['user_evento_id' => $evento->id, 'user_id' => Auth::user()->id, 'estado' => 'Rechazado']) }}"
                                                                method="post">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-link text-secondary font-weight-bold text-xs"
                                                                    data-toggle="tooltip" data-original-title="Edit user"
                                                                    onclick="return confirm('¿Está seguro de rechazarlo? Tenga en cuenta que no hay vuelta atrás una vez que tome una decisión.')">
                                                                    <i class="fas fa-times"></i> <!-- Icono de rechazar -->
                                                                </button>
                                                            </form>

                                                        </td>
                                                    @endif
                                                @endif
                                            @endforeach


                                        </tr>
                                    @endif
                                @endforeach

                            </tbody>
                        </table>
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




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection

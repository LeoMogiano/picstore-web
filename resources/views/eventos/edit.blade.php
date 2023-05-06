@extends('layouts.user_type.auth')

@section('content')
    <div class="mb-1">

        <div class="d-flex justify-content-between mb-2" style="margin-right: 6px; position: relative; ">
            <div class="col-xl-3 col-sm-4 " style="width: 20rem;">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-1 align-content-center">
                                <a href="{{ route('eventos.index') }}" class="text-decoration-none">
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
                                        Revisión Evento
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
                    <a href="{{ route('user_evento.create', $evento->id) }}" class="btn bg-gradient-dark btn-md">
                        <b style="color: #ffff; font-size: 15px;">+</b>
                        &nbsp;Fotógrafos
                    </a>
                </div>
            @endif
            @if (Auth::user()->rol == 'Fotografo')
                <div class="mt-4 mb-3" style="position: absolute; top: 8px; right: 0;">
                    <a href="{{ route('fotografias.create', $evento->id) }}" class="btn bg-gradient-dark btn-md">
                        <b style="color: #ffff; font-size: 15px;">+</b>
                        &nbsp;Fotografías
                    </a>
                </div>
            @endif

        </div>
        {{--  <div class="mt-4 mb-3" style="position: absolute; top: 10px; right: 0;">
              <a href="{{ route('eventos.create') }}" class="btn bg-gradient-dark btn-md">Nuevo</a>
            </div> --}}
    </div>

    @if (Auth::user()->rol == 'Organizador')
        <div class="container-fluid py-4 px-0">
            <div class="card">
                <div class="card-header pb-0 ">
                    <h6 class="mb-0">Información de Evento</h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <form action="{{ route('eventos.update', $evento->id) }}" method="POST" role="form text-left"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
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
                                    <label for="evento-nombre" class="form-control-label">Nombre del Evento</label>
                                    <div class="@error('nombre')border border-danger rounded-3 @enderror">
                                        <input class="form-control" type="text" placeholder="Nombre del evento"
                                            id="evento-nombre" name="nombre" value="{{ $evento->nombre }}">
                                        @error('nombre')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tipo">Tipo de Evento</label>
                                    <select class="form-select" id="tipo" name="tipo">

                                        <option value="{{ $evento->tipo }}">{{ $evento->tipo }}</option>
                                        <option value="">Seleccionar</option>
                                        <option value="Cumpleaños">Cumpleaños</option>
                                        <option value="Conferencia">Conferencia</option>
                                        <option value="Conferencia de Negocios">Conferencia de Negocios</option>
                                        <option value="Eventos Sociales">Eventos Sociales</option>
                                        <option value="Fiesta de Graduación">Fiesta de Graduación</option>
                                        <option value="Gala benéfica">Gala benéfica</option>
                                        <option value="Matrimonio">Matrimonio</option>
                                        <option value="Seminario">Seminario</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                    @error('tipo')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="evento-fecha" class="form-control-label">Fecha del Evento</label>
                                    <div class="@error('fecha')border border-danger rounded-3 @enderror">
                                        <input class="form-control" type="date" id="evento-fecha" name="fecha"
                                            value="{{ $evento->fecha }}">
                                        @error('fecha')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="hora">Hora</label>
                                    <input type="time" class="form-control" id="hora" name="hora"
                                        value="{{ $evento->hora }}">
                                    @error('hora')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha">Lugar</label>
                                    <input type="text" class="form-control" placeholder="Lugar del evento"
                                        id="lugar" name="lugar" value="{{ $evento->lugar }}">
                                    @error('lugar')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="direccion">Dirección</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion"
                                        value="{{ $evento->direccion }}" placeholder="Dirección del evento">
                                    @error('direccion')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        @php
                            $id = $evento->id; // Aquí reemplaza con la variable que quieres pasar como {id}
                            $url = url('/register_event/' . $id); // Genera la URL completa
                            $download_url = url('/download_qr/' . $id); // Genera la URL completa de descarga
                        @endphp

                        <div class="row">
                            <div class="col-9 " style="margin-bottom: 2px;margin-left: 0.8em; padding: 0; he">
                                <div class="form-group ">
                                    <label for="imagen">Imagen del Evento</label>
                                    <input type="file" class="form-control" id="imagen" name="imagen">
                                    @error('imagen')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-end align-items-end mb-0 mx-5">
                                    <div class="position-relative" style="width: 45px">
                                        <a class="btn-sm bg-gradient-dark" href="{{ $download_url }}">
                                            <i class="fas fa-download text-xs opacity-10" aria-hidden="true"
                                                style="color: #ffff;">&nbsp;QR</i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">

                                <div class="position-relative">
                                    <img src="https://qrickit.com/api/qr.php?d={{ $url }}&qrsize=175&t=p&e=m">

                                </div>
                            </div>


                        </div>
                        <div class="col-md-12" style="padding-bottom: 0; margin-bottom: 0">
                            <div class="d-flex justify-content-center align-items-center m-1" style="overflow: hidden;">
                                <img src="{{ $evento->imagen }}" alt="Imagen de la carta" class="card-img"
                                    style="width: 350px; height: 250px; object-fit: cover; cursor: pointer;"
                                    onclick="toggleCentered(event)">
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn bg-gradient-dark btn-md mt-0 mb-3">MODIFICAR</button>
                        </div>




                    </form>

                </div>
            </div>
        </div>
    @endif
    @if (Auth::user()->rol == 'Fotografo' or Auth::user()->rol == 'Invitado')
        <div class="container-fluid py-4 px-0">
            <div class="card">
                <div class="card-header pb-0 ">
                    <h6 class="mb-0">Información de Evento</h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <form action="{{ route('eventos.update', $evento->id) }}" method="POST" role="form text-left">
                        @csrf
                        @method('PUT')
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
                                    <label for="evento-nombre" class="form-control-label">Nombre del Evento</label>
                                    <div class="@error('nombre')border border-danger rounded-3 @enderror">
                                        <input class="form-control" type="text" placeholder="Nombre del evento"
                                            id="evento-nombre" name="nombre" value="{{ $evento->nombre }}" disabled>
                                        @error('nombre')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tipo">Tipo de Evento</label>
                                    <select class="form-control" id="tipo" name="tipo" disabled>

                                        <option value="{{ $evento->tipo }}">{{ $evento->tipo }}</option>
                                        <option value="">Seleccionar</option>
                                        <option value="Conferencia">Conferencia</option>
                                        <option value="Seminario">Seminario</option>
                                        <option value="Taller">Taller</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                    @error('tipo')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="evento-fecha" class="form-control-label">Fecha del Evento</label>
                                    <div class="@error('fecha')border border-danger rounded-3 @enderror">
                                        <input class="form-control" type="date" id="evento-fecha" name="fecha"
                                            value="{{ $evento->fecha }}" disabled>
                                        @error('fecha')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="hora">Hora</label>
                                    <input type="time" class="form-control" id="hora" name="hora"
                                        value="{{ $evento->hora }}" disabled>
                                    @error('hora')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha">Lugar</label>
                                    <input type="text" class="form-control" placeholder="Lugar del evento"
                                        id="lugar" name="lugar" value="{{ $evento->lugar }}" disabled>
                                    @error('lugar')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="direccion">Dirección</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion"
                                        value="{{ $evento->direccion }}" placeholder="Dirección del evento" disabled>
                                    @error('direccion')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="d-flex justify-content-center align-items-center"
                                style="overflow: hidden; margin: 15px;">
                                <img src="{{ $evento->imagen }}" alt="Imagen de la carta" class="card-img"
                                    style="width: 350px; height: 250px; object-fit: cover; cursor: pointer;"
                                    onclick="toggleCentered(event)">
                            </div>
                        </div>


                    </form>

                </div>

            </div>

        </div>
    @endif


    @if (Auth::user()->rol == 'Organizador')
        <div class="row ">
            <div class="col-12">
                <div class="card mb-4 mx-0">
                    <div class="card-header pb-0 mx-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">Listado de Fotógrafos </h5>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ID
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Foto
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nombre
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Email
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Rol
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Oferta Aceptada
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- FILTRO FOTOGRAFO --}}
                                    @foreach ($users as $user)
                                        @foreach ($user_eventos as $user_evento)
                                            @if ($user_evento->evento_id == $evento->id and $user_evento->user_id == $user->id and $user->rol == 'Fotografo')
                                                <tr>
                                                    <td class="ps-4">
                                                        <p class="text-xs font-weight-bold mb-0">{{ $user->id }}</p>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <img src="{{ $user->photo1 ? $user->photo1 : asset('assets/img/team-2.jpg') }}"
                                                                class="avatar avatar-sm me-3"
                                                                style="object-fit: cover; cursor: pointer;"
                                                                onclick="toggleCentered(event)">
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <p class="text-xs font-weight-bold mb-0">{{ $user->name }}</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p class="text-xs font-weight-bold mb-0">{{ $user->email }}</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p class="text-xs font-weight-bold mb-0">{{ $user->rol }}</p>
                                                    </td>
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
                                                    <form action="{{ route('users.destroy', $user) }}" method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <td class="text-center">
                                                            <a href="{{ route('user_evento.show_user', ['user_id' => $user->id, 'evento_id' => $evento->id]) }}"
                                                                class="mx-3" data-bs-toggle="tooltip"
                                                                data-bs-original-title="Ver usuario">
                                                                <i class="fas fa-eye text-secondary"></i>
                                                            </a>
                                                            {{-- <span>
                                                    <button type="submit" class="cursor-pointer fas fa-trash text-secondary " style="border: none; background-color: #ffff" onclick="return confirm('¿Está seguro de que desea borrar este evento?');" ></button>
                                                </span> --}}
                                                        </td>
                                                    </form>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif



    <div class="card m-0">
        <div class="d-flex justify-content-between m-3" style="margin-right: 6px; position: relative; ">
            <div class="col-xl-3 col-sm-4 " style="width: 16rem;">
                <div class="card">
                    <div class="card p-3">
                        <div class="row">

                            <div class="col-7">
                                <div class="numbers mt-1">
                                    <h5 class="font-weight-bolder mb-0">
                                        Fotografías
                                    </h5>
                                </div>
                            </div>
                            <div class="col-5 text-end">
                                <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md icon-sm">
                                    <i class="fas fa-images text-xs opacity-10" aria-hidden="true"
                                        style="color: #ffff;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            @foreach ($fotografias as $fotografia)
                @if ($fotografia->tipo == 'Publico')
                    <div class="col-md-4">
                        <div style="position: relative; margin: 15px;">
                            <img src="{{ $fotografia->foto_c }}" alt="Imagen de la carta" class="card-img"
                                style="width: 100%; height: 300px; object-fit: cover; cursor: pointer"
                                onclick="toggleCentered(event)">
                            @if (Auth::user()->rol == 'Invitado')
                                <a href="{{ route('fotografias.buy', $fotografia->id) }}" class="bg-gradient-dark"
                                    style="position: absolute; top: -10px; right: -10px; z-index: 1; color: white; border-radius: 50%; width: 35px; height: 35px; text-align: center; line-height: 40px; font-size: 20px; display: flex; justify-content: center; align-items: center;  ">
                                    <i class="fas fa-shopping-cart" style="margin-top: 2px; font-size: 0.80rem"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                @endif

                @if ($fotografia->tipo == 'Privado')
                    @if ($fotografia->autor_id == Auth::user()->id)
                        <div class="col-md-4">
                            <div style="position: relative; margin: 15px;">
                                <img src="{{ $fotografia->foto_c }}" alt="Imagen de la carta" class="card-img"
                                    style="width: 100%; height: 300px; object-fit: cover; cursor: pointer"
                                    onclick="toggleCentered(event)">

                            </div>
                        </div>
                    @else
                        @foreach ($foto_users as $foto_user)
                            @if ($foto_user->user_id == Auth::user()->id and $foto_user->foto_id == $fotografia->id)
                                <div class="col-md-4">
                                    <div style="position: relative; margin: 15px;">
                                        <img src="{{ $fotografia->foto_c }}" alt="Imagen de la carta" class="card-img"
                                            style="width: 100%; height: 300px; object-fit: cover; cursor: pointer"
                                            onclick="toggleCentered(event)">
                                        @if ($foto_user->estado == 'Sin Comprar')
                                            <a href="{{ route('fotografias.buy', $fotografia->id) }}"
                                                class="bg-gradient-dark"
                                                style="position: absolute; top: -10px; right: -10px; z-index: 1; color: white; border-radius: 50%; width: 35px; height: 35px; text-align: center; line-height: 40px; font-size: 20px; display: flex; justify-content: center; align-items: center;">
                                                <i class="fas fa-shopping-cart"
                                                    style="margin-top: 2px; font-size: 0.80rem"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                @endif
            @endforeach
        </div>
    </div>
    </div>




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
@endsection

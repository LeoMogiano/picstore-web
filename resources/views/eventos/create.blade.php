@extends('layouts.user_type.auth')

@section('content')
    <div>

        <div class="d-flex justify-content-between mb-2" style="margin-right: 6px; position: relative; ">
            <div class="col-xl-3 col-sm-4 " style="width: 19rem;">
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
                                        Nuevo Evento
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
        </div>

    </div>

    <div class="container-fluid py-4 px-0">
        <div class="card">
            <div class="card-header pb-0 ">
                <h6 class="mb-0">Información de Evento</h6>
            </div>
            <div class="card-body pt-4 p-3">
                <form action="{{ route('eventos.store') }}" method="POST" role="form text-left"
                    enctype="multipart/form-data">
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
                                <label for="evento-nombre" class="form-control-label">Nombre del Evento</label>
                                <div class="@error('nombre')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="Nombre del evento"
                                        id="evento-nombre" name="nombre" value="{{ old('nombre') }}">
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
                                        value="{{ old('fecha') }}">
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
                                    value="{{ old('hora') }}">
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
                                <input type="text" class="form-control" placeholder="Lugar del evento" id="lugar"
                                    name="lugar" value="{{ old('lugar') }}">
                                @error('lugar')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion"
                                    value="{{ old('direccion') }}" placeholder="Dirección del evento">
                                @error('direccion')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="imagen">Imagen del Evento</label>
                        <input type="file" class="form-control" id="imagen" name="imagen">
                        @error('imagen')
                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">CREAR</button>
                    </div>

                   

                </form>

            </div>
        </div>
    </div>
    </div>

    <script>
        var alertElement = document.getElementById("myAlert1");
        setTimeout(function() {
            alertElement.style.display = "none";
        }, 2000);
    </script>
@endsection

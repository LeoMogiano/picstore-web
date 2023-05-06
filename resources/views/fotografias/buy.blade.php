@extends('layouts.user_type.auth')

@section('content')
    <div class="d-flex justify-content-between mb-2" style="margin-right: 6px; position: relative; ">
        <div class="col-xl-3 col-sm-4 " style="width: 23.7rem;">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-1 align-content-center">
                            <a href="{{ route('eventos.edit', $fotografia->evento_id) }}" class="text-decoration-none">
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
                                    Proceso de Compra
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md icon-sm">
                                <i class="fas fa-shopping-cart text-xs opacity-10" aria-hidden="true"
                                    style="color: #ffff;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="container-fluid py-4 px-0">
        <div class="card">
            <div class="card-body pt-4 pb-4 px-3">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <img src="{{ $fotografia->foto_c }}" width="500em" onclick="toggleCentered(event)"
                            style="cursor: pointer; border-radius: 1em" alt="imagen de la fotografía" class="img-fluid">
                    </div>
                    <div class="col-md-5">
                        <h6 class="mb-0">Información de Fotografía</h6>
                        <form action="{{ route('fotografias.buyed', $fotografia->id) }}" method="POST"
                            role="form text-left">
                            @csrf
                            <!-- resto del formulario -->
                            <div class="row mt-3">
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="precio">Precio BS:</label>
                                        <input type="text" value="{{ $fotografia->precio }}" class="form-control"
                                            id="precio" name="precio" disabled>

                                    </div>
                                </div>
                                @foreach ($users as $user)
                                    @if ($fotografia->autor_id == $user->id)
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="autor">Autor:</label>
                                                <input type="text" value="{{ $user->name }}" class="form-control"
                                                    id="autor" name="autor" disabled>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>


                            <div class="form-group">
                                <label for="tipo_tarjeta">Tarjeta:</label>
                                <select class="form-control" id="tipo_tarjeta" name="tarjeta" required>
                                    <option value="">Seleccionar</option>
                                    @foreach ($tarjetas as $tar)
                                        @if ($tar->user_id == Auth::user()->id)
                                            <option value="{{ $tar->id }}"> {{ $tar->nombre }} - (
                                                {{ substr($tar->numero, 0, 4) }}&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****
                                                )
                                            </option>
                                        @endif
                                    @endforeach


                                </select>
                            </div>
                            {{-- <div class="form-group">
                                    <label for="numero_tarjeta">Número de Tarjeta:</label>
                                    <input type="text" class="form-control" id="numero_tarjeta" name="numero_tarjeta" required>
                                </div>
                                <div class="form-group">
                                    <label for="fecha_vencimiento">Fecha de Vencimiento:</label>
                                    <input type="text" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" required>
                                </div> --}}
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn bg-gradient-dark btn-md mt-4 ">Pagar</button>
                            </div>
                        </form>
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
@endsection

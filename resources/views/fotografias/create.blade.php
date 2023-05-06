@extends('layouts.user_type.auth')

@section('content')
    
        <div class="d-flex justify-content-between mb-2" style="margin-right: 6px; position: relative; ">
            <div class="col-xl-3 col-sm-4 " style="width: 22.5rem;">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-1 align-content-center">
                                <a href="{{ route('eventos.edit', $evento_id) }}" class="text-decoration-none">
                                    <div class="icon icon-shape text-center border-radius-md icon-sm" style="padding-right: 6px;">
                                        <i class="fas fa-arrow-left text-xs opacity-10 mt-2" aria-hidden="true" style="color: #495057; margin: 0 auto;"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="col-7">
                                <div class="numbers mt-1">
                                    <h5 class="font-weight-bolder mb-0">
                                        Añadir Fotografía
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md icon-sm">
                                    <i class="fas fa-image text-xs opacity-10" aria-hidden="true"
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
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">Información de Fotografía</h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <form action="{{ route('fotografias.store', $evento_id) }}" method="POST" role="form text-left" enctype="multipart/form-data">
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
                                    <label for="tarjeta-precio" class="form-control-label">Precio </label>
                                    <div class="@error('tarjeta.precio')border border-danger rounded-3 @enderror">
                                        <input class="form-control" value="" type="number"
                                            placeholder="Precio" id="tarjeta-precio" name="precio" required>
                                        @error('precio')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tipo">Tipo de Fotografía</label>
                                    <select class="form-select" id="tipo" name="tipo" required>
    
                                        
                                        <option value="">Seleccionar</option>
                                        <option value="Publico">Público</option>
                                        <option value="Privado">Privado</option>
                                      
                                    </select>
                                    @error('tipo')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="foto">Fotografía</label>
                                <input type="file" class="form-control" id="foto" name="foto" required>
                                @error('foto')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>                       
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit"
                                class="btn bg-gradient-dark btn-md mt-4 mb-2">GUARDAR</button>
                        </div>         
                    </form>

                </div>
            </div>
        </div>

    </div>
@endsection

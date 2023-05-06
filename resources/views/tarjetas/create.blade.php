@extends('layouts.user_type.auth')

@section('content')
    
        <div class="d-flex justify-content-between mb-2" style="margin-right: 6px; position: relative; ">
            <div class="col-xl-3 col-sm-4 " style="width: 19rem;">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-1 align-content-center">
                                <a href="{{ route('tarjetas.index') }}" class="text-decoration-none">
                                    <div class="icon icon-shape text-center border-radius-md icon-sm" style="padding-right: 6px;">
                                        <i class="fas fa-arrow-left text-xs opacity-10 mt-2" aria-hidden="true" style="color: #495057; margin: 0 auto;"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="col-7">
                                <div class="numbers mt-1">
                                    <h5 class="font-weight-bolder mb-0">
                                        Nueva Tarjeta
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md icon-sm">
                                    <i class="fas fa-credit-card text-xs opacity-10" aria-hidden="true"
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
                    <h6 class="mb-0">Información de Tarjeta</h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <form action="{{ route('tarjetas.store') }}" method="POST" role="form text-left">
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
                                    <label for="tarjeta-name" class="form-control-label">Titular de la Tarjeta </label>
                                    <div class="@error('tarjeta.nombre')border border-danger rounded-3 @enderror">
                                        <input class="form-control" value="" type="text"
                                            placeholder="Nombre" id="tarjeta-name" name="nombre" required>
                                        @error('nombre')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tarjeta-numero" class="form-control-label">Número de Tarjeta</label>
                                    <div class="@error('tarjeta.numero')border border-danger rounded-3 @enderror">
                                        <input class="form-control" value="" type="text" placeholder="Número de Tarjeta"
                                            id="tarjeta-numero" name="numero" required>
                                        @error('numero')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tarjeta-cvc" class="form-control-label">CVV</label>
                                    <div class="@error('tarjeta.cvc')border border-danger rounded-3 @enderror">
                                        <input class="form-control" value="" type="text" placeholder="CVV" id="tarjeta-cvc"
                                            name="cvc" maxlength="3" required>
                                        @error('cvc')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tarjeta-fecha_v" class="form-control-label">Fecha de Vencimiento</label>
                                    <div class="@error('tarjeta.fecha_v')border border-danger rounded-3 @enderror">
                                        <input class="form-control" value="" type="date" placeholder="Fecha de Vencimiento"
                                            id="tarjeta-fecha_v" name="fecha_v" required>
                                        @error('fecha_v')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
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

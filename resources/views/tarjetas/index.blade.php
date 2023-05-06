@extends('layouts.user_type.auth')

@section('content')
    <div class="container-fluid p-0 mb-4">
        <div class="d-flex justify-content-between mb-4" style="margin-right: 8px; position: relative;">
            <div class="col-xl-3 col-sm-4 " style="width: 19rem;">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers mt-1">
                                    <h5 class="font-weight-bolder mb-0">
                                        Metódos de Pago
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

        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-xl-6 mb-xl-0 mb-4">
                        <div class="card bg-transparent shadow-xl">
                            <div class="overflow-hidden position-relative border-radius-xl"
                                style="background-image: url('../assets/img/curved-images/curved14.jpg');">
                                <span class="mask bg-gradient-dark"></span>
                                <div class="card-body position-relative z-index-1 p-3">
                                    <i class="fas fa-wifi text-white p-2"></i>
                                    <h5 class="text-white mt-4 mb-5 pb-2">
                                        {{ substr($tar->numero, 0, 4) }}&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****
                                    </h5>
                                    <div class="d-flex">
                                        <div class="d-flex">
                                            <div class="me-4">
                                                <p class="text-white text-sm opacity-8 mb-0">Titular</p>
                                                <h6 class="text-white mb-0">{{ $tar->nombre }}</h6>
                                            </div>
                                            <div>
                                                <p class="text-white text-sm opacity-8 mb-0">Vencimiento</p>
                                                <h6 class="text-white mb-0">
                                                    {{ \Carbon\Carbon::parse($tar->fecha)->format('m/y') }}</h6>
                                            </div>
                                        </div>
                                        <div class="ms-auto w-20 d-flex align-items-end justify-content-end">
                                            <img class="w-60 mt-2" src="{{ asset('assets/img/logos/visa.png') }}"
                                                alt="logo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header mx-4 p-3 text-center">
                                        <div
                                            class="icon icon-shape icon-lg bg-gradient-dark shadow text-center border-radius-lg">
                                            <i class="fas fa-wallet opacity-10"></i>
                                        </div>
                                    </div>
                                    @if (Auth::user()->rol == 'Fotografo')
                                        <div class="card-body pt-0 p-3 text-center">
                                            <h6 class="text-center mb-0">Balance</h6>
                                            <span class="text-xs">Ganancias</span>
                                            <hr class="horizontal dark my-3">
                                            <h5 class="mb-0">${{ $tar->saldo }}</h5>
                                        </div>
                                    @endif
                                    @if (Auth::user()->rol == 'Invitado')
                                        <div class="card-body pt-0 p-3 text-center">
                                            <h6 class="text-center mb-0">Balance</h6>
                                            <span class="text-xs">Ganancias</span>
                                            <hr class="horizontal dark my-3">
                                            <h5 class="mb-0">N/A</h5>
                                        </div>
                                    @endif
                                    @if (Auth::user()->rol == 'Organizador')
                                        <div class="card-body pt-0 p-3 text-center">
                                            <h6 class="text-center mb-0">Balance</h6>
                                            <span class="text-xs">Ganancias</span>
                                            <hr class="horizontal dark my-3">
                                            <h5 class="mb-0">N/A</h5>
                                        </div>
                                    @endif

                                </div>
                            </div>
                            <div class="col-md-6 mt-md-0 mt-4">
                                <div class="card">
                                    <div class="card-header mx-4 p-3 text-center">
                                        <div
                                            class="icon icon-shape icon-lg bg-gradient-dark shadow text-center border-radius-lg">
                                            <i class="fas fa-shopping-cart opacity-10"></i>
                                        </div>
                                    </div>
                                    @if (Auth::user()->rol == 'Fotografo')
                                        <div class="card-body pt-0 p-3 text-center">
                                            <h6 class="text-center mb-0">Compras</h6>
                                            <span class="text-xs">Realizadas</span>
                                            <hr class="horizontal dark my-3">
                                            <h5 class="mb-0">N/A</h5>
                                        </div>
                                    @endif
                                    @if (Auth::user()->rol == 'Invitado')
                                        <div class="card-body pt-0 p-3 text-center">
                                            <h6 class="text-center mb-0">Compras</h6>
                                            <span class="text-xs">Realizadas</span>
                                            <hr class="horizontal dark my-3">
                                            <h5 class="mb-0">$ {{ $tar->gasto }}</h5>
                                        </div>
                                    @endif
                                    @if (Auth::user()->rol == 'Organizador')
                                        <div class="card-body pt-0 p-3 text-center">
                                            <h6 class="text-center mb-0">Balance</h6>
                                            <span class="text-xs">Ganancias</span>
                                            <hr class="horizontal dark my-3">
                                            <h5 class="mb-0">N/A</h5>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-lg-0 mb-4">
                        <div class="card mt-4">
                            <div class="card-header pb-0 p-3">
                                <div class="row">
                                    <div class="col-6 d-flex align-items-center">
                                        <h6 class="mb-0">Metódos de Pago</h6>
                                    </div>
                                    <div class="col-6 text-end">
                                        <a class="btn bg-gradient-dark mb-0" href="{{ route('tarjetas.create') }}"><i
                                                class="fas fa-plus"></i>&nbsp;&nbsp;Añadir Nueva Tarjeta</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-3">
                                <div class="row">
                                    @foreach ($tarjetas as $tarjeta)
                                        <div class="col-md-6 mb-4 md-0 ">
                                            <div
                                                class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                                                <img class="w-10 me-3 mb-0" src="{{ asset('assets/img/logos/visa.png') }}"
                                                    alt="logo">
                                                <h6 class="mb-0">
                                                    {{ substr($tarjeta->numero, 0, 4) }}&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****
                                                </h6>
                                                <i class="fas fa-pencil-alt ms-auto text-dark cursor-pointer"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Edit Card"></i>
                                            </div>
                                        </div>
                                    @endforeach
                                    {{-- <div class="col-md-6">
                                        <div
                                            class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                                            <img class="w-10 me-3 mb-0" src="../assets/img/logos/visa.png" alt="logo">
                                            <h6 class="mb-0">
                                                4562&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****</h6>
                                            <i class="fas fa-pencil-alt ms-auto text-dark cursor-pointer"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Card"></i>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0">Transacciones</h6>
                            </div>
                            <div class="col-6 text-end">
                                <a class="btn bg-gradient-dark mb-0" href="{{ route('tarjetas.recibo') }}">VER TODOS</a>
                            </div>
                        </div>
                    </div>
                    @if (Auth::user()->rol == 'Fotografo')
                        <div class="card-body p-3E pb-0">
                            <ul class="list-group">
                                @foreach ($ffotos as $ffoto)
                                    @foreach ($ffoto_users as $ffoto_user)
                                    @if($ffoto_user->foto_id == $ffoto->id)
                                        <li
                                            class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                            <div class="d-flex flex-column">
                                                <h6 class="mb-1 text-dark font-weight-bold text-sm">
                                                    {{ $ffoto_user->updated_at }} </h6>
                                                <span class="text-xs">#FOTO-{{ $ffoto_user->id }}</span>
                                            </div>
                                            <div class="d-flex align-items-center text-sm">
                                                Bs.&nbsp;{{ $ffoto->precio }}

                                            </div>
                                        </li>
                                    @endif
                                    @endforeach
                                @endforeach


                            </ul>
                        </div>
                    @endif

                    @if (Auth::user()->rol == 'Invitado'  )
                        <div class="card-body p-3E pb-0">
                            <ul class="list-group">
                                @foreach ($ifotos as $ifoto)
                                    @foreach ($ifoto_users as $ifoto_user)
                                        @if ($ifoto_user->user_id == Auth::user()->id and $ifoto_user->foto_id == $ifoto->id  )
                                            
                                        
                                        <li
                                            class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                            <div class="d-flex flex-column">
                                                <h6 class="mb-1 text-dark font-weight-bold text-sm">
                                                    {{ $ifoto_user->updated_at }} </h6>
                                                <span class="text-xs">#FOTO-{{ $ifoto_user->id }}</span>
                                            </div>
                                            <div class="d-flex align-items-center text-sm">
                                                Bs.&nbsp;{{ $ifoto->precio }}

                                            </div>
                                        </li>
                                        @endif
                                    @endforeach
                                @endforeach


                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection

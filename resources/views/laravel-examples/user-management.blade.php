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

      <div class="col-xl-3 col-sm-4 mb-xl-0 mb-4" style="width: 12.5rem">
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
                  <i class="fas fa-calendar-check text-xs opacity-10" aria-hidden="true" style="color: #ffff";></i>
                </div>
              </div>
            </div>
          </div>
        </div>
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

    <div class="row mt-4 pb-7">
        <div class="col-lg-6 col-md-6 col-sm-12 mb-lg-0 mb-4">
            <div class="card w-100 h-100">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="d-flex flex-column h-100">
                                <p class="mb-1 pt-2 text-bold" style="font-size: 14px;">15/06/2023 - 20:00 horas</p>
                                <h5 class="font-weight-bolder" style="font-size: 16px;">Fiesta de Graduación <br> "Noche de Estrellas"</h5>
                                <p class="mb-3" style="font-size: 12px;"> <b>Dirección: </b> <br> Salón de Eventos "El Jardín de Ensueño", <br> Av. Alemana, Ciudad Universitaria</p>
                                <a class="text-body text-sm font-weight-bolder mb-0 icon-move-right mt-1" href="javascript:;" style="font-size: 12px;">
                                    Revisar
                                    <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 ms-auto text-center mt-3 mt-lg-0">
                            <div class="bg-gradient-dark border-radius-lg h-100 position-relative">
                                <img src="{{ asset('img/evento_gen.jpg') }}" class="position-absolute h-100 w-100 top-0 d-lg-block d-none object-fit-cover border-radius-lg img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 mb-lg-0 mb-4">
            <div class="card w-100 h-100">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="d-flex flex-column h-100">
                                <p class="mb-1 pt-2 text-bold" style="font-size: 14px;">15/06/2023 - 20:00 horas</p>
                                <h5 class="font-weight-bolder" style="font-size: 16px;">Fiesta de Graduación <br> "Noche de Estrellas"</h5>
                                <p class="mb-3" style="font-size: 12px;"> <b>Dirección: </b> <br> Salón de Eventos "El Jardín de Ensueño", <br> Av. Alemana, Ciudad Universitaria</p>
                                <a class="text-body text-sm font-weight-bolder mb-0 icon-move-right mt-1" href="javascript:;" style="font-size: 12px;">
                                    Revisar
                                    <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 ms-auto text-center mt-3 mt-lg-0">
                            <div class="bg-gradient-dark border-radius-lg h-100 position-relative">
                                <img src="{{ asset('img/evento_gen.jpg') }}" class="position-absolute h-100 w-100 top-0 d-lg-block d-none object-fit-cover border-radius-lg img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                
    </div> 
        
{{-- 
    
    
    <div class="row mt-4">
        <div class="col-lg-4 mb-lg-0 mb-4">
            <div class="card w-100 h-50">
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
                        <div class="col-lg-6 ms-auto text-center mt-5 mt-lg-0">
                            <div class="bg-gradient-dark border-radius-lg h-100 ">
                                <img src="../assets/img/shapes/waves-white.svg" class="position-absolute h-100 w-40 top-0 d-lg-block d-none" alt="waves">
                                <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                    <img class="w-40 position-relative z-index-2 pt-4" alt="rocket">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     --}}
    
    
      

    {{-- <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">All Users</h5>
                        </div>
                        <a href="#" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; New User</a>
                    </div>
                </div>

                
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Photo
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Name
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Email
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        role
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Creation Date
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">1</p>
                                    </td>
                                    <td>
                                        <div>
                                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Admin</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">admin@softui.com</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Admin</p>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">16/06/18</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit user">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <span>
                                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">2</p>
                                    </td>
                                    <td>
                                        <div>
                                            <img src="/assets/img/team-1.jpg" class="avatar avatar-sm me-3">
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Creator</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">creator@softui.com</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Creator</p>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">05/05/20</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit user">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <span>
                                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">3</p>
                                    </td>
                                    <td>
                                        <div>
                                            <img src="/assets/img/team-3.jpg" class="avatar avatar-sm me-3">
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Member</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">member@softui.com</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Member</p>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">23/06/20</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit user">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <span>
                                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">4</p>
                                    </td>
                                    <td>
                                        <div>
                                            <img src="/assets/img/team-4.jpg" class="avatar avatar-sm me-3">
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Peterson</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">peterson@softui.com</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Member</p>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">26/10/17</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit user">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <span>
                                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">5</p>
                                    </td>
                                    <td>
                                        <div>
                                            <img src="/assets/img/marie.jpg" class="avatar avatar-sm me-3">
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Marie</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">marie@softui.com</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Creator</p>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">23/01/21</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit user">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <span>
                                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
 
@endsection
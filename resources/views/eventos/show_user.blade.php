@extends('layouts.user_type.auth')

@section('content')
    <div>

        
        <div class="d-flex justify-content-between mb-2" style="margin-right: 6px; position: relative; ">
            <div class="col-xl-3 col-sm-4 " style="width: 19rem;">
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
                                        Info Usuario
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md icon-sm">
                                    <i class="fas fa-calendar-check text-xs opacity-10" aria-hidden="true" style="color: #ffff;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-body blur shadow-blur mx-0 mt-3">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="{{ $user->photo1 ? $user->photo1 : asset('assets/img/team-2.jpg') }}" alt="..." class="w-100 border-radius-lg shadow-sm">
                        
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ $user->name }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            {{ $user->rol }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid py-4 px-0">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">Información de Perfil</h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <form action="" method="POST" role="form text-left">
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
                                    <label for="user-name" class="form-control-label">Nombre Completo</label>
                                    <div class="@error('user.name')border border-danger rounded-3 @enderror">
                                        <input class="form-control" value="{{ $user->name }}" type="text"
                                            placeholder="Nombre" id="user-name" name="name" disabled>
                                        @error('name')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-email" class="form-control-label">{{ __('Email') }}</label>
                                    <div class="@error('email')border border-danger rounded-3 @enderror">
                                        <input class="form-control" value="{{ $user->email }}" type="email"
                                            placeholder="@example.com" id="user-email" name="email"  disabled>
                                        @error('email')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-ci" class="form-control-label">Carnet de Identidad</label>
                                    <div class="@error('ci')border border-danger rounded-3 @enderror">
                                        <input class="form-control" value="{{ $user->ci }}" type="text"
                                            placeholder="6287905 SC" id="user-ci" name="ci" disabled>
                                        @error('ci')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-password" class="form-control-label">Contraseña</label>
                                    <div class="@error('user.password')border border-danger rounded-3 @enderror">
                                        <input class="form-control" value="********" type="password"
                                            placeholder="Contraseña" id="user-password" name="password" disabled>
                                        @error('password')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user.phone" class="form-control-label">Celular</label>
                                    <div class="@error('user.phone')border border-danger rounded-3 @enderror">
                                        <input class="form-control" type="tel" placeholder="40770888444" id="number"
                                            name="phone" value="{{ $user->phone }}" disabled>
                                        @error('phone')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user.location" class="form-control-label">Dirección</label>
                                    <div class="@error('user.location') border border-danger rounded-3 @enderror">
                                        <input class="form-control" type="text" placeholder="Tu Ubicación" id="name"
                                            name="location" value="{{ $user->location }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <label for="about">Sobre Mi</label>
                            <div class="@error('user.about')border border-danger rounded-3 @enderror">
                                <textarea class="form-control" id="about" rows="3" placeholder="Di algo sobre ti" name="about_me" disabled>{{ $user->about_me }}</textarea>
                            </div>
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

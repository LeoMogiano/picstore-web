@extends('layouts.user_type.auth')

@section('content')
    <div>

        <div class="d-flex justify-content-between mb-4" style="margin-right: 8px; position: relative;">
            <div class="col-xl-3 col-sm-4 " style="width: 12.5rem;">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers mt-1">
                                    <h5 class="font-weight-bolder mb-0">
                                        Recibos
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md icon-sm">
                                    <i class="fa fa-file-invoice text-xs opacity-10" aria-hidden="true"
                                        style="color: #ffff;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        @if (Auth::user()->rol == 'Fotografo')
            <div class="row mb-10">
                <div class="col-12">
                    <div class="card mb-4 mx-0">
                        <div class="card-header pb-0">

                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ID
                                            </th>

                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Precio
                                            </th>

                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Fecha Creacion
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($ffotos as $ffoto)
                                            @foreach ($ffoto_users as $ffoto_user)
                                                @if($ffoto_user->foto_id == $ffoto->id)
                                                <tr>
                                                    <td class="ps-4">
                                                        <p class="text-xs font-weight-bold mb-0">#FOTO-{{ $ffoto_user->id }}
                                                        </p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p class="text-xs font-weight-bold mb-0">{{ $ffoto->precio }}</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $ffoto_user->updated_at }}</p>
                                                    </td>


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

        @if (Auth::user()->rol == 'Invitado' )
            <div class="row mb-10">
                <div class="col-12">
                    <div class="card mb-4 mx-0">
                        <div class="card-header pb-0">

                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ID
                                            </th>

                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Precio
                                            </th>

                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Fecha Creacion
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($ifotos as $ifoto)
                                            @foreach ($ifoto_users as $ifoto_user)
                                            @if ($ifoto_user->foto_id == $ifoto->id and $ifoto_user->user_id == Auth::user()->id )
                                                
                                           
                                                <tr>
                                                    <td class="ps-4">
                                                        <p class="text-xs font-weight-bold mb-0">#FOTO-{{ $ifoto_user->id }}
                                                        </p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p class="text-xs font-weight-bold mb-0">{{ $ifoto->precio }}</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $ifoto_user->updated_at }}</p>
                                                    </td>


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

    </div>
@endsection

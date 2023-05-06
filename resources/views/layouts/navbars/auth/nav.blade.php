<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Paginas</a></li>
                <li class="breadcrumb-item text-sm text-dark active text-capitalize" aria-current="page">
                    {{ str_replace('-', ' ', Request::path()) }}</li>
            </ol>
            <h6 class="font-weight-bolder mb-0 text-capitalize">{{ str_replace('-', ' ', Request::path()) }}</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 d-flex justify-content-end" id="navbar">

            <div class="nav-item text-center" style="margin-right: 0.65rem;">
                <a class="mt-3 text-dark font-weight-bold" href="{{ url('/user-profile') }}">
                    <div class="avatar avatar-sm rounded-circle mx-auto mt-2"
                        style="background-image: url('{{ Auth::user()->photo1 }}'); background-size: cover; background-position: center; width: 30px; height: 30px; ">
                    </div>
                </a>
            </div>


            <div class="nav-item text-center" style="margin-right: 0.50rem;">
                <a class="mt-3 text-dark font-weight-bold" href="{{ url('/user-profile') }}">
                    {{ Auth::user()->name }} &nbsp;
                </a>
            </div>

            {{--   NOTIFICACIONES --}}

            <li class="nav-item dropdown pe-2 d-flex align-items-center" style="margin-right: 0.50rem;">
                <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fa fa-bell cursor-pointer " id="bellIcon"></i>
                </a>
                <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                    {{-- <li class="mb-2">
                        <a class="dropdown-item border-radius-md" href="javascript:;">
                            <div class="d-flex py-1">
                                <div class="my-auto">
                                    <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="text-sm font-weight-normal mb-1">
                                        <span class="font-weight-bold">New message</span> from Laur
                                    </h6>
                                    <p class="text-xs text-secondary mb-0">
                                        <i class="fa fa-clock me-1"></i>
                                        13 minutes ago
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li> --}}

                </ul>
            </li>



            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-flex align-items-center">
                    <a href="{{ url('/logout') }}" class="nav-link text-dark font-weight-bold px-0">
                        <i class="fas fa-door-open"></i>
                        <span class="d-sm-inline d-none ">&nbsp; &nbsp;</span>
                    </a>
                </li>



            </ul>
        </div>
    </div>

    <style>
        .bell-icon-red {
            color: red;
        }
    </style>
    @if (Auth::user()->rol == 'Fotografo')
        <script src="https://cdn.socket.io/3.1.3/socket.io.min.js"
            integrity="sha384-cPwlPLvBTa3sKAgddT6krw0cJat7egBga3DJepJyrLl4Q9/5WLra3rrnMcyTyOnh" crossorigin="anonymous">
        </script>
        <script>
            // Process for listening to an event push.
            // too lazy to make a single source of socket.io connection
            // you can do it on your own :)
            /* const socket = io.connect('http://localhost:3030'); */
            const socket = io.connect('https://mogi-web-service.onrender.com');
            const userId = {!! auth()->id() !!};
           /*  console.log(userId); */
           var baseUrl = window.location.protocol + "//" + window.location.host;
            const bellIcon = document.getElementById('bellIcon'); // obtiene el elemento del ícono de la campana
            socket.on('notification_processed', (data) => {

                if (data.user_id == userId) {
                    console.log(data);
                    console.log(data);
                    // Cambia el color del ícono de la campana
                    bellIcon.style.color = 'red'; // cambia el color a rojo (puedes ajustar el valor al color deseado)
                    var dropdownList = document.querySelector('.dropdown-menu');

                    // Crea un nuevo elemento de lista
                    var newListItem = document.createElement('li');
                    newListItem.classList.add('mb-2');

                    // Crea el contenido del nuevo elemento de lista
                    var newListItemContent = `
                    <a class="dropdown-item border-radius-md" href="${baseUrl}/user_evento">
    <div class="d-flex py-1 px-2">
        <div class="my-auto">
            <img src="${data.item_imagen}" class="avatar avatar-xl me-3 "> 
        </div>
        <div class="d-flex flex-column justify-content-center ">
            <h6 class="text-sm font-weight-normal mb-0">
                <span class="font-weight-bold mb-0">Solicitud de Evento!</span> <br>
                ${data.item_name}
            </h6>
            <p class="text-xs text-secondary mb-0">
                <i class="fa fa-clock me-1"></i>
                ${data.item_date} at ${data.item_time}
            </p>
            <p class="text-xs text-secondary mb-0">
                <i class="fa fa-map-marker me-1"></i>
                ${data.item_location}
            </p>
        </div>
    </div>
</a>
`;

                    // Establece el contenido del nuevo elemento de lista
                    newListItem.innerHTML = newListItemContent;

                    // Agrega el nuevo elemento de lista a la lista del componente dropdown
                    dropdownList.appendChild(newListItem);
                }
                console.log('fin');
            });
        </script>
    @endif
    
    @if (Auth::user()->rol == 'Invitado')
        <script src="https://cdn.socket.io/3.1.3/socket.io.min.js"
            integrity="sha384-cPwlPLvBTa3sKAgddT6krw0cJat7egBga3DJepJyrLl4Q9/5WLra3rrnMcyTyOnh" crossorigin="anonymous">
        </script>
        <script>
            // Process for listening to an event push.
            // too lazy to make a single source of socket.io connection
            // you can do it on your own :)
            /* const socket = io.connect('http://localhost:3030'); */
            const socket = io.connect('https://mogi-web-service.onrender.com');
            const userId = {!! auth()->id() !!};
            console.log(userId);
            var baseUrl = window.location.protocol + "//" + window.location.host;
            const bellIcon = document.getElementById('bellIcon'); // obtiene el elemento del ícono de la campana
            socket.on('notification_processed_user', (data) => {

               /*  console.log(data); */

                if (data.user_id == userId) {

                    // Cambia el color del ícono de la campana
                    bellIcon.style.color = 'red'; // cambia el color a rojo (puedes ajustar el valor al color deseado)
                    var dropdownList = document.querySelector('.dropdown-menu');

                    // Crea un nuevo elemento de lista
                    var newListItem = document.createElement('li');
                    newListItem.classList.add('mb-2');

                    // Crea el contenido del nuevo elemento de lista
                    var newListItemContent = `
                    <a class="edit-link dropdown-item border-radius-md" href="${baseUrl}/eventos/${data.evento_id}/edit">
    <div class="d-flex py-1 px-2">
        <div class="my-auto">
            <img src="${data.foto_c}" class="avatar avatar-xl me-3 " style='object-fit: cover'> 
        </div>
        <div class="d-flex flex-column justify-content-center ">
            <h6 class="text-sm font-weight-normal mb-0">
                <span class="font-weight-bold mb-0">Apareces en una foto!</span> <br>
                #EVENTO-${data.evento_id}
            </h6>
            <p class="text-xs text-secondary mb-0">
                <i class="fa fa-clock me-1"></i>
                ${data.evento_name} 
            </p>
            <p class="text-xs text-secondary mb-0">
                <i class="fa fa-map-marker me-1"></i>
                ${data.evento_lugar}
            </p>
        </div>
    </div>
</a>
`;


                    // Establece el contenido del nuevo elemento de lista
                    newListItem.innerHTML = newListItemContent;

                    // Agrega el nuevo elemento de lista a la lista del componente dropdown
                    dropdownList.appendChild(newListItem);
                }
                console.log('fin');
            });
        </script>
    @endif
</nav>
<!-- End Navbar -->

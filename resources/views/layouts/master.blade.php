<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Samuda Chemical Complex Ltd.</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />

    <!-- <link rel="stylesheet" href="{{ asset('app-B9qh9vQm.css') }}">
    <script src="{{ asset('build/assets/app-Cs0QkU1O.js') }}" defer></script> -->
    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->

    <!-- font awesome -->
    <!-- <link rel="stylesheet" href="{{ asset('css/nuclue.css') }}"> -->

    <!-- Roboto font -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{asset('css/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/datatables-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/toastr.css')}}">



    @yield('style')
</head>

<body>
    <div id="app">



        <!-- <header id="header">
            

        </header> -->

        <div class="header">
            <nav class="navbar navbar-expand-md navbar-dark navbar-laravel mainmenu" id="mainmenu"
                style="background-color: #0fa4af">
                <!-- <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="background-color: #e3f2fd;#00669b;"> -->
                <!-- <nav class="navbar navbar-expand-lg bg-body-tertiary"> -->
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <!-- Samuda Chemical Complex Ltd. -->
                        <img src="https://scclbd.com/wp-content/uploads/2020/02/samuda-logo-white.png"
                            class="custom-logo" alt="Samuda" decoding="async">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto">

                            @guest
                            <li><a class="nav-link main_menu_link" href="{{ route('login') }}">{{ ('Login') }} </a></li>
                            <!-- <li><a class="nav-link main_menu_link" href="{{ route('register') }}">{{ ('Register') }}</a></li> -->
                            @else
                            <!-- <li><a class="nav-link main_menu_link" onclick="myFunction({{ url('/users') }})">Users</a> -->

                            <!-- <button type="button" class="button" id="user_menu">Users</button> -->
                            <!-- </li> -->

                            <!-- {{ route('users.index') }}
                            {{ route('roles.index') }} -->

                            <li><a class="nav-link main_menu_link routeToUser @if(Route::currentRouteName() =='users.index') active @endif"
                                    href="{{ route('users.index') }}">Users</a>
                            </li>

                            <li><a class="routeToRole nav-link main_menu_link @if(Route::currentRouteName() =='roles.index') active @endif"
                                    href="{{ route('roles.index') }}">Role</a></li>
                            <li><a class="routeToPort nav-link main_menu_link @if(Route::currentRouteName() =='ports.index') active @endif"
                                    href="{{ route('ports.index') }}">Port</a></li>

                            <!-- <li><a class="nav-link main_menu_link" href="{{ route('certificates.index') }}">Certificates</a></li> -->
                            <!-- <li><a id="tankRouter"
                                    class="routeToTank nav-link main_menu_link @if(Route::currentRouteName() =='tanks.index') active @endif">Tanks</a>
                            </li> -->
                            <!-- <li><a id="tankRouter"
                                    class="routeToTank nav-link main_menu_link @if(Route::currentRouteName() =='tanks.index') active @endif"
                                    href="{{ url('/tanks') }}">Tanks</a></li> -->
                            <li><a id="tankRouter"
                                    class="routeToTank nav-link main_menu_link @if(Route::currentRouteName() =='tanks.index') active @endif">Tanks</a>
                            </li>
                            <!-- <li><a class="nav-link main_menu_link" href="{{ route('tanks.index') }}">Tanks</a></li> -->
                            <li><a class="nav-link main_menu_link @if(Route::currentRouteName() =='lcs.index') active @endif"
                                    href="{{ url('/lcs') }}">LC</a>
                                <!-- <li><a class="nav-link main_menu_link" href="{{ route('lcs.index') }}">LC</a> -->
                            </li>
                            <li><a class="nav-link main_menu_link @if(Route::currentRouteName() =='positions.index') active @endif"
                                    href="{{ route('positions.index') }}">Tank
                                    Position</a></li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link main_menu_link dropdown-toggle" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>


                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('profile.edit')}}">
                                        Profile
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ ('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>




        <div id="loader" class="container">
            <div class="row">
                <div class="col-md-12 text-center p-5">
                    <!-- <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}"> -->
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
        </div>


        <div class="main d-none" id="main">
            <main class="py-4 bg-light">
                <div class="container" id="loadData">
                    @yield('content')
                </div>
            </main>
        </div>

        <div class="footer">
            @include('components.footer')
        </div>
    </div>
</body>




<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="{{asset('js/datatables.min.js')}}"></script>
<script src="{{asset('js/datatables-select.min.js')}}"></script>
<script src="{{asset('js/toastr.js')}}"></script>







<script>
// data table load in all tables

// $(document).ready(function() {
//     $('table').each(function() {
//         $(this).DataTable();
//     });
// });



// $('#user_menu').on('click', function(e) {
//     e.preventDefault();
//     window.location.href = "/users";
// })


// function myFunction(url) {
//     window.location.href = "/users";
// };



// $(document).ready(function() {
//     $.ajax({
//         url: "{{ route('tanks.allTanks') }}",
//         method: 'GET',
//         success: function(response) {
//             // If returning a view
//             $('#loadData').html(response);

//             // If returning JSON
//             // $('#content-container').html(JSON.stringify(response));
//         },
//         error: function(xhr) {
//             console.error(xhr.responseText);
//         }
//     });
// });







getAllTank();


function getAllTank() {
    axios.get('/allTanks').then(function(response) {

        if (response.status == 200) {

            $('#TankMainDiv').removeClass('d-none');
            $('#loaderTankDiv').addClass('d-none');

            $('#TankDataTable').DataTable().destroy();
            $('#TankTableBody').empty();

            var jsonData = response.data;


            $.each(jsonData, function(i, item) {




                var tp = jsonData[i].tank_position;

                var status = " "


                // console.log(tp[0].tank_status);

                if (tp.length > 0) {
                    status = tp[0].tank_status;
                }

                $('<tr>').html(
                    "<td>" + jsonData[i].id + "</td>" +
                    "<td>" + jsonData[i].tank_number + "</td>" +
                    "<td>" + jsonData[i].tank_owner + "</td>" +
                    "<td>" + jsonData[i].manufacturing_date + "</td>" +
                    "<td>" + jsonData[i].current_po_certificate + "</td>" +
                    "<td>" + jsonData[i].certificate_name + "</td>" +
                    "<td>" + jsonData[i].certificate_cost + "</td>" +
                    "<td>" + jsonData[i].last_test_date + "</td>" +
                    "<td>" + jsonData[i].expired_date + "</td>" +

                    "<td>" + status + "</td>" +


                    "<td>@can('tank-edit')<a class='TankEditBtn' data-id=" + jsonData[i]
                    .id +
                    "><i class='fas fa-edit'></i></a>&nbsp;&nbsp;&nbsp;@endcan @can('tank-list')<a class='showsingleTankdata text-warning'data-id=" +
                    jsonData[i].id +
                    "><i class='fas fa-eye'></i><a>@endcan  @can('tank-list') &nbsp;&nbsp;&nbsp;<a class='TankDelete text-danger'data-id=" +
                    jsonData[i].id + "><i class='fas fa-trash'></i><a>@endcan </td>"
                ).appendTo('#TankTableBody');
            });
            // show edit modal
            $('.TankEditBtn').click(function() {
                $('#UpdateTankModal').modal('show');
                var id = $(this).data('id');
                $('#UpdateTankId').html(id);
                $('#Update_Tank_Id').val(id);
                updateTankDetails(id);
            });

            // show delete modal
            $('.TankDelete').click(function() {
                $('#deleteTankModal').modal('show');
                var id = $(this).data('id');
                $('#deleteModalTankId').html(id);
            });

            // show dingle tank
            $('.showsingleTankdata').click(function() {
                $('#ShowsingleTank').modal('show');
                var id = $(this).data('id');
                showtankdetaildata(id);
            });


            $('#TankDataTable').DataTable({
                "order": false
            });
            $('.dataTables_length').addClass('bs-select');

        } else {
            $('#loaderTankDiv').addClass('d-none');
            $('#WrongUpdate').removeClass('d-none');
        }

    }).catch(function(error) {

        $('#loaderTankDiv').addClass('d-none');
        $('#WrongTankDiv').removeClass('d-none');
    });
}

$(document).ready(function() {
    $("#tankRouter").click(function() {
        // alert('hi');
        $.ajax({
            url: "{{ route('tanks.index') }}",
            method: 'GET',
            success: function(response) {
                // If returning a view
                $('#loadData').html(response);
                getAllTank();

                // If returning JSON
                // $('#content-container').html(JSON.stringify(response));
            },
            error: function(xhr) {
                console.error(xhr.responseText);
            }
        });
    });
})



document.onreadystatechange = function() {
    if (document.readyState !== "complete") {
        document.querySelector("#loader").style.visibility = "visible";
    } else {
        document.querySelector("#loader").style.display = "none";
        document.getElementById("main").classList.remove("d-none");
    }
};


// nav loading code



// function ajax(url, callback) {
//     var xhr = new window.XMLHttpRequest();
//     xhr.open("GET", url + "?rel=page", true);
//     xhr.onload = function() {
//         if (xhr.readyState === xhr.DONE && (xhr.status >= 200 && xhr.status < 300)) {
//             if (this.response) {
//                 callback.call(this, this.response);
//             }
//         }
//     }
//     xhr.send();
// }


// var anchor = document.querySelectorAll("a[rel=page]");
// [].slice.call(anchor).forEach(function(trigger) {
//     trigger.addEventListener("click", function(e) {
//         e.preventDefault();

//         var pageUrl = this.getAttribute("href");

//         ajax(pageUrl, function(data) {
//             document.querySelector("#loadData").innerHTML = data;
//         });

//         if (pageUrl != window.location) {
//             window.history.pushState({
//                 url: pageUrl
//             }, '', pageUrl);
//         }
//         return false;
//     })
// });

// window.addEventListener("popstate", function() {
//     ajax(this.window.location.pathname, function(data) {
//         document.querySelector("#loadData").innerHTML = data;
//     });
// });












// 
</script>




@yield('script')


</html>
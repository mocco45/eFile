<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/img/kongwa/kongwa-logo.png">
    <title>
        eFile-System
    </title>
    <!--     Fonts and icons     -->
    <link href="assets/css/opensans.css" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
    {{-- custom --}}
    <link rel="stylesheet" href="assets/css/semantic.min.css">
    <link rel="stylesheet" href="assets/css/datatables.semanticui.min.css">
    <link rel="stylesheet" type="text/css" href="asset/css/toastify.min.css">
    <script src="assets/js/jquery-3.7.0.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.semanticui.min.js"></script>
    <script src="assets/js/semantic.min.js"></script>
    <!-- Font Awesome Icons -->
    <script src="assets/js/kit.fontawesome.js" crossorigin="anonymous"></script>
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="assets/css/argon-dashboard.css" rel="stylesheet" />
</head>

<body class="{{ $class ?? '' }}">

    @guest
        @yield('content')
    @endguest

    @auth
        @if (in_array(request()->route()->getName(), ['sign-in-static', 'sign-up-static', 'login', 'register', 'recover-password',]))
            @yield('content')
        @else
            @if (!in_array(request()->route()->getName(), ['profile', 'profile-static']))
                <div class="min-height-300 bg-primary position-absolute w-100"></div>
            @elseif (in_array(request()->route()->getName(), ['profile-static', 'profile']))
                <div class="position-absolute w-100 min-height-300 top-0" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'); background-position-y: 50%;">
                    <span class="mask bg-primary opacity-6"></span>
                </div>
            @endif
            @include('layouts.navbars.auth.sidenav')
                <main class="main-content border-radius-lg">
                    @yield('content')
                </main>
            @include('components.fixed-plugin')
        @endif
    @endauth

    <!--   Core JS Files   -->
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script type="text/javascript" src="assets/js/toastify-js.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <script>
        $(document).ready( function () {
         $('#myTable').DataTable({
            buttons: [
              'copy', 'excel', 'pdf'
            ],
          
         });

         $('.dropdown-toggle').dropdown();
         $('.dropdown-menu.keep-open').on('click', function (e) {
        e.stopPropagation();
    });

    $('#uploadArea').on('drag dragstart dragend dragover dragenter dragleave drop', function(e) {
            e.preventDefault();
            e.stopPropagation();
        })
        .on('dragover dragenter', function() {
            $(this).addClass('dragover');
        })
        .on('dragleave dragend drop', function() {
            $(this).removeClass('dragover');
        })
        .on('drop', function(e) {
            var file = e.originalEvent.dataTransfer.files[0];
            handleFile(file);
        });

        $('#profilePicture').change(function(e) {
            var file = e.target.files[0];
            handleFile(file);
        });

        $('#uploadIcon').click(function() {
            $('#profilePicture').click();
        });

        function handleFile(file) {
            var uploadArea = $('#uploadArea');
            var uploadedImage = uploadArea.find('.uploaded-image');
            var uploadedLink = uploadedImage.find('.image-link');

            if (file) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    uploadedLink.attr('href', event.target.result);
                    uploadedLink.html(`<img src="${event.target.result}" class="img-fluid" alt="Uploaded Image">`);
                    uploadedImage.removeClass('d-none');
                    uploadArea.find('i, p').addClass('d-none');
                };
                reader.readAsDataURL(file);
            }
        }

        $('.uploaded-image .image-link').click(function() {
            $('#profilePicture').click();
        });

        
    });
     </script>
     @yield('form-sub')
     @yield('update-form')
     @yield('pass')
     @yield('upload')
     @yield('delete')
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="assets/js/argon-dashboard.js"></script>
    @stack('js');
</body>

</html>

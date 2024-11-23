<!DOCTYPE html>
<html lang="en"lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> {{ config('app.name', 'E-commerce') }} {{ $title ?? ''}}</title>
    <script type="module" src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>
    <!-- CSS Libraries -->
    @vite(['resources/js/app.css.js'])
    @vite(['resources/css/app.css'])
    {{ $styles ?? '' }}
    @vite(['resources/js/app-init.js', 'resources/js/app.js'])

</head>

<body class="sidebar-mini">

    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <x-preloader></x-preloader>
    <!-- ============================================================== -->
    <!-- Preloader end -->
    <!-- ============================================================== -->

    <div id="app">
        {{-- @props(['data']) --}}
        <div class="main-wrapper">
            <x-partials.header></x-partials.header>
            <x-partials.sideBar></x-partials.sideBar>
            <!-- Main Content -->
            <div class="main-content">
                {{ $maincontent ?? '' }}
            </div>
            <!-- Footer Content here-->
                {{-- Code here.... --}}
            <!-- Footer Content here-->
        </div>
    </div>


    {{ $scripts ?? '' }}

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (typeof window.Echo !== "undefined") {
                var userId = @json(auth()->check() ? auth()->user()->id : null);
                window.Echo.channel(`private-chat.${userId}`).listen(".PrivateMessage", (data) => {
                    console.log("Notification received:", data);

                    if (data && data.title && data.remarks) {
                        toastr.info(
                            `<div class="notification-content">
                            <i class="fas fa-user"></i> <span>${data.title}</span>
                            <i class="fas fa-book" style="margin-left: 20px;"></i> <span>${data.remarks}</span>
                        </div>`,
                            "New Category Notification", {
                                closeButton: true,
                                progressBar: true,
                                timeOut: 0,
                                extendedTimeOut: 0,
                                positionClass: "toast-top-right",
                                enableHtml: true,
                            }
                        );
                    } else {
                        console.error("Invalid data received:", data);
                    }
                });
            } else {
                console.error("window.Echo is not defined");
            }
        });
    </script>

</body>

</html>

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
    {{-- <script type="module" src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Toastr JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>



    <!-- CSS Libraries -->
    @vite(['resources/js/app.css.js'])
    @vite(['resources/css/app.css'])
    {{ $styles ?? '' }}
    @vite(['resources/js/app-init.js', 'resources/js/app.js'])

    <style>
        /* Custom style for Toastr notifications */
        .toast-info .toast-message {
            display: flex;
            align-items: center;
        }

        .toast-info .toast-message i {
            margin-right: 10px;
        }

        .toast-info .toast-message .notification-content {
            display: flex;
            flex-direction: row;
            align-items: center;
        }
    </style>
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


    <script type="module">
        document.addEventListener('DOMContentLoaded', function() {
            $(document).ready(function() {
                $("#app").show();
            });
        }, false);
    </script>


<script>

document.addEventListener("DOMContentLoaded", function() {
    if (typeof window.Echo !== "undefined") {
        // Laravel থেকে প্রাপ্ত ইউজার ID পাঠানো
        var user_id = @json(auth()->user()->id);

        Echo.private('category.' + user_id) // শুধু নিজস্ব চ্যানেল সাবস্ক্রাইব করবে
            .listen('.category.created', (event) => {
                console.log("Pusher Notification received:", event.category);
        toastr.success(
            `<div class="notification-content">
                <i class="fas fa-user"></i> <span>${event.category.author}</span>
                <i class="fas fa-book" style="margin-left: 20px;"></i> <span>${event.category.title}</span>
            </div>`,
            'New Post Notification', {
                closeButton: true,
                progressBar: true,
                timeOut: 0, // Set timeOut to 0 to make it persist until closed
                extendedTimeOut: 0, // Ensure the notification stays open
                positionClass: 'toast-top-right',
                enableHtml: true
            }
        );
            });


            Echo.private('notification.' + user_id) // শুধু নিজস্ব চ্যানেল সাবস্ক্রাইব করবে
            .listen('.category.created', (event) => {
                console.log("2nd Pusher Notification received:", event.category);
        toastr.warning(
            `<div class="notification-content">
                <i class="fas fa-user"></i> <span>${event.category.author}</span>
                <i class="fas fa-book" style="margin-left: 20px;"></i> <span>${event.category.title}</span>
            </div>`,
            'New Notify Notification', {
                closeButton: true,
                progressBar: true,
                timeOut: 0, // Set timeOut to 0 to make it persist until closed
                extendedTimeOut: 0, // Ensure the notification stays open
                positionClass: 'toast-top-left',
                enableHtml: true
            }
        );
            });

            var role = @json(auth()->user()->role);
            Echo.private('category.role.' + role) // শুধু নিজস্ব চ্যানেল সাবস্ক্রাইব করবে
            .listen('.category.created', (event) => {
                console.log("Role Pusher Notification received:", event.category);
        toastr.warning(
            `<div class="notification-content">
                <i class="fas fa-user"></i> <span>${event.category.author}</span>
                <i class="fas fa-book" style="margin-left: 20px;"></i> <span>${event.category.title}</span>
            </div>`,
            'New Notify Notification', {
                closeButton: true,
                progressBar: true,
                timeOut: 0, // Set timeOut to 0 to make it persist until closed
                extendedTimeOut: 0, // Ensure the notification stays open
                positionClass: 'toast-top-right',
                enableHtml: true
            }
        );
            });


            Echo.private('App.Models.User.' + user_id)
                .notification((notification) => {
                console.log('Notification received:', notification.category);
                toastr.info(
            `<div class="notification-content">
                <i class="fas fa-user"></i> <span>${notification.category.author}</span>
                <i class="fas fa-book" style="margin-left: 20px;"></i> <span>${notification.category.title}</span>
            </div>`,
            'Using Notify Notification', {
                closeButton: true,
                progressBar: true,
                timeOut: 0, // Set timeOut to 0 to make it persist until closed
                extendedTimeOut: 0, // Ensure the notification stays open
                positionClass: 'toast-top-right',
                enableHtml: true
            }
        );
    });

    }
});


//    document.addEventListener("DOMContentLoaded", function() {
//     if (typeof window.Echo !== "undefined") {
//     window.Echo.channel("notifications")
//         .listen(".post.created", (data) => {
//             console.log("Data received in frontend:", data);
//             alert(`New Post by ${data.author}: ${data.title}`);
//         })
//         .error((error) => {
//             console.error("Error connecting to channel:", error);
//         });
// } else {
//     console.error("Laravel Echo not initialized.");
// }
// });

</script>





</body>

</html>

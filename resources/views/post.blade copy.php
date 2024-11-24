<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Toastr JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- Pusher JavaScript -->
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>



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

<body>
    <div class="container mt-5">
        <h1>Create a New Post</h1>

        <!-- Display success message if available -->
        @if (session('successs'))
            <div class="alert alert-success">
                {{ session('successs') }}
            </div>
        @endif

        <!-- Display validation errors if any -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" id="author" name="author" class="form-control" value="{{ old('author') }}"
                    required placeholder="Author Name">
            </div>

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}"
                    required placeholder="Title">
            </div>

            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    {{-- <script>
        console.log(window.Echo);
        window.Echo.channel('notification') // চ্যানেলের নাম
            .listen('.post.created', (event) => { // ইভেন্টের নাম
                console.log(`New Post Created by ${event.author}: ${event.title}`);
            });
    </script> --}}

<script>
    console.log(window.location.hostname);
    if (window.location.hostname === '127.0.0.1') {
        Pusher.logToConsole = true;
    }
    // Initialize Pusher
    var pusher = new Pusher('edc13386fb53b7b05a63', {
        cluster: 'mt1'
    });

    // Subscribe to the channel
    var channel = pusher.subscribe('notification');

    // Bind to the event
    channel.bind('post.created', function(data) {
        console.log('Received data:', data); // Debugging line

        // Display Toastr notification with icons and inline content

            toastr.info(
                `<div class="notification-content">
                    <i class="fas fa-user"></i> <span>   ${data.author}</span>
                    <i class="fas fa-book" style="margin-left: 20px;"></i> <span>  ${data.title}</span>
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

    // Debugging line
    pusher.connection.bind('connected', function() {
        console.log('Pusher is connected');
    });
</script>
</body>

</html>

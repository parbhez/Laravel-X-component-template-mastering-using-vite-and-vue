<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <!-- Bootstrap CSS -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
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
        <div id="success-message" class="alert alert-success d-none"></div>
        <div id="error-message" class="alert alert-danger d-none"></div>

        <form id="post-form">
            @csrf
            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" id="author" name="author" class="form-control" required placeholder="Author Name">
            </div>

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" class="form-control" required placeholder="Title">
            </div>

            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>



    {{-- <script>
        console.log(window.Echo);
        window.Echo.channel('notification') // চ্যানেলের নাম
            .listen('.post.created', (event) => { // ইভেন্টের নাম
                console.log(`New Post Created by ${event.author}: ${event.title}`);
            });
    </script> --}}

<script>

$(document).ready(function () {
    $('#post-form').on('submit', function (e) {
        e.preventDefault(); // Prevent the default form submission

        // Collect form data
        let formData = {
            author: $('#author').val(),
            title: $('#title').val(),
            _token: $('input[name="_token"]').val(), // CSRF Token
        };

        // AJAX request
        $.ajax({
            url: "{{ route('posts.store') }}", // Replace with your route
            type: "POST",
            data: formData,
            success: function (response) {
                // Show success message
                $('#success-message').removeClass('d-none').html(response.message);

                // Clear form inputs
                $('#post-form')[0].reset();
            },
            error: function (xhr) {
                // Show error messages
                let errors = xhr.responseJSON.errors;
                let errorHtml = '<ul>';
                for (let key in errors) {
                    errorHtml += `<li>${errors[key]}</li>`;
                }
                errorHtml += '</ul>';

                $('#error-message').removeClass('d-none').html(errorHtml);
            }
        });
    });
});




    console.log(window.location.hostname);
    if (window.location.hostname === '127.0.0.1') {
        Pusher.logToConsole = true;
    }
    // Initialize Pusher
    var pusher = new Pusher('edc13386fb53b7b05a63', {
        cluster: 'mt1'
    });

    var channel = pusher.subscribe('notification');
channel.bind('post.created', function(data) {
    console.log('Received data:', data);
    toastr.info(`New Post by ${data.author}: ${data.title}`);
});
    // Debugging line
    pusher.connection.bind('connected', function() {
        console.log('Pusher is connected');
    });
</script>
</body>

</html>

<x-app-layout>

    <x-slot name="maincontent">
        <section class="section">
            <div class="section-header">
                <h1>Create a New Category</h1>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form</h4>
                        </div>

                         <!-- Display success message if available -->
        <div id="success-message" class="alert alert-success d-none"></div>
        <div id="error-message" class="alert alert-danger d-none"></div>
                        <div class="card-body">
                            <form action="{{ route('categories.store') }}" method="POST" id="postForm">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <x-form.input title="Author" id="author" type="text" name="author"
                                            placeholder="Enter author name"></x-form.input>
                                    </div>
                                    <div class="col-md-6">
                                        <x-form.input title="Title" id="title" type="text" name="title"
                                            placeholder="Enter title"></x-form.input>
                                    </div>
                                </div>
                                <x-form.button :type="'submit'" class="btn btn-primary" :title="'Submit'"></x-form.button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </x-slot>

    <x-slot name="scripts">
        <script type="module">
            $(document).ready(function () {
        $('#postForm').on('submit', function (e) {
            e.preventDefault();  // Prevent the default form submission

            var formData = $(this).serialize();  // Serialize form data

            $.ajax({
                url: $(this).attr('action'),  // Form action URL
                type: 'POST',  // HTTP method
                data: formData,  // Data to send

                success: function (response) {
                // Show success message
                $('#success-message').removeClass('d-none').html(response.success);

                // Clear form inputs
                $('#postForm')[0].reset();
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
        </script>

    </x-slot>



</x-app-layout>

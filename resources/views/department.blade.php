<x-app-layout>

    <x-slot name="maincontent">
        <section class="section">
            <div class="section-header">
                <h1>Department</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="#">
                            <i class="fas fa-tachometer-alt"></i> Department
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <a href="#">
                            <i class="far fa-file"></i> Department
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <i class="fas fa-list"></i> Department
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form</h4>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <x-form.input title="Email" id="email" type="text" name="email"
                                            placeholder="Enter Email Address"></x-form.input>
                                    </div>
                                    <div class="col-md-6">
                                        <x-form.input title="Password" id="password" type="password" name="password"
                                            placeholder="Enter Password"></x-form.input>
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




</x-app-layout>

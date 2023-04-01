<template>
    <section class="section">
        <div class="section-header">
        <h1>Dashboard</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">
                <a href="#">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </div>
            <div class="breadcrumb-item">
                <a href="#">
                    <i class="far fa-file"></i> Dashboard
                </a>
            </div>
            <div class="breadcrumb-item">
                <i class="fas fa-list"></i> Dashboard
            </div>
        </div>
    </div>


        <total-admin></total-admin>

         <!-- <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Recent Activities</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border">
                            <li class="media">
                                <img
                                    class="mr-3 rounded-circle"
                                    width="50"
                                    src="assets/img/avatar/avatar-1.png"
                                    alt="avatar"
                                />
                                <div class="media-body">
                                    <div class="float-right text-primary">
                                        Now
                                    </div>
                                    <div class="media-title">
                                        Farhan A Mujib
                                    </div>
                                    <span class="text-small text-muted"
                                        >Cras sit amet nibh libero, in gravida
                                        nulla. Nulla vel metus scelerisque ante
                                        sollicitudin.</span
                                    >
                                </div>
                            </li>
                            <li class="media">
                                <img
                                    class="mr-3 rounded-circle"
                                    width="50"
                                    src="assets/img/avatar/avatar-2.png"
                                    alt="avatar"
                                />
                                <div class="media-body">
                                    <div class="float-right">12m</div>
                                    <div class="media-title">Ujang Maman</div>
                                    <span class="text-small text-muted"
                                        >Cras sit amet nibh libero, in gravida
                                        nulla. Nulla vel metus scelerisque ante
                                        sollicitudin.</span
                                    >
                                </div>
                            </li>
                            <li class="media">
                                <img
                                    class="mr-3 rounded-circle"
                                    width="50"
                                    src="assets/img/avatar/avatar-3.png"
                                    alt="avatar"
                                />
                                <div class="media-body">
                                    <div class="float-right">17m</div>
                                    <div class="media-title">Rizal Fakhri</div>
                                    <span class="text-small text-muted"
                                        >Cras sit amet nibh libero, in gravida
                                        nulla. Nulla vel metus scelerisque ante
                                        sollicitudin.</span
                                    >
                                </div>
                            </li>
                            <li class="media">
                                <img
                                    class="mr-3 rounded-circle"
                                    width="50"
                                    src="assets/img/avatar/avatar-4.png"
                                    alt="avatar"
                                />
                                <div class="media-body">
                                    <div class="float-right">21m</div>
                                    <div class="media-title">
                                        Alfa Zulkarnain
                                    </div>
                                    <span class="text-small text-muted"
                                        >Cras sit amet nibh libero, in gravida
                                        nulla. Nulla vel metus scelerisque ante
                                        sollicitudin.</span
                                    >
                                </div>
                            </li>
                        </ul>
                        <div class="text-center pt-1 pb-1">
                            <a
                                href="#"
                                class="btn btn-primary btn-lg btn-round"
                            >
                                View All
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- {{-- <x-input type="password" name="money"></x-input> --}} -->

    </section>
</template>

<script>
import TotalAdmin from "./TotalAdmin.vue"
export default {
    props: {
        data: {
            type: Array,
            default: 'None'
        }
    },
    components: {
        TotalAdmin,
    },

    mounted() {
    },
    data() {
        return {
            categories: [
                { name: 'Gents' },
                { name: 'Ladies' },
                { name: 'Kids' },
            ]
        };
    }
};
</script>

<template>
    <div class="row">
        <div class="col-lg-8 col-md-6 col-sm-6 col-12">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-hands-usd"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Courses</h4>
                            </div>
                            <div class="card-body">100</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="far fa-hands-usd"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Videos</h4>
                            </div>
                            <div class="card-body">350</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-info">
                            <i class="far fa-users"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Participants</h4>
                            </div>
                            <div class="card-body">620</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-sack-dollar"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Instructor</h4>
                            </div>
                            <div class="card-body">36</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div
                class="card card-statistic-1"
                style="
                    background-color: #fff0;
                    box-shadow: 0 0px 0px rgb(0 0 0 / 3%);
                "
            >
                <div id="clock">
                    <div class="hour">
                        <div class="min"></div>
                        <div class="min"></div>
                        <div class="min"></div>
                        <div class="min"></div>
                        <div class="min"></div>
                    </div>
                    <div class="hour">
                        <div class="min"></div>
                        <div class="min"></div>
                        <div class="min"></div>
                        <div class="min"></div>
                        <div class="min"></div>
                    </div>
                    <div id="alarm"></div>
                    <div id="min"></div>
                    <div id="hour"></div>
                    <div id="sec"></div>
                    <ol>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log(this.$parent.categories);

        $(document).ready(function () {
            window.requestAnimFrame = (function () {
                return (
                    window.requestAnimationFrame ||
                    window.webkitRequestAnimationFrame ||
                    window.mozRequestAnimationFrame ||
                    function (callback) {
                        window.setTimeout(callback, 1000 / 60);
                    }
                );
            })();
            //initialize the clock in a self-invoking function
            (function clock() {
                var hour = document.getElementById("hour"),
                    min = document.getElementById("min"),
                    sec = document.getElementById("sec");
                //set up a loop
                (function loop() {
                    requestAnimFrame(loop);
                    draw();
                })();
                //position the hands
                function draw() {
                    var now = new Date(), //now
                        then = new Date(
                            now.getFullYear(),
                            now.getMonth(),
                            now.getDate(),
                            0,
                            0,
                            0
                        ), //midnight
                        diffInMil = now.getTime() - then.getTime(), // difference in milliseconds
                        h = diffInMil / (1000 * 60 * 60), //hours
                        m = h * 60, //minutes
                        s = m * 60; //seconds
                    //rotate the hands accordingly
                    sec.style.webkitTransform = "rotate(" + s * 6 + "deg)";
                    hour.style.webkitTransform =
                        "rotate(" + (h * 30 + h / 2) + "deg)";
                    min.style.webkitTransform = "rotate(" + m * 6 + "deg)";
                }
            })();
        });
    },
    method: {},
};
</script>

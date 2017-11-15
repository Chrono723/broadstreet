<template>
    <div class=" post-parallax">
        <div class="relative page-content">
            <div class="dark-overlay"></div>
            <div class="container">
                <div class="row OverLord-Shadow-Main splitDisplayContainer Ol-Panel-Dark-Cyan-Dotted">
                    <div class="col-md-6">
                        <div class="v-middle">
                            <h3 class="light-txt text-uppercase OL-White-Title">Quality Policy</h3>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="light-txt space" style="margin-top: 40px;">
                            <h4 class="text-uppercase light-txt" style="text-align: -webkit-center;">
                                We are here for our Customers !
                                <hr class="hrDesignFixed"/>
                            </h4>


                            <p  style="text-align: -webkit-center; color: #ffffff !important">
                                Gow-Mac Instruments Company is committed to providing quality products and services,
                                shipped on time, that meet our customers' specifications. We will achieve this goal by
                                continuously improving our quality management system.                            </p>

                            <div class="p-top-30">

                                <!-- progress bar start -->
                                <div class="progress massive-progress OverLord-Shadow-Main Ol-Panel-Dark-Cyan-Dotted">
                                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                        QC Approval <span>80%</span>
                                    </div>
                                </div>
                                <!-- progress bar end -->

                                <!-- progress bar start -->
                                <div class="progress massive-progress OverLord-Shadow-Main Ol-Panel-Dark-Cyan-Dotted">
                                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                                        Delivery Performance <span>90%</span>
                                    </div>
                                </div>
                                <!-- progress bar end -->

                                <!-- progress bar start -->
                                <div class="progress massive-progress OverLord-Shadow-Main Ol-Panel-Dark-Cyan-Dotted">
                                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="91" aria-valuemin="0" aria-valuemax="100">
                                        Customer Satisfaction <span>91% </span>
                                    </div>
                                </div>
                                <!-- progress bar end -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
    .splitDisplayContainer{
        background-color: rgba(0, 0, 0, 0.65);
        padding:15px;
    }
    .hrDesignFixed {
        border: 0;
        height: 1px;
        float: left;
        width: 100%;
        margin: 5px;
        background-image: -webkit-gradient(linear, left top, right top, from(rgba(39, 235, 255, 0)), color-stop(rgba(17, 145, 132, 0.75)), to(transparent));
        background-image: linear-gradient(to right, rgba(39, 235, 255, 0), rgba(17, 145, 132, 0.75), transparent);
        -webkit-box-shadow: 0 4px 5px -10px rgba(39, 39, 39, 0.83) inset;
        box-shadow: 0 4px 5px -10px rgba(39, 39, 39, 0.83) inset;
    }
</style>

<script>

    export default {
        props: [

        ],
        watch:{

        },

        data(){
            return {

            }

        },
        computed:{

        },


        mounted(){
            let self = this;
            self.initialize();
            $("#loading-progress").imagesLoaded(function(){
                self.$emit('done-loading');
            });

        },

        methods:{
            animateProgressbar(pb) {
                if ($(pb).data("animated") === 0) {
                    if ($(pb).visible()) {
                        $(pb).css("width", $(pb).attr("aria-valuenow") + "%");
                        $(pb).data("animated", 1);
                    }
                }
            },
            initialize(){
                let self = this;
                let progressBar = $(".progress-bar");
                progressBar.each(function (indx) {
                    $(this).data("animated", 0);
                    if ($.fn.visible) {
                        self.animateProgressbar(this);
                    }
                });
                $(window).on("scroll", function () {
                    if ($.fn.visible) {
                        progressBar.each(function () {
                            self.animateProgressbar(this);
                        })
                    }
                });
            }

        }
    }
</script>
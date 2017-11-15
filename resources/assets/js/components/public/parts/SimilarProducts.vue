<template>
    <overlord_container data_top='false' data_bottom='false' background-color="transparent">
        <div class="row Panel-Color-Gradient" style="margin-top: -200px;">
            <div class="col-md-12">

                <div class="heading-title-alt text-left" style="padding-top:50px;">
                    <h3 class="text-uppercase">similar items </h3>
                    <span class="text-uppercase">We have 14 similar product currently in stock</span>
                </div>

                <!--portfolio carousel -->

                <div id="portfolio-carousel" class=" portfolio-with-title col-3 ">
                    <div class="portfolio-item">
                        <div class="thumb">
                            <img src="images/products/instrument-back.png" alt="">
                            <div class="portfolio-hover">
                                <div class="action-btn">
                                    <a href="images/products/instrument-back.png" class="popup-link" title="lightbox view"> <i class="icon-basic_magnifier"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-title">
                            <h4><a href="images/products/instrument-back.png" class="popup-link" title="lightbox view">CROPPED SKINNY ISA JEANS</a></h4>
                            <p class="txt-xl">$59.00</p>
                        </div>
                    </div>

                    <div class="portfolio-item">
                        <div class="thumb">
                            <img src="images/products/instrument-back.png" alt="">
                            <div class="portfolio-hover">
                                <div class="action-btn">
                                    <a href="images/products/instrument-back.png" class="popup-link" title="lightbox view"> <i class="icon-basic_magnifier"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-title">
                            <h4><a href="images/products/instrument-back.png" class="popup-link" title="lightbox view">denouncing pleasure</a></h4>
                            <p class="txt-xl">$49.00</p>
                        </div>
                    </div>

                    <div class="portfolio-item">
                        <div class="thumb">
                            <img src="images/products/instrument-back.png" alt="">
                            <div class="portfolio-hover">
                                <div class="action-btn">
                                    <a href="images/products/instrument-back.png" class="popup-link" title="lightbox view"> <i class="icon-basic_magnifier"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-title">
                            <h4><a href="images/products/instrument-back.png" class="popup-link" title="lightbox view">annoyances accepted</a></h4>
                            <p class="txt-xl">$69.00</p>
                        </div>
                    </div>

                    <div class="portfolio-item">
                        <div class="thumb">
                            <img src="images/products/instrument-back.png" alt="">
                            <div class="portfolio-hover">
                                <div class="action-btn">
                                    <a href="images/products/instrument-back.png" class="popup-link" title="lightbox view"> <i class="icon-basic_magnifier"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-title">
                            <h4><a href="images/products/instrument-back.png" class="popup-link" title="lightbox view">annoyances accepted</a></h4>
                            <p class="txt-xl">$79.00</p>
                        </div>
                    </div>

                    <div class="portfolio-item">
                        <div class="thumb">
                            <img src="images/products/instrument-back.png" alt="">
                            <div class="portfolio-hover">
                                <div class="action-btn">
                                    <a href="images/products/instrument-back.png" class="popup-link" title="lightbox view"> <i class="icon-basic_magnifier"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-title">
                            <h4><a href="images/products/instrument-back.png" class="popup-link" title="lightbox view">annoyances accepted</a></h4>
                            <p class="txt-xl">$69.00</p>
                        </div>
                    </div>

                    <div class="portfolio-item">
                        <div class="thumb">
                            <img src="images/products/instrument-back.png" alt="">
                            <div class="portfolio-hover">
                                <div class="action-btn">
                                    <a href="images/products/instrument-back.png" class="popup-link" title="lightbox view"> <i class="icon-basic_magnifier"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-title">
                            <h4><a href="images/products/instrument-back.png" class="popup-link" title="lightbox view">annoyances accepted</a></h4>
                            <p class="txt-xl">$59.00</p>
                        </div>
                    </div>

                </div>

                <!--portfolio carousel -->

            </div>
        </div>
    </overlord_container>
</template>

<script>

    export default{
        props:['product'],
        components:{

        },
        watch: {

        },

        data(){
            return {



            };
        },
        ready:function(){
            let self = this;
            setTimeout(function() {
                self.initOwl();
            }, 0);

        },
        updated:function(){
            let self = this;
            this.$nextTick( function(){
                self.initOwl();
            });
        },
        mounted(){
            let self = this;
            this.$nextTick( function(){
                self.initOwl();
            });


        },
        methods: {
            initOwl(){
                $("#portfolio-carousel").owlCarousel({
                    autoPlay: 3000, //Set AutoPlay to 3 seconds
                    items: 3,
                    itemsDesktop: [1199, 3],
                    itemsDesktopSmall: [979, 3],
                    navigation: true,
                    pagination: false,
                    navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]

                });
                $(".portfolio-with-title").addClass("portfolio");
            },

        }


    }
</script>
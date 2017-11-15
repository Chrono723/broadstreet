<template>
    <overlord_container data_top='false' data_bottom='false' background-color="transparent">
        <div class="row" id="loading-progress">

            <div class="m-bot-80 inline-block">
                <!--title-->
                <div class="heading-title-alt border-short-bottom text-center" style="margin-top:100px;">
                    <h3 class="text-uppercase OL-White-Title-Extra-Large">Custom Solutions for your Gas Analysis Needs</h3>
                    <div class="half-txt WeeBeats-features-description">Versatile • Reliable • Dependable</div>
                </div>
                <!--title-->
            </div>

            <div class="col-md-4 animated" id="versatile">
                <div class="featured-item feature-border-box text-left">
                    <div class="icon">
                        <i class="icon-tools"></i>
                    </div>
                    <div class="title text-uppercase">
                        <h4 class="WeeBeats-TealTrans-Title-20">Versatile</h4>
                    </div>
                    <div class="desc">
                        Our line of gas analysis solutions is extensive. Depending on the targeted application,
                        GOW-MAC gas chromatographs and gas analyzers may use TCD, PID, FID, FPD, HFADD, colorimetric,
                        or electro-optical detection to provide solutions for a wide range of applications.
                    </div>
                </div>
            </div>
            <div class="col-md-4 animated" id="reliable">
                <div class="featured-item feature-border-box text-left">
                    <div class="icon">
                        <i class="icon-tools"></i>
                    </div>
                    <div class="title text-uppercase">
                        <h4 class="WeeBeats-TealTrans-Title-20">Reliable</h4>
                    </div>
                    <div class="desc">
                        Since the early days, GCs and gas analyzers bearing the GOW-MAC name have been produced and shipped to nearly every country worldwide.
                    </div>
                </div>
            </div>
            <div class="col-md-4 animated" id="dependable">
                <div class="featured-item feature-border-box text-left">
                    <div class="icon">
                        <i class="icon-tools"></i>
                    </div>
                    <div class="title text-uppercase">
                        <h4 class="WeeBeats-TealTrans-Title-20">Dependable</h4>
                    </div>
                    <div class="desc">
                        GOW-MAC Instrument Co. is committed to providing quality products and services that meet our customer’s specifications.
                        We will meet these objectives by continually improving our management systems and processes.
                    </div>
                </div>
            </div>
        </div>
        <div class="dark">
            <div class="overlay-dark" style="padding: 112px 0;">
                <div class="container">
                    <div v-if="counts !== null" class="row">
                        <census-single :name="'Chromatographs'" :number="counts.type['Chromatographs']" :icon="'icon-music_note_single'"></census-single>
                        <census-single :name="'Analyzers'" :number="counts.type['Analyzers']" :icon="'icon-music_note_single'"></census-single>
                        <census-single :name="'Detectors & Filaments'" :number="counts.type['Detectors & Filaments']" :icon="'icon-music_note_single'"></census-single>
                    </div>
                </div>
            </div>
        </div>
    </overlord_container>
</template>

<script>
    import CensusSingle from '../parts/CensusSection.vue';
    export default {
        components:{'census-single':CensusSingle},
        props: [

        ],
        watch:{

        },

        data(){
            return {
                counts:null,
            }

        },
        computed:{

        },


        mounted(){
            let self = this;
            let $window, $document, $body;

            $window = $(window);
            $document = $(document);
            $body = $("body");
            $("#loading-progress").imagesLoaded(function(){
                self.$emit('done-loading');
            });

            $window.scroll(function(event) {
                let versatile = $('#versatile');
                if (versatile.visible(true)) {
                    versatile.css('opacity', 0);
                    versatile.addClass("fadeInDown").delay("slow").fadeIn();

                }
                let reliable = $('#reliable');
                if (reliable.visible(true)) {
                    reliable.css('opacity', 0);
                    reliable.addClass("fadeInDownBig").delay("fast").fadeIn();
                }
                let dependable = $('#dependable');
                if (dependable.visible(true)) {
                    dependable.css('opacity', 0);
                    dependable.addClass("fadeInDown").delay(800).fadeIn();
                }
            });

            this.getCount();
            let timers = $(".timer");
            if ($.fn.countTo) {
                timers.each(function () {
                    $(this).data("animated", 0);
                    animateTimer(this);
                });
            }

            $window.on("scroll", function () {
                timers.each(function () {
                    animateTimer(this);
                });
            });

            function animateTimer(timer) {
                if ($(timer).data("animated") === 0) {
                    if ($.fn.visible && $(timer).visible()) {
                        $(timer).data("animated", 1);
                        $(timer).countTo();
                    }
                }
            }

        },

        methods:{
            getCount(){
                let self = this;
                axios.get('products/counts')
                    .then(function (response){
                        self.counts = response.data;
                        self.$emit('done-loading');

                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            },

        }
    }
</script>
<template>
    <div class="fun-factor-parallax dark">
        <div class="overlay-dark" style="padding: 112px 0;">
            <div class="container">
                <div v-if="counts !== null" class="row">
                    <census-single :name="'Hip Hop'" :number="counts.genre.hiphop" :icon="'icon-music_note_single'"></census-single>
                    <census-single :name="'Rap'" :number="counts.genre.rap" :icon="'icon-music_note_single'"></census-single>
                    <census-single :name="'Trap'" :number="counts.genre.trap" :icon="'icon-music_note_single'"></census-single>
                </div>
            </div>
        </div>
    </div>
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
            let $window, $document, $body;

            $window = $(window);
            $document = $(document);
            $body = $("body");

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
                axios.get('beats/counts')
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
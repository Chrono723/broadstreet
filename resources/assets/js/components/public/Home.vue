<template>
    <section class="body-content" id="loading">
        <loading v-if="isLoading === true"></loading>
        <parallax-banner></parallax-banner>


        <!--body content start-->
        <section class="body-content">
            <features-module v-on:done-loading="loaded"></features-module>
            <gallery-module></gallery-module>
            <news-single></news-single>
            <contact-form v-on:done-loading="loaded"></contact-form>
        </section>
         <footer-main v-on:done-loading="loaded"></footer-main>
    </section>
</template>

<script>
    import Loading from '../hud/Loading.vue';
    import CensusDisplay from '../public/parts/CensusDisplay.vue';
    import ParallaxBanner from '../public/parts/ParallaxBanner.vue';
    import ContactForm from '../public/parts/ContactForm.vue';
    import FeaturesModule from '../public/parts/FeaturesModule.vue';
    import ParallaxSplitDisplay from '../public/parts/ParallaxSplitDisplay.vue';
    import GalleryModule from '../public/parts/GalleryModule.vue';
    import FooterMain from '../hud/Footer.vue';
    import newsSingle from '../public/parts/newsSingle.vue';

    export default{
        props:['info'],
        components:{
            CensusDisplay,
            ParallaxBanner,
            ContactForm,
            FeaturesModule,
            ParallaxSplitDisplay,
            GalleryModule,
            FooterMain,
            Loading,
            newsSingle
        },
        watch: {
            loadingCount:function(val){
                if (this.loadingCount >= 3){
                    this.isLoading = false;
                }
            }
        },

        data(){
            return {
                id:'home',
                isLoading: true,
                loadingCount : 0,



            };
        },
        mounted(){

            let $window, $document, $body;
            let self = this;
            $window = $(window);
            $document = $(document);
            $body = $("body");
            $("#loading").imagesLoaded(function(){
                    self.loadingCount ++;
            });

        },
        methods: {
            loaded(){
                $('html,body').scrollTop(0);
                this.loadingCount ++;


            },
            sendBeatsByPage(page){

                console.log('Home page got it');
            },

        }

    }
</script>
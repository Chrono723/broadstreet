<template>
    <section class="body-content" id="loading">
        <loading v-if="isLoading === true"></loading>
        <parallax-Header
                :title-parallax="'FAQ'"
                v-on:done-loading="loaded"
        >
            <img slot="page-image" src="images/backgrounds/GowMacParallax/gow-mac-data.png" class="parallax-page-image-container "/>
        </parallax-Header>
        <page-status v-if="pageStatus.status === 'down' || pageStatus.status === 'soon'" :description="pageStatus.data.description"></page-status>
        <overlord_container data_top='false' data_bottom='false' background-color="transparent">
            <div class="row Panel-Color-Gradient" style="padding-top: 50px;">
                <!--title-->
                <div class="heading-title-alt border-short-bottom text-center ">
                    <h3 class="text-uppercase">wanna quick support?</h3>
                    <div class="half-txt">Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes</div>
                    <div class="m-top-50 inline-block">
                        <a href="#" class="btn btn-medium  btn-theme-color ">  Email your Question </a>
                        <a href="#" class="btn btn-medium btn-dark-solid ">  Send us a Tweet </a>
                    </div>
                </div>
                <!--title-->

                <div class="col-md-8 col-md-offset-2">

                    <div class="page-content">
                        <div class="text-center">
                            <h3 class="text-uppercase">Basic (5)</h3>
                        </div>

                        <!-- accordion 2 start-->
                        <dl class="accordion">
                            <dt>
                                <a href="">why i will purchase massive theme to build my projec	</a>
                            </dt>
                            <dd>
                                <p>
                                    Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque mattis, leo quam aliquet diam, congue laoreet elit metus eget diam. Proin ac metus diam.
                                </p>
                                <p>
                                    Praesent pharetra, justo ut scelerisque mattis, leo quam aliquet diam, congue laoreet elit metus eget diam. Proin ac metus diam. Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque mattis, leo quam aliquet diam, congue laoreet
                                    elit metus eget diam. Proin ac metus diam.
                                </p>
                            </dd>
                            <dt>
                                <a href="">How to install or modify this theme?</a>
                            </dt>
                            <dd>
                                Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. leo quam aliquet diam, congue laoreet elit metus eget diam.
                            </dd>
                            <dt>
                                <a href="">how to deposit money in themeforest to purchase massive</a>
                            </dt>
                            <dd>
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. Proin ac metus diam.
                            </dd>

                            <dt>
                                <a href="">can i get support after purchasing this theme?	</a>
                            </dt>
                            <dd>
                                Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque mattis, leo quam aliquet diam, congue laoreet elit metus eget diam. Proin ac metus diam.
                            </dd>
                            <dt>
                                <a href="">What kind of security do you provide through massive</a>
                            </dt>
                            <dd>
                                Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. leo quam aliquet diam, congue laoreet elit metus eget diam.
                            </dd>
                        </dl>
                        <!-- accordion 2 end-->

                    </div>

                    <div class="">
                        <div class="text-center">
                            <h3 class="text-uppercase">Technical (5)</h3>
                        </div>

                        <!-- accordion 2 start-->
                        <dl class="accordion">
                            <dt>
                                <a href="">why i will purchase massive theme to build my projec	</a>
                            </dt>
                            <dd>
                                <p>
                                    Praesent pharetra, justo ut scelerisque mattis, leo quam aliquet diam, congue laoreet elit metus eget diam. Proin ac metus diam. Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque mattis, leo quam aliquet diam, congue laoreet
                                    elit metus eget diam. Proin ac metus diam.
                                </p>
                            </dd>
                            <dt>
                                <a href="">How to install or modify this theme?</a>
                            </dt>
                            <dd>
                                Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. leo quam aliquet diam, congue laoreet elit metus eget diam.
                            </dd>
                            <dt>
                                <a href="">How to install or modify this theme?</a>
                            </dt>
                            <dd>
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. Proin ac metus diam.
                            </dd>

                            <dt>
                                <a href="">how to deposit money in themeforest to purchase massive	</a>
                            </dt>
                            <dd>
                                Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque mattis, leo quam aliquet diam, congue laoreet elit metus eget diam. Proin ac metus diam.
                            </dd>

                        </dl>
                        <!-- accordion 2 end-->

                    </div>


                </div>
            </div>
        </overlord_container>
        <footer-main v-on:done-loading="loaded"></footer-main>
    </section>
</template>

<script>
    import parallaxHeader from '../hud/ParallaxHeader.vue';
    import Loading from '../hud/Loading.vue';
    import FooterMain from '../hud/Footer.vue';
    import pageStatus from './parts/StatusPage.vue';
    export default{
        props:[],
        components:{
            'parallax-Header':parallaxHeader,
            Loading,
            FooterMain,
            pageStatus
        },
        watch: {
            loadingCount:function(val){
                if (this.loadingCount >= 4){
                    this.isLoading = false;
                }
            }
        },

        data(){
            return {
                id:'faq',
                isLoading: true,
                loadingCount : 0,
                pageStatus:{
                    data:null,
                    status: null,
                },
                faq:null,


            };
        },
        mounted(){
            let self = this;
            $("#loading").imagesLoaded(function(){
                self.getData();
                self.loadingCount ++;
            });


        },
        methods: {
            loaded(){
                this.loadingCount ++;
            },
            getData(){
                let self = this;
                axios.get('faq').then(function(response){
                    self.pageStatus.status = response.data.status;
                    if(response.data.status === 'down' || response.data.status === 'soon'){
                        self.pageStatus.data = response.data.data;
                    }
                    else{
                        self.faq = response.data;
                    }
                    self.loaded();

                }).catch(function(error){
                    console.log(error.response.data);
                });
            }


        }

    }
</script>
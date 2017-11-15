<template>
    <section class="body-content" id="loading">
        <loading v-if="isLoading === true"></loading>
        <parallax-Header
                :title-parallax="'Services'"
                v-on:done-loading="loaded"
        >
            <img slot="page-image" src="images/backgrounds/GowMacParallax/gow-mac-login.png" class="parallax-page-image-container "/>
        </parallax-Header>
        <page-status v-if="pageStatus.status === 'down' || pageStatus.status === 'soon'" :description="pageStatus.data.description"></page-status>
        <overlord_container data_top='false' data_bottom='false' background-color="transparent">
            <div class="row Panel-Color-Gradient" style="padding-top: 50px;">
                <div class="col-md-12">
                    <!--carousel-->
                    <div id="carousel-arrow" class="carousel slide carousel-fade full-width" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="assets/img/carousel/w1.jpg" alt="">
                                <div class="caption">Multipurpose massive ui collection</div>
                            </div>
                            <div class="item">
                                <img src="assets/img/carousel/w2.jpg" alt="">
                                <div class="caption">Service Anytime</div>
                            </div>
                            <div class="item">
                                <img src="assets/img/carousel/w3.jpg" alt="">
                                <div class="caption">Awesome Theme</div>
                            </div>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-arrow" role="button" data-slide="prev">

                        </a>
                        <a class="right carousel-control" href="#carousel-arrow" role="button" data-slide="next">

                        </a>
                    </div>
                    <!--carousel-->
                </div>
            </div>
        </overlord_container>

        <overlord_container data_top='false' data_bottom='false' background-color="transparent">
            <div class="row Panel-Color-Gradient" style="padding-top: 50px;">
                <div class="col-md-7">
                    <h4 class="text-uppercase">we cover the maximum</h4>
                    <p>Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets.. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                        doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed
                        quia consequuntur magni dolores. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae
                        vitae dicta sunt explicabo.</p>
                </div>
                <div class="col-md-5">
                    <!-- accordion 2 start-->
                    <dl class="accordion">
                        <dt>
                            <a href="">we have the maximum coverage</a>
                        </dt>
                        <dd>
                            Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque mattis, leo quam aliquet diam, congue laoreet elit metus eget diam. Proin ac metus diam.
                        </dd>
                        <dt>
                            <a href="">instant service and support</a>
                        </dt>
                        <dd>
                            Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. leo quam aliquet diam, congue laoreet elit metus eget diam.
                        </dd>
                        <dt>
                            <a href="">we have a talented team</a>
                        </dt>
                        <dd>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. Proin ac metus diam.
                        </dd>
                    </dl>
                    <!-- accordion 2 end-->
                </div>
            </div>
        </overlord_container>

        <overlord_container data_top='false' data_bottom='false' background-color="transparent">
            <div class="post-list">
                <div class="col-md-4">
                    <div class="post-single">
                        <ul class="post-cat">
                            <li><a href="#">interface</a>
                            </li>
                            <li><a href="#">standard</a>
                            </li>
                        </ul>
                        <div class="post-img">
                            <img src="assets/img/post/p4.jpg" alt="">
                        </div>
                        <div class="post-desk">
                            <h4 class="text-uppercase">
                                <a href="#">ultra modern design</a>
                            </h4>
                            <div class="date">
                                <a href="#" class="author">martin smith</a> july 29, 2015
                            </div>
                            <p>
                                Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus.
                            </p>
                            <a href="#" class="p-read-more">Read More <i class="icon-arrows_slim_right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="post-single">
                        <ul class="post-cat">
                            <li><a href="#">interface</a>
                            </li>
                            <li><a href="#">standard</a>
                            </li>
                        </ul>
                        <div class="post-img ">
                            <img src="assets/img/post/p5.jpg" alt="">
                        </div>
                        <div class="post-desk">
                            <h4 class="text-uppercase">
                                <a href="#">fully responsive</a>
                            </h4>
                            <div class="date">
                                <a href="#" class="author">martin smith</a> july 29, 2015
                            </div>
                            <p>
                                Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus.
                            </p>
                            <a href="#" class="p-read-more">Read More <i class="icon-arrows_slim_right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="post-single">
                        <ul class="post-cat">
                            <li><a href="#">interface</a>
                            </li>
                            <li><a href="#">standard</a>
                            </li>
                        </ul>
                        <div class="post-img">
                            <img src="assets/img/post/p6.jpg" alt="">
                        </div>
                        <div class="post-desk">
                            <h4 class="text-uppercase">
                                <a href="#">light weight theme</a>
                            </h4>
                            <div class="date">
                                <a href="#" class="author">martin smith</a> july 29, 2015
                            </div>
                            <p>
                                Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus.
                            </p>
                            <a href="#" class="p-read-more">Read More <i class="icon-arrows_slim_right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </overlord_container>

        <overlord_container data_top='false' data_bottom='false' background-color="transparent">
            <div class="post-list-aside">
                <div class="post-single">
                    <div class="col-md-6">
                        <div class="post-img">
                            <img src="assets/img/post/p3.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="post-desk">
                            <div class="m-bot-30">
                                <span class="post-sub-title text-uppercase">special services</span>
                                <h4 class="text-uppercase">
                                    some services that we provide occationaly
                                </h4>
                            </div>

                            <p>
                                Phasellus fringilla suscipit risus nec eleifend. Pellentesque eu quam sem, ac malesuada leo sem quam pellente. Awesome sliders give you the opportunity to showcase your content.
                            </p>
                            <ul class="m-bot-30 circle-list">
                                <li>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                </li>
                                <li>
                                    Adipisci blanditiis delectus deserunt dolorem
                                </li>
                                <li>
                                    Impedit inventore itaque iure libero maiores simso.
                                </li>
                            </ul>
                            <div>
                                <a href="#" class="btn btn-small btn-rounded btn-dark-solid  "> Read More </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </overlord_container>

        <overlord_container data_top='false' data_bottom='false' background-color="transparent">
            <div class="post-single">
                <div class="col-md-7">
                    <div class="post-desk">
                        <div class="m-bot-30">
                            <span class="post-sub-title text-uppercase">special services</span>
                            <h4 class="text-uppercase">
                                some services that we provide occationaly
                            </h4>
                        </div>

                        <p>
                            Phasellus fringilla suscipit risus nec eleifend. Pellentesque eu quam sem, ac malesuada leo sem quam pellente. Awesome sliders give you the opportunity to showcase your content.
                        </p>
                        <ul class=" circle-list list-half m-bot-30">
                            <li>
                                Lorem ipsum dolor sit amet.
                            </li>
                            <li>
                                Adipisci blanditiis delectus deserunt
                            </li>
                            <li>
                                Impedit inventore itaque iure libero.
                            </li>
                            <li>
                                Lorem ipsum dolor sit amet.
                            </li>
                            <li>
                                Adipisci blanditiis delectus deserunt
                            </li>
                            <li>
                                Impedit inventore itaque iure libero simso.
                            </li>
                        </ul>
                        <div>
                            <a href="#" class="btn btn-small btn-rounded btn-dark-solid  "> Read More </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="post-img">
                        <img src="assets/img/post/p2.jpg" alt="">
                    </div>
                </div>

            </div>
        </overlord_container>

        <overlord_container data_top='false' data_bottom='false' background-color="transparent">
            <div class="row Panel-Color-Gradient" style="padding-top: 50px;">
                <div class="col-md-12">
                    <!--promo box-->
                    <div class="promo-box promo-parallax round-5 m-bot-50 text-center">
                        <div class="promo-info">
                            <h3 class="theme-color">new offer for this summer</h3>
                            <span>Nullam ut consectetur dolor. Sed sit amet iaculis nisi. Mauris ridiculus elementum non felis etewe blandit. </span>
                            <a href="#" class="btn btn-medium btn-rounded btn-dark-solid  text-uppercase">purchase
                                now</a>
                        </div>
                    </div>
                    <!--promo box-->
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
        props:['sub-page', 'section'],
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
                id:'services-main',
                isLoading: true,
                loadingCount : 0,
                pageStatus:{
                    data:null,
                    status: null,
                },
                Services:null,


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
            getData(section = 'home'){
                let self = this;
                axios.get('services/' + section).then(function(response){
                    self.pageStatus.status = response.data.status;
                    if(response.data.status === 'down' || response.data.status === 'soon'){
                        self.pageStatus.data = response.data.data;
                    }
                    else{
                        self.Services = response.data;
                    }
                    self.loaded();

                }).catch(function(error){
                    console.log(error.response.data);
                });
            }


        }

    }
</script>
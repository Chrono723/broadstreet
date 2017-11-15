<template>
    <section class="body-content" id="loading">
        <loading v-if="isLoading === true"></loading>
        <parallax-Header
                :title-parallax="'Contact Us'"
                v-on:done-loading="loaded"
        >
            <img slot="page-image" src="images/backgrounds/GowMacParallax/gow-mac-login.png" class="parallax-page-image-container "/>
        </parallax-Header>
        <page-status v-if="pageStatus.status === 'down' || pageStatus.status === 'soon'" :description="pageStatus.data.description"></page-status>

        <overlord_container data_top='false' data_bottom='false' background-color="transparent">
            <div class="row Panel-Color-Gradient" style="padding-top: 50px;">
                <div class="heading-title-alt border-short-bottom text-center ">
                    <h3 class="text-uppercase">feel free to drop us a line</h3>
                    <div class="half-txt">Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus. Nam libero tempore</div>
                </div>
            </div>
        </overlord_container>

        <overlord_container data_top='false' data_bottom='false' background-color="transparent">
            <div class="row Panel-Color-Gradient" style="padding-top: 50px;">
                <div class="row page-content">
                    <div class="col-md-4">
                        <div class="featured-item text-center">
                            <div class="icon">
                                <i class="icon-map"></i>
                            </div>
                            <div class="title text-uppercase">
                                <h4>location</h4>
                            </div>
                            <div class="desc">
                                Upper Level, Overseas Passenger
                                <br/>Terminal, The Rocks, Sydney 2000
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="featured-item text-center">
                            <div class="icon">
                                <i class="icon-mobile"></i>
                            </div>
                            <div class="title text-uppercase">
                                <h4>call us</h4>
                            </div>
                            <div class="desc">
                                Any time. We are open 24/7
                                <br/>+1 2345-67-89000
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="featured-item text-center">
                            <div class="icon">
                                <i class="icon-envelope"></i>
                            </div>
                            <div class="title text-uppercase">
                                <h4>mail us</h4>
                            </div>
                            <div class="desc">
                                get support via email
                                <br/>mail@massivetheme.com
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </overlord_container>

        <overlord_container data_top='false' data_bottom='false' background-color="transparent">
            <div class="row Panel-Color-Gradient" style="padding-top: 50px;">
                <div class="row">

                    <div class="col-md-10 col-md-offset-1">
                        <form class="contact-comments" action="contact-us.php" method="post">
                            <div class="row">

                                <div class="col-md-6 ">

                                    <div class="form-group">
                                        <!-- Name -->
                                        <input type="text" name="name" id="name" class=" form-control" placeholder="Name *" maxlength="100" required="">
                                    </div>
                                    <div class="form-group">
                                        <!-- Email -->
                                        <input type="email" name="email" id="email" class=" form-control" placeholder="Email *" maxlength="100" required="">
                                    </div>
                                    <div class="form-group">
                                        <!-- Subject -->
                                        <input type="text" name="subject" id="subject" class=" form-control" placeholder="Subject" maxlength="100">
                                    </div>
                                </div>

                                <div class="col-md-6 form-group">
                                    <div class="form-group">
                                        <!-- Comment -->
                                        <textarea name="comments" id="comments" class="cmnt-text form-control" placeholder="Comments" maxlength="400"></textarea>
                                    </div>
                                    <div class="form-group full-width">
                                        <button type="submit" class="btn btn-small btn-dark-solid sendmail">
                                            Send Message
                                        </button>
                                    </div>
                                </div>

                            </div>

                        </form>
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
                id:'contact-us',
                isLoading: true,
                loadingCount : 0,
                pageStatus:{
                    data:null,
                    status: null,
                },
                contactUs:null,


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
                axios.get('contact-us').then(function(response){
                    self.pageStatus.status = response.data.status;
                    if(response.data.status === 'down' || response.data.status === 'soon'){
                        self.pageStatus.data = response.data.data;
                    }
                    else{
                        self.contactUs = response.data;
                    }
                    self.loaded();

                }).catch(function(error){
                    console.log(error.response.data);
                });
            }


        }

    }
</script>
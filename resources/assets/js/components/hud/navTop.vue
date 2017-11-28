<template>
    <header class="l-header l-header_overlay">

        <div class="l-navbar l-navbar_expand l-navbar_t-dark-trans js-navbar-sticky">
            <div class="container-fluid">
                <nav class="menuzord js-primary-navigation" role="navigation" aria-label="Primary Navigation">

                    <a  href="#home" class="logo-brand">
                        <img class="retina" src="images/logos/BroadStreet/BS-Header.png" alt="Broad Street">
                    </a>

                    <!--mega menu start-->
                    <ul id="overlord-menu" class="menuzord-menu menuzord-right c-nav_s-standard">

                        <li>
                            <a href="#menu/all">Menu</a>
                            <ul class="dropdown">
                                <li><a href="#menu/pizza">Pizza</a></li>
                                <li><a href="#menu/subs">Subs</a></li>
                                <li><a href="#menu/sides">Breads & Sides</a></li>
                                <li><a href="#menu/wings">Wings</a></li>
                                <li><a href="#menu/pastas">Pastas</a></li>
                                <li><a href="#menu/desserts">Desserts</a></li>
                                <li><a href="#menu/all">All Items</a></li>
                            </ul>
                        </li>

                        <li><a href="#about">About Us</a></li>

                        <li><a href="#rewards">Rewards</a></li>

                        <li><a href="#home">Home</a></li>

                        <!-- Order Option -->
                        <li><a href="#order">Order Now</a></li>

                        <!-- Login Information Option -->
                        <li v-if="userInfo === null"><a  href="#login">Sign In</a></li>
                        <li v-if="userInfo !== null">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ userInfo.name }}
                            </a>

                            <ul class="dropdown" role="menu">
                                <li>
                                    <a href="javascript:void(0)" @click="logOut">Logout</a>

                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!--mega menu end-->

                </nav>
                <div class="secondary-navigation">
                    <ul  class="menu">
                        <li class="menu-item "><a href=""><i class="po po-pizza"></i>Pizza</a></li>
                        <li class="menu-item "><a href=""><i class="po po-burger"></i>Breads & Sides</a></li>
                        <li class="menu-item "><a href=""><i class="po po-salads"></i>Salads</a></li>
                        <li class="menu-item "><a href=""><i class="po po-tacos"></i>Wings</a></li>
                        <li class="menu-item "><a href=""><i class="po po-salads"></i>Desserts</a></li>
                        <li class="menu-item "><a href=""><i class="po po-salads"></i>Pastas</a></li>
                    </ul>

                </div>
            </div>
        </div>

    </header>
</template>

<script>
    export default{
        props: {
            headerStyle:{
                'default': 1
            },
            userInfo: {
                'default': null,
            }
        },
        components:{

        },
        watch: {

        },

        data(){
            return {



            };
        },
        mounted(){
            this.initSticky();
        },
        methods: {
            initSticky() {
                let $navbarSticky, navbarHeight, $brandLogo;
                $navbarSticky = $(".js-navbar-sticky").not(".l-navbar_s-left");
                navbarHeight = $navbarSticky.height();
                $brandLogo = $(".logo-brand");

                $navbarSticky.sticky({
                    className: "l-navbar-wrapper_has-sticky",
                    wrapperClassName: "l-navbar-wrapper",
                    zIndex: 10000,
                    bottomSpacing: 100
                }).on("sticky-start", function() {


                }).on("sticky-end", function () {
                    $navbarSticky.parent().height(navbarHeight);
                });
            },
            logOut(){
                let self = this;
                self.loadPage();
                self.$parent.info.user = null;
                axios.post('logout');
                window.location.hash  = '#login';

            },
            loadPage(){
                this.$emit('loadingPage');
            }
        }

    }
</script>
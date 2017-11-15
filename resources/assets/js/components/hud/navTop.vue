<template>
    <header class="l-header l-header_overlay">

        <div class="l-navbar l-navbar_expand l-navbar_t-dark-trans js-navbar-sticky">
            <div class="container-fluid">
                <nav class="menuzord js-primary-navigation" role="navigation" aria-label="Primary Navigation">

                    <a  href="#home" class="logo-brand">
                        <img class="retina" src="images/logos/gow-mac/gow-mac-nav-logo.png" alt="Massive">
                    </a>

                    <!--mega menu start-->
                    <ul id="overlord-menu" class="menuzord-menu menuzord-right c-nav_s-standard">

                        <li class="nav-divider" aria-hidden="true"><a href="javascript:void(0)">|</a></li>

                        <li>
                            <a @click="directTo('news')" href="#news">News </a>
                            <ul class="dropdown">
                                <li><a href="#news">Main</a></li>
                            </ul>
                        </li>


                        <li>
                            <a href="javascript:void(0)">About</a>
                            <ul class="dropdown">
                                <li><a href="#company">About Us</a></li>
                                <li><a href="#history">Our History</a></li>
                                <li><a href="#certifications">Certifications</a></li>
                                <li><a href="#faq">FAQ</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="#products/home">Products</a>
                            <ul class="dropdown">
                                <li><a href="#products/chromatographs">Instruments</a></li>
                                <li><a href="#products/analyzers">Analyzers</a></li>
                                <li><a href="#products/package-labs">Package Labs</a></li>
                                <li><a href="#products/detectors">Detectors</a></li>
                                <li><a href="#products/accessories">Accessories</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript:void(0)">Services</a>
                            <ul class="dropdown">
                                <li><a href="#services/home">Main</a></li>
                                <li><a href="#services/technical-assistance">Technical Assistance</a></li>
                                <li><a href="#services/column-replacement">Column Replacement</a></li>
                                <li><a href="#services/sales-representative">Sales Representatives</a></li>
                            </ul>
                        </li>

                        <li><a href="#home">Home </a></li>

                        <li class="nav-divider" aria-hidden="true"><a href="javascript:void(0)">|</a></li>

                        <!-- Login Information Option -->

                        <li v-if="userInfo === null"><a  href="#login">Login</a></li>

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
                let $navbarSticky, navbarHeight, $brandLogo, centerLogoNormalHeight, centerLogoStickyHeight, bottomNav, navMenu;
                $navbarSticky = $(".js-navbar-sticky").not(".l-navbar_s-left");
                navbarHeight = $navbarSticky.height();
                $brandLogo = $(".logo-brand");
                centerLogoNormalHeight = 100;
                centerLogoStickyHeight = 60;

                bottomNav = $("#Overlord-Nav-Bottom");
                navMenu = $("#overlord-menu");

                if ($navbarSticky.hasClass("l-navbar_s-center")) {
                    $brandLogo.height(centerLogoNormalHeight);
                }

                $navbarSticky.sticky({
                    className: "l-navbar-wrapper_has-sticky",
                    wrapperClassName: "l-navbar-wrapper",
                    zIndex: 10000,
                    bottomSpacing: 100
                }).on("sticky-start", function() {
                    //bottomNav.show();
                    //navMenu.show();
                    if ($navbarSticky.hasClass("l-navbar_s-center")) {
                        $brandLogo.height(0);
                        setTimeout(function() {
                            $brandLogo.addClass("sticky-fix").height(centerLogoStickyHeight);
                        }, 300);
                    }
                }).on("sticky-end", function () {
                    $navbarSticky.parent().height(navbarHeight);
                    //bottomNav.hide();
                    // navMenu.hide();
                    if ($navbarSticky.hasClass("l-navbar_s-center")) {
                        $brandLogo.removeClass("sticky-fix").height(centerLogoNormalHeight);
                    }
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
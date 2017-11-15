<template>
    <div>
        <div v-if="footerType === 'admin'">

        </div>

        <footer v-if="footerType === 'main'" id="footer" class="dark">
            <div class="primary-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="#" class="m-bot-20 footer-logo">
                                <img class="retina" src="images/logos/gow-mac/fanzy-gm-logo.png" alt="" style="height: 100px"/>
                            </a>
                            <p style="">CUSTOM SOLUTIONS FOR YOUR GAS ANALYSIS NEEDS</p>

                        </div>
                        <div class="col-md-3">
                            <h5 class="text-uppercase">News & Events</h5>
                            <ul class="f-list">
                                <li><a href="news">Newest blog Post</a>
                                </li>
                                <li><a href="news">New Product!</a>
                                </li>

                            </ul>
                        </div>
                        <div class="col-md-3">
                            <h5 class="text-uppercase">follow us</h5>
                            <ul class="f-list">
                                <li><a href="about">About Gow-Mac</a>
                                </li>
                                <li><a href="legal-statments">Legal Statements</a>
                                </li>
                                <li><a href="terms">Terms & Condition</a>
                                </li>
                                <li><a href="policies">Polcies</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <h5 class="text-uppercase">Newest Products</h5>
                            <ul class="r-work">
                                <li>
                                    <a href="">
                                         <img class="OverLord-Shadow-Main Ol-Panel-Dark-Cyan-Dotted" src="images/products/instrument-missing.png" alt="" />
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img class="OverLord-Shadow-Main Ol-Panel-Dark-Cyan-Dotted" src="images/products/instrument-missing.png" alt="" />
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img class="OverLord-Shadow-Main Ol-Panel-Dark-Cyan-Dotted" src="images/products/instrument-missing.png" alt="" />
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img class="OverLord-Shadow-Main Ol-Panel-Dark-Cyan-Dotted" src="images/products/instrument-missing.png" alt="" />
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img class="OverLord-Shadow-Main Ol-Panel-Dark-Cyan-Dotted" src="images/products/instrument-missing.png" alt="" />
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img class="OverLord-Shadow-Main Ol-Panel-Dark-Cyan-Dotted" src="images/products/instrument-missing.png" alt="" />
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img class="OverLord-Shadow-Main Ol-Panel-Dark-Cyan-Dotted" src="images/products/instrument-missing.png" alt="" />
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img class="OverLord-Shadow-Main Ol-Panel-Dark-Cyan-Dotted" src="images/products/instrument-missing.png" alt="" />
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img class="OverLord-Shadow-Main Ol-Panel-Dark-Cyan-Dotted" src="images/products/instrument-missing.png" alt="" />
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="secondary-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="copyright">
                                © Gow-Mac Instrument Co.
                            </div>
                            <div class="copyright-sub-title text-uppercase">
                                Analytical Instruments Since 1935
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="social-link circle pull-right">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-behance"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <footer v-if="footerType === 'secondary'" id="footer" class="dark">
            <div class="container">

                <div class="f-logo-center">
                    <a href="home" class="footer-logo">
                        <img class="retina" src="images/footer-logo.png" alt="">
                    </a>
                </div>
                <div class="col-md-6">
                    <div class="copyright">
                        © Gow-Mac Instrument Co.
                    </div>
                    <div class="copyright-sub-title text-uppercase">
                        Analytical Instruments Since 1935
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="social-link pull-right circle ">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>


            </div>
        </footer>
    </div>
</template>

<script>
    export default{
        props: {
            footerType:{
                'default':'main'
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
            let self = this;
            $("#loading-progress").imagesLoaded(function(){
                self.$emit('done-loading');
            });
        },
        methods: {

        }

    }
</script>
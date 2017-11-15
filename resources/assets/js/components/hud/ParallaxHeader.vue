<template>
    <div class="parallax-display">
        <div class="parallax-overlord">
            <!-- Background  -->
            <div class='layer-1-header layer-header' data-depth='.30' data-type='parallax' data-direction='down'></div>

            <!-- drop specs   -->
            <div class='layer-2-header layer-header' data-depth='0.40' data-type='parallax' data-direction='down'></div>

            <!-- back molecules   -->
            <div class='layer-3-header layer-header' data-depth='0.50' data-type='parallax' data-direction='down'></div>

            <!-- middle molecules    -->
            <div class='layer-4-header layer-header' data-depth='0.65' data-type='parallax' data-direction='down'>

            </div>

            <!-- header bar  -->
            <div class='layer-5-header layer-header' data-depth='0.75' data-type='parallax' data-direction='down'>
                <div class="parallax-box-header-bar padding-start-top" :style="'height: '+ windowHeight +'.px;'">
                    <img src="images/backgrounds/GowMacParallax/gow-mac-header-bar-trim.png" class="parallax-img-right">
                </div>
            </div>

            <!-- top molecules    -->
            <div class='layer-6-header layer-header' data-depth='0.85' data-type='parallax' data-direction='down'>
                <div class="parallax-box-header-bar padding-start-top" :style="'height: '+ windowHeight +'.px;'">
                    <slot name="page-image"></slot>
                </div>
            </div>

            <!-- TopSihouette -->
            <div class='layer-overlay-header layer-header' data-depth='0.90' data-type='parallax' data-direction='down'>
                <div class="parallax-box-header-bar padding-start-next" :style="'height: '+ windowHeight +'.px;'">
                    <img src="images/backgrounds/GowMacParallax/gow-mac-header-title-trim.png" class="parallax-img-left">
                    <div class="title-float">
                        <div class="page">{{titleParallax}}</div>
                        <div class="links">
                            <a class="links-back" @click="getPage('home')" href="#home">Home</a>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        props: {
            titleParallax:{
                'default':'???'
            }
        },
        components:{

        },
        watch: {

        },
        computed:{
            windowHeight:function(){
                return $(window).height();
            }
        },
        data(){
            return {



            };
        },
        updated:function(){

        },
        mounted(){
            let self = this;
            let depth, i, layer, layers, len, movement, topDistance, translate3d, direction;
            topDistance = this.pageYOffset;
            layers = document.querySelectorAll("[data-type='parallax']");
            for (i = 0, len = layers.length; i < len; i++) {
                layer = layers[i];
                depth = layer.getAttribute('data-depth');
                direction = layer.getAttribute('data-direction');

                if (direction === 'up'){
                    movement = topDistance * depth;
                }
                if (direction === 'down'){
                    movement = -(topDistance * depth);
                }
                translate3d = 'translate3d(0, ' + movement + 'px, 0)';
                layer.style['-webkit-transform'] = translate3d;
                layer.style['-moz-transform'] = translate3d;
                layer.style['-ms-transform'] = translate3d;
                layer.style['-o-transform'] = translate3d;
                layer.style.transform = translate3d;
            }
            $("#loading-progress").imagesLoaded(function(){
                self.$emit('done-loading');
            });
            window.addEventListener('scroll', function(event) {
                let depth, i, layer, layers, len, movement, topDistance, translate3d, direction;
                topDistance = this.pageYOffset;
                layers = document.querySelectorAll("[data-type='parallax']");
                for (i = 0, len = layers.length; i < len; i++) {
                    layer = layers[i];
                    depth = layer.getAttribute('data-depth');
                    direction = layer.getAttribute('data-direction');

                    if (direction === 'up'){
                        movement = topDistance * depth;
                    }
                    if (direction === 'down'){
                        movement = -(topDistance * depth);
                    }
                    translate3d = 'translate3d(0, ' + movement + 'px, 0)';
                    layer.style['-webkit-transform'] = translate3d;
                    layer.style['-moz-transform'] = translate3d;
                    layer.style['-ms-transform'] = translate3d;
                    layer.style['-o-transform'] = translate3d;
                    layer.style.transform = translate3d;
                }
            });
        },
        methods: {
            getPage(page){
                alert('Success: ' + page);
            }
        }

    }
</script>
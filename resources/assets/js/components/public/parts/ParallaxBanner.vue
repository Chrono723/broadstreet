<template>
    <div>
        <div id="fullscreen-banner" class="parallax text-center vertical-align overlord-parallax-back">
            <div class="parallax-overlord" style="margin-bottom: 47px;">

                <!-- Background  -->
                <div class='layer-1 layer' data-depth='.30' data-type='parallax' data-direction='down'></div>

                <!-- Molecules Drop   -->
                <div class='layer-2 layer' data-depth='0.50' data-type='parallax' data-direction='down'></div>

                <!-- Molecules Back    -->
                <div class='layer-3 layer' data-depth='0.85' data-type='parallax' data-direction='down'>
                </div>

                <!-- Icon Layer  -->
                <div class='layer-4 layer' data-depth='0.95' data-type='parallax' data-direction='down'>
                    <div class="parallax-box" :style="'height: '+ windowHeight +'.px;'">
                        <img src="images/backgrounds/GowMacParallax/gow-mac-icon-single.png" class="parallax-img">
                    </div>

                </div>

                <!-- Logo  -->
                <div class='layer-5 layer' data-depth='0.75' data-type='parallax' data-direction='down'>
                    <div class="parallax-box" :style="'height: '+ windowHeight +'.px;'">
                        <img src="images/backgrounds/GowMacParallax/gow-mac-logo-single.png" class="parallax-img">
                    </div>
                </div>

                <!-- Main Body -->
                <div class='layer-overlay layer' data-depth='1.00' data-type='parallax' data-direction='down'>
                    <div class="parallax-box-body" :style="'max-height: '+ windowHeight +'.px; /* margin-top: ' + windowHeight + '.px;*/'">
                        <img src="images/backgrounds/GowMacParallax/main-body.png" class="parallax-img">
                    </div>

                </div>

            </div>

        </div>
    </div>

</template>

<script>

    export default {
        props: [

        ],
        watch:{

        },

        data(){
            return {

            }

        },
        computed:{
            windowHeight:function(){
                return $(window).height();
            }
        },


        mounted(){
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

        methods:{


        }
    }
</script>
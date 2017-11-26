<template>
    <div>
        <div id="fullscreen-banner" class="parallax text-center vertical-align overlord-parallax-back">
            <div class="parallax-overlord" style="margin-bottom: 47px;">

                <!-- Background-Color  -->
                <div class='layer-1 layer' data-depth='.30' data-type='parallax' data-direction='down'></div>

                <!-- Ingredients   -->
                <div class='layer-2 layer' data-depth='0.50' data-type='parallax' data-direction='down'></div>

                <!-- Piazzas    -->
                <div class='layer-3 layer' data-depth='0.85' data-type='parallax' data-direction='down'></div>

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
            windowHeight:function(){return $(window).height();}
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
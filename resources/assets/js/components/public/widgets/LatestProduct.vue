<template>
    <div class="widget">
        <div class="heading-title-alt text-left heading-border-bottom">
            <h6 class="text-uppercase">latest Products</h6>
        </div>
        <ul class="widget-latest-post">
            <li>
                <div class="thumb">
                    <a  href="javascript:void(0)">
                        <img src="images/products/instrument-missing.png" alt="">
                    </a>
                </div>
                <div class="w-desk">
                    <a href="#">Praesent pellentesque</a>
                    <div v-if="isRated === true" class="product-rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <div class="product-cart">
                        <a href="javascript:void(0)"><i class="fa fa-shopping-cart"></i> Quote</a>
                    </div>
                </div>
            </li>
            <li>
                <div class="thumb">
                    <a href="javascript:void(0)">
                        <img src="images/products/instrument-missing.png" alt="">
                    </a>
                </div>
                <div class="w-desk">
                    <a href="javascript:void(0)">Shirt With Mesh Sleeves</a>
                    <div v-if="isRated === true" class="product-rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                    </div>
                    <div class="product-cart">
                        <a href="javascript:void(0)"><i class="fa fa-shopping-cart"></i> Quote</a>
                    </div>
                </div>
            </li>
            <li>
                <div class="thumb">
                    <a href="javascript:void(0)">
                        <img src="images/products/instrument-missing.png" alt="">
                    </a>
                </div>
                <div class="w-desk">
                    <a href="javascript:void(0)">Checked Short Dress</a>
                    <div v-if="isRated === true" class="product-rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <div class="product-cart">
                        <a href="javascript:void(0)"><i class="fa fa-shopping-cart"></i> Quote</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default{
        props:['products', 'isRated'],
        components:{

        },
        watch: {

        },
        computed:{

        },

        data(){
            return {



            };
        },
        mounted(){
            let self = this;


        },
        methods: {



        }

    }
</script>
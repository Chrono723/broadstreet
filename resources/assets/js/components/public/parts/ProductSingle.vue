<template>
    <div class="col-md-6">
        <!--product list-->
        <div class="product-list">
            <div class="product-img product-image-style animated" :id="'product_' + product.information.id">

                <a v-for="image in allImages" href="javascript:void(0)"
                   @click="productPage()"
                   @mouseover="hoverImage()"
                >
                    <img :src="'images/products/'+ image.filename +'.png'" alt="" class="product-image-style"/>
                </a>
                <a v-if="product.images.length === 0" href="javascript:void(0)"
                   @click="productPage()"
                   @mouseover="hoverImage()"
                >
                    <img :src="'images/products/instrument-missing.png'" alt="" class="product-image-style"/>
                </a>


                <div v-if="isNew === true" class="sale-label">
                    New!
                </div>
                <div v-if="product.images.length === 0" class="no-image">
                    No Image
                </div>
            </div>
            <div class="product-title">
                <h5><a href="javascript:void(0)" @click="productPage()">{{product.information.name}}</a></h5>
            </div>
            <div class="product-description">
                Series <span class="description-data">{{product.information.series_number}}</span>
            </div>
            <div v-if="product.information.description !== null" class="product-description">
                Description <span class="description-data">{{product.information.description}}</span>
            </div>
            <div v-if="isRated === true" class="product-rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
            </div>
            <div class="product-btn">
                <a href="javascript:void(0)"
                   class="btn btn-extra-small btn-dark-border"
                   @click="quote()"
                ><i class="fa fa-shopping-cart"></i> Quote</a>
            </div>
        </div>
        <!--product list-->
    </div>

</template>

<script>

    export default {
        props: [
            'product',
            'isNew',
            'isRated',

        ],
        watch:{

        },

        data(){
            return {

            }

        },
        computed:{
            allImages: function (){
                let images = [];
                for(let i = 0; i < this.product.images.length; i ++){
                    switch (this.product.images[i].type){
                        case'display': images.push(this.product.images[i]);
                        break;
                    }
                }
                return images;
            }

        },


        mounted(){
            let self = this;
            let $window, $document, $body;

            $window = $(window);
            $document = $(document);
            $body = $("body");
            let card = $('#product_' + self.product.information.id);
            // card.css('opacity', 0);

            /*
            $window.scroll(function(event) {
                if (card.visible(true)) {
                    card.addClass("pulse");
                    card.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                        card.removeClass("pulse");
                    });
                }
            });
            */

        },

        methods:{
            quote(){
                this.$emit('sendQuote', this.product);
            },
            productPage(){
                this.$emit('getPage', this.product.information.id);
            },
            hoverImage(){
                let self = this;
                let card = $('#product_' + self.product.information.id);
                card.addClass("pulse");
                card.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                    card.removeClass("pulse");
                });
            }
        }
    }
</script>
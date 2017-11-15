<template>
    <section class="body-content" id="loading">
        <loading v-if="isLoading === true"></loading>
        <parallax-Header
                :title-parallax="'Product'"
                v-on:done-loading="loaded"
        >
            <img slot="page-image" src="images/backgrounds/GowMacParallax/gow-mac-products.png" class="parallax-page-image-container "/>
        </parallax-Header>
        <page-status v-if="pageStatus.status === 'down' || pageStatus.status === 'soon'" :description="pageStatus.data.description"></page-status>
        <overlord_container data_top='false' data_bottom='false' background-color="transparent">
            <div class="row Panel-Color-Gradient" style="padding-top: 50px;">
                <div class="col-md-5">
                    <div class="post-list-aside">
                        <div v-if="product !== null" class="post-single">
                            <div class="post-slider-thumb post-img text-center">
                                <ul class="slides">
                                    <li v-for="image in product.images" :data-thumb="'images/products/'+ image.filename +'.png'">
                                        <a href="javascript:void(0);">
                                            <img :src="'images/products/'+ image.filename +'.png'" alt="" class="product-image-style"/>
                                        </a>
                                    </li>
                                    <li  v-if="product.images.length === 0" data-thumb="images/products/instrument-missing.png">
                                        <a href="javascript:void(0)">
                                            <img :src="'images/products/instrument-missing.png'" alt="" class="product-image-style"/>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div v-if="product !== null" class="col-md-7">
                    <div class="product-title">
                        <h2 class="text-uppercase">{{product.information.name}}</h2>
                    </div>

                    <div class="product-price txt-xl">
                        <span class="border-tb p-tb-10"> {{product.information.description}} </span>
                    </div>

                    <ul class="portfolio-meta m-bot-10 m-top-10">
                        <li><span> Series No </span> 300</li>
                        <li><span> Type </span> {{product.information.type}}</li>
                        <li><span> Views </span>  {{product.information.product_views}}</li>
                    </ul>
                    <p class="product-body-style" v-html="product.information.body"></p>

                    <ul class="portfolio-meta m-bot-10 stock">
                        <li><span class="status">In Stock</span></li>
                        <li>
                            <div class="clearfix">
                                <a href="#" class="btn btn-medium btn-dark-solid  "><i class="fa fa-shopping-cart"></i> Quote</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </overlord_container>

        <responsive-tabs :tabContent="tabbedContent"></responsive-tabs>

        <product-forms v-if="product !== null" :product-reviews="product.comments"></product-forms>

        <similar-product></similar-product>

        <footer-main v-on:done-loading="loaded"></footer-main>
    </section>

</template>

<script>
    import parallaxHeader from '../hud/ParallaxHeader.vue';
    import Loading from '../hud/Loading.vue';
    import FooterMain from '../hud/Footer.vue';
    import pageStatus from './parts/StatusPage.vue';
    import similarProduct from './parts/SimilarProducts.vue';
    import responsiveTabs from '../hud/ResponsiveTab.vue';
    import productForms from './parts/productForms.vue';
    export default {
        props: [
            'product-id',

        ],
        components:{
            'parallax-Header':parallaxHeader,
            Loading,
            FooterMain,
            pageStatus,
            similarProduct,
            responsiveTabs,
            productForms,
        },
        watch:{
            loadingCount:function(val){
                if (this.loadingCount >= 3){
                    this.isLoading = false;
                }
            }
        },

        data(){
            return {
                id:'products-single',
                isLoading: true,
                loadingCount : 0,
                pageStatus:{
                    data:null,
                    status: null,
                },
                product:null,
                tabNumber: 0,
                tabbedContent:[]
            }
        },
        computed:{
        },
        updated:function(){
            $(".post-slider-thumb").flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        },

        mounted(){
            this.getData(this.productId);
        },

        methods:{
            loaded(){
                $('html,body').scrollTop(0);
                this.loadingCount ++;
            },
            getData(id = 1){

                let self = this;

                axios.get('products/' + id).then(function(response){
                    self.pageStatus.status = response.data.status;
                    if(response.data.status === 'down' || response.data.status === 'soon'){
                        self.pageStatus.data = response.data.data;
                    }
                    else{
                        self.product = response.data;
                        self.sortData();

                    }
                    self.loaded();

                }).catch(function(error){
                    console.log(error.response.data);
                });
            },
            sortData(){
                // Adds Configuration
                if(this.product.configuration.length !== 0){
                    let listItems = [];
                    for(let i=0; i < this.product.configuration.length ; i++){
                        listItems.push(this.product.configuration[i].body);
                    }

                    this.tabbedContent.push({
                        type:'list',
                        name: 'Features',
                        description:this.product.information.body,
                        data: listItems,
                    });


                }
                // Sorts Specifications
                if(this.product.specifications.length !== 0){
                    // Finds all Specification Categories.
                    let specificationCategories = [];
                    for(let i=0; i < this.product.specifications.length ; i++){
                        let isFound = false;
                        for(let y=0; y <= specificationCategories.length ; y++){
                            if (isFound === false){
                                if (specificationCategories[y] === this.product.specifications[i].category){
                                    isFound = true;
                                }
                            }
                        }
                        if (isFound === false){
                            specificationCategories.push(this.product.specifications[i].category);
                        }
                    }
                    //Creates Object
                    for(let z=0; z < specificationCategories.length ; z++){
                        this.tabbedContent.push({
                                type:'table',
                                name: specificationCategories[z],
                                data: [],
                            });
                    }
                    //Adds Data too tabbedContent.
                    for(let x=0; x < this.tabbedContent.length ; x++){
                        for(let i=0; i < this.product.specifications.length ; i++){
                            if(this.product.specifications[i].category === this.tabbedContent[x].name){
                                this.tabbedContent[x].data.push({
                                    name: this.product.specifications[i].name,
                                    body: this.product.specifications[i].body,
                                });
                            }
                        }
                    }
                }
            }
        }
    }
</script>
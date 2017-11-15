<template>
    <section class="body-content" id="loading">
        <loading v-if="isLoading === true"></loading>
        <parallax-Header
                :title-parallax="'Products'"
                v-on:done-loading="loaded"
        >
            <img slot="page-image" src="images/backgrounds/GowMacParallax/gow-mac-products.png" class="parallax-page-image-container"/>
        </parallax-Header>
        <page-status v-if="pageStatus.status === 'down' || pageStatus.status === 'soon'" :description="pageStatus.data.description"></page-status>
        <overlord_container data_top='false' data_bottom='false' background-color="transparent">
            <div class="row Panel-Color-Gradient" style="padding-top: 50px;">
                <div class="col-md-9">
                    <!--product option-->
                    <div class="clearfix m-bot-30 inline-block">

                        <div class="pull-left">
                            <form method="post" action="#">
                                <select class="form-control">
                                    <option>Default sorting</option>
                                    <option>Sort by Type</option>
                                    <option>Sort by Date Added</option>
                                    <option>Sort by newness</option>
                                </select>
                            </form>
                        </div>

                        <div class="pull-left m-top-5 m-left-10">
                            Showing {{sorting}} Instruments.
                        </div>

                        <div class="pull-right shop-view-mode">
                            <a href="#"> <i class="fa fa-th-large"></i>
                            </a>
                            <a href="#"> <i class="fa fa-th-list"></i>
                            </a>
                        </div>

                    </div>
                    <!--product option-->
                    <div class="row">
                        <transition name="fade">
                            <div v-if="isSwitching === false">
                                <product-single v-for="product in selectedProducts"
                                                :product="product"
                                                :is-new="false"
                                                :is-rated="false"
                                                @getPage="fetchPage"
                                                v-bind:key="product.information.id"
                                >

                                </product-single>
                            </div>
                        </transition>

                    </div>
                </div>

                <div class="col-md-3  ">
                    <!--product category-->
                    <div class="widget">
                        <div class="heading-title-alt text-left heading-border-bottom">
                            <h6 class="text-uppercase">product category</h6>
                        </div>
                        <ul class="widget-category">
                            <li><a @click="sortBy('home')" href="javascript:void(0)">All</a></li>
                            <li><a @click="sortBy('chromatographs')" href="javascript:void(0)">Chromatographs</a>
                            </li>
                            <li><a @click="sortBy('analyzers')" href="javascript:void(0)">Analyzers</a>
                            </li>
                            <li><a @click="sortBy('detectors') "href="javascript:void(0)">Detectors & Filaments</a>
                            </li>
                            <li><a @click="sortBy('accessories')" href="javascript:void(0)">Accessories</a>
                            </li>
                            <li><a @click="sortBy('software')" href="javascript:void(0)">Software</a>
                            </li>
                        </ul>
                    </div>
                    <!--product category-->

                    <latest-product></latest-product>


                    <top-rated></top-rated>


                    <product-tags></product-tags>


                </div>

            </div>
        </overlord_container>

        <footer-main v-on:done-loading="loaded"></footer-main>
        <br>
        <br>
        <br>
    </section>
</template>

<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .3s
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0
    }
</style>

<script>
    import parallaxHeader from '../hud/ParallaxHeader.vue';
    import Loading from '../hud/Loading.vue';
    import FooterMain from '../hud/Footer.vue';
    import pageStatus from './parts/StatusPage.vue';
    import productSingle from './parts/ProductSingle.vue';
    import latestProduct from './widgets/LatestProduct.vue';
    import productTags from './widgets/ProductTags.vue';
    import topRated from './widgets/TopRatedProducts.vue';
    export default{
        props:['sub-page', 'isRated','page-location',],
        components:{
            'parallax-Header':parallaxHeader,
            Loading,
            FooterMain,
            pageStatus,
            productSingle,
            latestProduct,
            productTags,
            topRated

        },
        watch: {
            loadingCount:function(val){
                if (this.loadingCount >= 4){
                    this.isLoading = false;
                }
            },
            subPage:function(val){
                this.sortBy(val);
                console.log('Products Sub-Page changed to :' + val)
            }
        },
        computed:{
            chromatographs(){return this.products.products.filter(product => product.information.type === 'Chromatographs')},
            analyzers(){return this.products.products.filter(product => product.information.type === 'Analyzers')},
            detectorFilament(){return this.products.products.filter(product => product.information.type === 'Detectors')},
            accessories(){return this.products.products.filter(product => product.information.type === 'Accessories')}
        },

        data(){
            return {
                id:'products-main',
                isLoading: true,
                isSwitching: true,
                loadingCount : 0,
                pageStatus:{
                    data:null,
                    status: null,
                },
                products:null,
                selectedProducts: null,
                sorting: 'all'


            };
        },
        mounted(){
            let self = this;
            self.isSwitching = false;
            $("#loading").imagesLoaded(function(){
                self.getData();
                $('html,body').scrollTop(0);
                self.loadingCount ++;
            });


        },
        methods: {
            loaded(){
                this.loadingCount ++;
            },
            getData(section = ''){
                let self = this;
                axios.get('products?page=' + section).then(function(response){
                    self.pageStatus.status = response.data.status;
                    if(response.data.status === 'down' || response.data.status === 'soon'){
                        self.pageStatus.data = response.data.data;
                    }
                    else{
                        self.products = response.data.products;
                        // Configure selected products
                        self.sortBy(self.subPage);
                    }
                    self.loaded();

                }).catch(function(error){
                    console.log(error.response.data);
                });
            },
            quote(){
                console.log('got quote');
            },
            getProduct(id){
                this.$emit('getProduct', id);
                console.log('sending emit');
            },
            sortBy(type){
                this.isSwitching = true;
                this.sorting = type;
                switch(type){
                    case'chromatographs': this.selectedProducts = this.chromatographs; break;
                    case'home': this.selectedProducts = this.products.products; break;
                    case'analyzers': this.selectedProducts = this.analyzers; break;
                    case'detectors': this.selectedProducts = this.detectorFilament; break;
                    case'accessories':this.selectedProducts = this.accessories; break;
                    case'software': console.log('not found'); break;
                }
                this.isSwitching = false;
            },
            fetchPage(id){
                this.$emit('getPage', id);
                console.log('second phase');
            }


        }

    }
</script>
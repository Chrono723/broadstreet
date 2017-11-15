<template>
    <section class="body-content" id="loading">
        <loading v-if="isLoading === true"></loading>
        <parallax-Header
                :title-parallax="'News'"
                v-on:done-loading="loaded"
        >
            <img slot="page-image" src="images/backgrounds/GowMacParallax/gow-mac-data.png" class="parallax-page-image-container "/>
        </parallax-Header>
        <page-status v-if="pageStatus.status === 'down' || pageStatus.status === 'soon'" :description="pageStatus.data.description"></page-status>
        <overlord_container data_top='false' data_bottom='false' background-color="transparent">
            <div class="row Panel-Color-Gradient" style="padding-top: 50px;">
                <div class="col-md-8">
                    <news-articles
                            v-for="news in newsArticles"
                            :info="news"
                            v-bind:key="news.information.id"
                    ></news-articles>
                    <pagination-nav
                            v-if="pagination !== null"
                            v-bind:pagination="pagination"
                            v-on:click.native="getData(pagination.current_page)"
                            :offset="4"
                    ></pagination-nav>
                </div>
                <div class="col-md-4">
                    <!-- widgets -->
                    <search-bar></search-bar>
                    <basic-widget></basic-widget>
                    <latest-item></latest-item>
                    <follow-us></follow-us>
                    <category-widget></category-widget>
                    <comments-widget></comments-widget>
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

<script>
    import parallaxHeader from '../hud/ParallaxHeader.vue';
    import Loading from '../hud/Loading.vue';
    import FooterMain from '../hud/Footer.vue';
    import pageStatus from './parts/StatusPage.vue';
    import newsArticles from './parts/NewsArticles.vue';
    import paginationNav from '../hud/Pagination.vue';

    import searchBar from './widgets/SearchBar.vue';
    import basicWidget from './widgets/basicWidget.vue';
    import latestItem from './widgets/latestItem.vue';
    import followUs from './widgets/followUs.vue';
    import categoryWidget from './widgets/categoryWidget.vue';
    import commentsWidget from './widgets/commentsWidget.vue';
    import productTags from './widgets/ProductTags.vue';
    export default{
        props:[],
        components:{
            'parallax-Header':parallaxHeader,
            Loading, FooterMain, pageStatus,
            searchBar, basicWidget, latestItem,
            followUs, categoryWidget, commentsWidget,
            productTags, newsArticles, paginationNav
        },
        watch: {
            loadingCount:function(val){
                if (this.loadingCount >= 3){
                    this.isLoading = false;
                }
            }
        },

        data(){
            return {
                id:'news',
                isLoading: true,
                loadingCount : 0,
                pageStatus:{
                    data:null,
                    status: null,
                },
                newsArticles:null,
                pagination: null,


            };
        },
        mounted(){
            let self = this;
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
            getData(section = 1){
                let self = this;
                axios.get('news?page=' + section).then(function(response){
                    self.pageStatus.status = response.data.status;
                    if(response.data.status === 'down' || response.data.status === 'soon'){
                        self.pageStatus.data = response.data.data;
                    }
                    else{
                        self.newsArticles = response.data.news.data;
                        self.pagination = response.data.news.pagination;
                    }
                    self.loaded();

                }).catch(function(error){
                    console.log(error.response.data);
                });
            }


        }

    }
</script>
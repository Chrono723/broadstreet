<template>
    <section class="body-content" id="loading">
        <loading v-if="isLoading === true"></loading>
        <parallax-Header
                :title-parallax="'About - Terms'"
                v-on:done-loading="loaded"
        ></parallax-Header>
        <page-status v-if="pageStatus.status === 'down' || pageStatus.status === 'soon'" :description="pageStatus.data.description"></page-status>
        <footer-main v-on:done-loading="loaded"></footer-main>
    </section>
</template>

<script>
    import parallaxHeader from '../hud/ParallaxHeader.vue';
    import Loading from '../hud/Loading.vue';
    import FooterMain from '../hud/Footer.vue';
    import pageStatus from './parts/StatusPage.vue';
    export default{
        props:[],
        components:{
            'parallax-Header':parallaxHeader,
            Loading,
            FooterMain,
            pageStatus
        },
        watch: {
            loadingCount:function(val){
                if (this.loadingCount >= 4){
                    this.isLoading = false;
                }
            }
        },

        data(){
            return {
                id:'terms',
                isLoading: true,
                loadingCount : 0,
                pageStatus:{
                    data:null,
                    status: null,
                },
                terms:null,


            };
        },
        mounted(){
            let self = this;
            $("#loading").imagesLoaded(function(){
                self.getData();
                self.loadingCount ++;
            });


        },
        methods: {
            loaded(){
                this.loadingCount ++;
            },
            getData(){
                let self = this;
                axios.get('terms').then(function(response){
                    self.pageStatus.status = response.data.status;
                    if(response.data.status === 'down' || response.data.status === 'soon'){
                        self.pageStatus.data = response.data.data;
                    }
                    else{
                        self.terms = response.data;
                    }
                    self.loaded();

                }).catch(function(error){
                    console.log(error.response.data);
                });
            }


        }

    }
</script>
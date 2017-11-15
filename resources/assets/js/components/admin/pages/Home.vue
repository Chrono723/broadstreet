<template>

    <div class="body-content animated fadeIn">

            <BasicStats></BasicStats>

            <div class="row">
                <div class="col-md-9">
                    <StatBoard></StatBoard>
                </div>


                <div class="col-md-3">

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-4 col-xs-12">

                            <WidgetGraph v-bind:graphType="'beatCount'"></WidgetGraph>

                            <div class="divider"></div>

                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-8 col-xs-12">

                            <WidgetNews></WidgetNews>

                        </div>
                    </div>

                </div>

            </div>

            <div class="row">
                <div class="col-md-9">
                    <ResponsiveTable></ResponsiveTable>



                </div>

                <div class="col-md-3">

                    <!-- Start mini stats social widget -->
                    <div class="row">

                        <div class="col-md-12  col-xs-4 col-xs-override">

                            <div class="panel rounded shadow">
                                <div class="panel-heading text-center bg-youtube">
                                    <p class="inner-all no-margin">
                                        <i class="fa fa-youtube fa-5x"></i>
                                    </p>
                                </div>
                                <div class="panel-body text-center">
                                    <p class="h4 no-margin inner-all text-strong">
                                        <span class="block">342</span>
                                        <span class="block">Videos</span>
                                    </p>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-12 col-sm-4 col-xs-4 col-xs-override">

                            <div class="panel rounded shadow">
                                <div class="panel-heading text-center bg-dribbble">
                                    <p class="inner-all no-margin">
                                        <i class="fa fa-dribbble fa-5x"></i>
                                    </p>
                                </div>
                                <div class="panel-body text-center">
                                    <p class="h4 no-margin inner-all text-strong">
                                        <span class="block">2,341</span>
                                        <span class="block">Designs</span>
                                    </p>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-12 col-sm-4 col-xs-4 col-xs-override">

                            <div class="panel rounded shadow">
                                <div class="panel-heading text-center bg-soundcloud">
                                    <p class="inner-all no-margin">
                                        <i class="fa fa-soundcloud fa-5x"></i>
                                    </p>
                                </div>
                                <div class="panel-body text-center">
                                    <p class="h4 no-margin inner-all text-strong">
                                        <span class="block">34,282</span>
                                        <span class="block">Musics</span>
                                    </p>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>

</template>

<script>
    import StatBoard from '../part/StatBoard.vue';
    import BasicStats from '../part/Stats.vue';
    import WidgetGraph from '../part/WidgetGraph.vue';
    import WidgetNews from '../part/WidgetNews.vue';
    import ResponsiveTable from '../part/ResponsiveTable.vue';
    export default {
        props: [

        ],
        components:{
            StatBoard, BasicStats,
            WidgetGraph, WidgetNews, ResponsiveTable,
        },



        data(){
            return {

            };
        },
        mounted(){

        }
    }
</script>
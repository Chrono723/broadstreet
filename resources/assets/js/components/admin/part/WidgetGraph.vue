<template>

    <div class="graph-panel rounded OverLord-Shadow-Main">
        <div class="OverlordBevel Bevel-h20"></div>
        <div class="graphPie" id="graphPie"></div>
        <div class="OverlordBevel Bevel-h20"></div>
    </div>

</template>
<style>
    .graph-panel{
        width: 100%;
        height: 500px;
        background-color: rgba(22, 22, 22, 0.17);

    }
    .graphPie{
        min-width: 310px; max-width: 600px; height: 400px; margin: 0 auto
    }

</style>
<script>

    export default {
        props: {
            graphType: {
                type: String,
                required: true,
            },
        },
        created(){
            let self = this;
            let url = null;
            switch (self.graphType){
                case 'beatCount': url = 'admin/beats/chart/count';  break;
            }


        },

        data(){
            return {
                chartData: null,
            };
        },
        mounted(){

        }
    }
</script>
<template>
    <div class="graph-panel OverLord-Shadow-Main">
        <div class="OverlordBevel Bevel-h20"></div>
        <div class="graph" id="graph"></div>
        <div class="OverlordBevel Bevel-h20"></div>
    </div>
</template>
<style>
    .graph-panel{
        width:100%;
        height: 600px;
        background-color: #121212;
        margin-bottom: 15px;
    }
    .graph{
        width:100%;
        height:80%;
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
                case 'beatViews': url = 'admin/beats/chart/views';  break;
                case 'userViews': url = 'admin/users/chart/views';  break;
            }

            axios.get(url)
                .then(function (response){
                    self.chartData = response.data;
                    $('#graph').highcharts(self.chartData);
                })
                .catch(function (error) {console.log(error);});
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
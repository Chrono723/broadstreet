<template>

    <div class="tab-panel OverLord-Shadow-Main">
        <div class="tab-title">
            <div class="button-container OverLord-Shadow-Main">
                <div
                        v-for="tab in Tabs"
                        @click="switchTab(tab)"
                        @mouseover="tab.button.hover = true"
                        @mouseout="tab.button.hover = false"
                        :class="{
                            OverlordHover: tab.button.hover === true,
                            OverlordHoverOut: tab.button.hover == false,
                            OverlordActive: tab.button.active
                        }"
                        class="button-tab"
                >
                    <slot :name="tab.buttonName"></slot>
                </div>

            </div>
        </div>
        <div  v-for="tab in Tabs" v-if="tab.button.active === true" class="tab-body">
            <div class="body-container">
                <div class="body-tab">
                    <slot :name="tab.bodyName"></slot>

                </div>
            </div>
        </div>


    </div>

</template>
<style>
    .tab-panel{
        width:100%;
        min-height: 810px;

    }
    .tab-title{
        padding: 5px;
    }
    .button-container{
        width: 100%;
        display: inline-block;
        height: 100%;
        padding: 5px;
        background-color: black;
    }
    .button-tab{
        min-width: 150px;
        float: left;
        border-radius: 3px;
        color: #fff;

        margin-right: 15px;
        text-align: center;
    }
    .OverlordHoverOut{
        background-color: #222;
    }
    .OverlordHover{
        background-color: #03675f
    }
</style>
<script>

    export default{
        data(){
            return{
                Tabs:[],
            }
        },
        props: [
            'numberTabs'
        ],
        computed:{

        },
        created(){

        },
        mounted(){

            for(let i = 0; i < this.numberTabs; i++){
                this.Tabs.push({
                    number: i,
                    buttonName:'slot_button_'+ i,
                    bodyName:'slot_body_'+ i,
                    button:{
                        hover:false,
                        active:false,
                    }
                });
            }


        },
        components:{

        },
        methods:{
            switchTab(tab){
                console.log('Switching..');
                for(let i= 0; i < this.Tabs.length; i++){

                    this.Tabs[i].button.active = false;

                }
                tab.button.active = true;
            }

        }
    }
</script>
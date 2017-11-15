<template>

    <div class="information-panel">
        <div class="information-panel-title OverLord-Shadow-Main">
            <span class="Crackin-White-Title">{{title}}</span>
        </div>
        <div class="information-panel-content-container OverLord-Shadow-Main">
            <div class="information-panel-content OverLord-Shadow-Main">
                <slot name="content"></slot>
            </div>

        </div>

    </div>

</template>

<script>

    export default{
        data(){
            return{

            }
        },
        props: [
            'title'
        ],
        created(){

        },
        mounted(){
            $(".information-panel-content").mCustomScrollbar({live:true, theme:"light-thick"});

        },
        components:{

        },
        methods:{

        }
    }
</script>
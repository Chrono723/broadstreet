<template>

    <div class="responsive-table">
        <table class="table table-hover table-sticky table-design table-striped OverLord-Shadow-Main">
            <thead>
            <slot name="header"></slot>
            </thead>
            <tbody>
            <slot name="row"></slot>
            </tbody>
        </table>
    </div>

</template>

<script>

    export default{
        data(){
            return{

            }
        },
        props: {

        },
        created(){

        },
        mounted(){
            $(".responsive-table").mCustomScrollbar({live:true, theme:"light-thick"});
            $(".table-sticky").floatThead({
                    floatContainerClass: 'responsive-table-container widthFix',
                    scrollContainer: function($table){
                        return $table.closest('.responsive-table');
                    },
                    autoReflow: true
                }
            );
        },
        components:{

        },
        methods:{

        }
    }
</script>

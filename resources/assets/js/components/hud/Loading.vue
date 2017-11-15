<template>
    <section class="loading-block">
        <img class="loading-gif" src="images/loading.gif">
    </section>
</template>

<script>

    export default{
        props:[],
        components:{

        },
        watch: {

        },

        data(){
            return {



            };
        },
        mounted(){
            $(document).ready(function(){
                resizeDiv();
            });

            window.onresize = function(event) {
                resizeDiv();
            };

            function resizeDiv() {
                let vph = $(window).height();
                $('.loading-block').css({'height': vph + 'px'});
            }
        },
        methods: {

        }

    }
</script>
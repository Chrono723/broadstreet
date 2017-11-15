<template>
    <section class="body-content">
        <div class="OverlordBevel Bevel-h40"></div>
        <section class=" error-parallax ">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">

                        <div class="error-avatar">
                            <img src="images/logos/weebeats/WeeBeatsWB.png" alt="" style="width: 100%;top: 140px;position: relative;"/>
                        </div>

                        <div class="error-info">
                            <div class="error404">
                                Page Down
                            </div>
                            <div class="error-txt">
                                {{ description }}
                            </div>
                            <a href="home" class="btn btn-medium  btn-theme-color "> Take Me Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="OverlordBevel Bevel-h40"></div>
    </section>
</template>

<script>

    export default{
        props:['description'],
        components:{

        },
        watch: {

        },

        data(){
            return {



            };
        },
        mounted(){



        },
        methods: {

        }


    }
</script>
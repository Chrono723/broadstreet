<template>
    <section class="body-content" style="background-color: #101010;">
        <div class="OverlordBevel Bevel-h40"></div>
        <div class="page-content" style="padding: 100px 0;">
            <div class="container">
                <div class="row page-content">
                    <div class="col-md-5">
                        <div class="error-avatar">
                            <img src="images/logos/weebeats/WeeBeatsWB.png" alt="" style="width: 100%;top: 140px;position: relative;"/>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="error-info">
                            <div class="error404">
                                Access Denied
                            </div>
                            <div class="error-txt">
                                Well Shucks...<br/>
                                <span v-if="info.for" class="url"><span class="url-tag">URL:</span> "@{{ info.for }}"</span><br>
                                <span class="error-msg">Can not be accessed with your current permissions</span>
                            </div>
                            <a href="home" class="btn btn-medium  btn-theme-color "> Take Me Home</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="OverlordBevel Bevel-h40"></div>
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



        },
        methods: {

        }


    }
</script>
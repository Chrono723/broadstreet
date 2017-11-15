<template>
    <div class="parallax-inner">
        <div class="container">
            <div class="row">
                <div class="heading-title-alt text-center m-bot-0 inline-block">
                    <img class="retina" src="images/logos/weebeats/WBLARGE.png" alt="Massive">

                    <h1 class="text-uppercase light-txt OL-White-Title-Extra-Large">Keeping up with Wayne-Wee</h1>
                    <span class="heading-sub-title text-uppercase" style="color: #ffffff !important;">..is like keeping up with hip-hop style </span>

                    <div class="m-top-50 inline-block">
                        <a href="news" class="btn btn-medium  btn-theme-color light-hover"> Latest News</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>

    export default {
        mounted(){
            let self = this;
            $("#loading-progress").imagesLoaded(function(){
                self.$emit('done-loading');
            });

        },
    }
</script>
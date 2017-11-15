<template>
    <div class="widget">
        <div class="heading-title-alt text-left heading-border-bottom">
            <h6 class="text-uppercase">latest post</h6>
        </div>
        <ul class="widget-latest-post">
            <li>
                <div class="thumb">
                    <a href="#">
                        <img src="images//post/post-thumb.jpg" alt="" />
                    </a>
                </div>
                <div class="w-desk">
                    <a href="#">Old Father Getup</a>
                    April 25, 2014
                </div>
            </li>
            <li>
                <div class="thumb">
                    <a href="#">
                        <img src="images//post/post-thumb-2.jpg" alt="" />
                    </a>
                </div>
                <div class="w-desk">
                    <a href="#">Represent is the best way</a>
                    March 28, 2014
                </div>
            </li>
            <li>
                <div class="thumb">
                    <a href="#">
                        <img src="images//post/post-thumb-3.jpg" alt="" />
                    </a>
                </div>
                <div class="w-desk">
                    <a href="#">Alone with the music</a>
                    May 05, 2014
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default{
        props:['image', 'text', 'footer'],
        components:{

        },
        watch: {

        },
        computed:{

        },

        data(){
            return {



            };
        },
        mounted(){
            let self = this;


        },
        methods: {



        }

    }
</script>
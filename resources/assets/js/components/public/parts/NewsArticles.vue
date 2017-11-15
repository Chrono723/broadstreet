<template>
    <div class="blog-classic">
        <div class="date">
            17
            <span>MAR 2015</span>
        </div>
        <!-- Quotes -->
        <div v-if="info.information.news_type === 'quote'" class="blog-post">
            <blockquote class="quote-post">
                <p>{{info.information.description}}</p>
            </blockquote>
            <span>- {{info.information.author}}</span>
        </div>

        <div v-if="info.information.news_type !== 'quote'" class="blog-post">
            <!-- Images -->
            <div v-if="info.information.news_type === 'image'" class="full-width product-image-style">
                <img :src="'images/news/' + info.information.url" alt="" class="product-image-style"/>
            </div>
            <!-- Gallery -->
            <div  v-if="info.information.news_type === 'gallery'" class="full-width ">
                <div class="post-slider post-img text-center relative">
                    <ul class="slides">
                        <li>
                            <a href="javascript:;" title="Freshness Photo">
                                <img src="images//post/p3.jpg" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" title="Awesome Lightbox">
                                <img src="images//post/p2.jpg" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" title="Massive UI Components">
                                <img src="images//post/p1.jpg" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- soundcloud -->
            <p v-if="info.information.news_type === 'soundcloud'" class="audio-fit m-bot-50">
                <iframe :src="info.information.url"></iframe>
            </p>
            <!-- YouTube -->
            <p v-if="info.information.news_type === 'youtube'" class="audio-fit m-bot-50" style="height: 315px;">
                <iframe class="product-image-style" width="560" height="315" :src="info.information.url" allowfullscreen></iframe>
            </p>

            <!-- Title -->
            <h4  class="text-uppercase"><a href="#">{{info.information.title}}</a></h4>







            <ul class="post-meta">
                <li><i class="fa fa-user"></i>posted by <a href="#">admin</a>
                </li>
                <li>
                    <i class="fa fa-folder-open"></i>
                    <a href="#">lifestyle</a>, <a href="#">travel</a>, <a href="#">fashion</a>
                </li>
                <li><i class="fa fa-comments"></i>  <a href="#">4 comments</a>
                </li>
            </ul>
            <p >
                {{info.information.description}}
            </p>

            <a href="blog-single.html" class="btn btn-small btn-dark-solid  "> Continue Reading</a>
        </div>
    </div>
</template>

<script>
    export default {
        props:{
            info:null,
        },
        mounted() {


        }
    }
</script>


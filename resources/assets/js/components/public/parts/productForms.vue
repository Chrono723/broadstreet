<template>
    <overlord-container  :data_top='false' :data_bottom='false' :background-color="'transparent'">
        <div class="row Panel-Color-Gradient" style="margin-top: -200px;">
            <div class="col-md-12">
                <!--tabs border start-->
                <section class="normal-tabs">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#tab-three">Review ({{reviewCount}})</a>
                        </li>

                    </ul>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div id="tab-three" class="tab-pane active">
                                <ul v-if="productReviews.length !== 0" class="media-list comments-list clearlist">

                                    <!-- comment item start-->
                                    <li class="media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object review-avatar" src="images/post/a1.png" alt="">
                                        </a>
                                        <div class="media-body">
                                            <div class="comment-info">
                                                <div class="reviewer text-uppercase">
                                                    <a href="#">John Doe</a>
                                                </div>
                                                July 5, 2015, at 1:20
                                                <span class="review-rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i>
                                                            </span>
                                            </div>

                                            <p>
                                                Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets. rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets.
                                            </p>
                                        </div>
                                    </li>
                                    <!-- comment item end -->

                                    <!-- comment item -->
                                    <li class="media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object review-avatar" src="images/post/a1.png" alt="">
                                        </a>
                                        <div class="media-body">
                                            <div class="comment-info">
                                                <div class="reviewer text-uppercase">
                                                    <a href="#">Margarita Smith</a>
                                                </div>
                                                July 5, 2015, at 1:30
                                                <span class="review-rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o"></i>
                                                            </span>
                                            </div>

                                            <p>
                                                Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo..
                                            </p>
                                        </div>
                                    </li>
                                    <!-- comment item end -->

                                </ul>
                                <div v-if="productReviews.length === 0" class="no-data-found">
                                    No Reviews Found. Be the first to review this product!
                                </div>

                                <!--add review start-->
                                <div class="heading-title-alt text-left heading-border-bottom">
                                    <h4 class="text-uppercase">ADD REVIEW</h4>
                                </div>

                                <form method="post" action="#" id="form" role="form" class="blog-comments">

                                    <div class="row">

                                        <div class="col-md-6 form-group">
                                            <!-- Name -->
                                            <input type="text" name="name" id="name" class=" form-control" placeholder="Name *" maxlength="100" required="">
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <!-- Email -->
                                            <input type="email" name="email" id="email" class=" form-control" placeholder="Email *" maxlength="100" required="">
                                        </div>


                                        <div class="form-group col-md-12">
                                            <select class="form-control">
                                                <option value="">Rating -- Select One --</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>

                                        <!-- Comment -->
                                        <div class="form-group col-md-12">
                                            <textarea name="text" id="text" class=" form-control" rows="6" placeholder="Comment" maxlength="400"></textarea>
                                        </div>

                                        <!-- Send Button -->
                                        <div class="form-group col-md-12">
                                            <button type="submit" class="btn btn-small btn-dark-solid ">
                                                Submit Review
                                            </button>
                                        </div>


                                    </div>

                                </form>
                                <!--add review end-->

                            </div>
                        </div>
                    </div>
                </section>
                <!--tabs border end-->
            </div>
        </div>
    </overlord-container>
</template>

<script>
    import overlordContainer from '../../overlord_container.vue';
    export default{
        props:['productReviews'],
        components:{
            'overlord-container': overlordContainer,
        },
        watch: {

        },
        computed:{
          reviewCount:function(){
              if (this.productReviews === null){
                  return 0;

              }else{
                  return this.productReviews.length;
              }
          }
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
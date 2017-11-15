<template>

    <li class="dropdown navbar-notification">

        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell-o"></i><span class="count label label-danger rounded">6</span></a>

        <!-- Start dropdown menu -->
        <div class="dropdown-menu animated flipInX">
            <div class="dropdown-header">
                <span class="title">Notifications <strong>(10)</strong></span>
                <span class="option text-right"><a href="#"><i class="fa fa-cog"></i> Setting</a></span>
            </div>
            <div class="dropdown-body niceScroll">

                <!-- Start notification list -->
                <div class="media-list small">

                    <a href="#" class="media">
                        <div class="media-object pull-left"><i class="fa fa-share-alt fg-info"></i></div>
                        <div class="media-body">
                            <span class="media-text"><strong>Dolanan Remi : </strong><strong>Chris Job,</strong><strong>Denny Puk</strong> and <strong>Joko Fernandes</strong> sent you <strong>5 free energy boosts and other request</strong></span>
                            <!-- Start meta icon -->
                            <span class="media-meta">3 minutes</span>
                        </div>
                    </a>

                    <a href="#" class="media">
                        <div class="media-object pull-left"><i class="fa fa-cogs fg-success"></i></div>
                        <div class="media-body">
                            <span class="media-text">Your sistem is updated</span>
                            <!-- Start meta icon -->
                            <span class="media-meta">5 minutes</span>
                        </div>
                    </a>

                    <a href="#" class="media">
                        <div class="media-object pull-left"><i class="fa fa-ban fg-danger"></i></div>
                        <div class="media-body">
                            <span class="media-text">3 Member is BANNED</span>
                            <!-- Start meta icon -->
                            <span class="media-meta">5 minutes</span>
                        </div>
                    </a>

                    <a href="#" class="media">
                        <div class="media-object pull-left"><img class="img-circle" src="http://img.djavaui.com/?create=30x30,4888E1?f=ffffff" alt=""/></div>
                        <div class="media-body">
                            <span class="media-text">daddy pushed to project Blankon version 1.0.0</span>
                            <!-- Start meta icon -->
                            <span class="media-meta">45 minutes</span>
                        </div>
                    </a>

                    <a href="#" class="media">
                        <div class="media-object pull-left"><i class="fa fa-user fg-info"></i></div>
                        <div class="media-body">
                            <span class="media-text">Change your user profile</span>
                            <!-- Start meta icon -->
                            <span class="media-meta">1 days</span>
                        </div>
                    </a>

                    <a href="#" class="media">
                        <div class="media-object pull-left"><i class="fa fa-book fg-info"></i></div>
                        <div class="media-body">
                            <span class="media-text">Added new article</span>
                            <!-- Start meta icon -->
                            <span class="media-meta">1 days</span>
                        </div>
                    </a>

                    <!-- Start notification indicator -->
                    <a href="#" class="media indicator inline">
                        <span class="spinner">Load more notifications...</span>
                    </a>

                </div>

            </div>
            <div class="dropdown-footer">
                <a href="#">See All</a>
            </div>
        </div>

    </li>

</template>

<script>

    export default {
        props: [

        ],

        data(){
            return {

            };
        },
        mounted(){

        }
    }
</script>
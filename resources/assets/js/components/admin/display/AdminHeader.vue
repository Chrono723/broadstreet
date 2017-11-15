<template>
    <header id="header">

        <div class="header-left">

            <!-- Start offcanvas left: This menu will take position at the top of template header (mobile only). Make sure that only #header have the `position: relative`, or it may cause unwanted behavior -->
            <div class="navbar-minimize-mobile left">
                <i class="fa fa-bars"></i>
            </div>

            <!-- Start navbar header -->
            <div class="navbar-header">

                <!-- Start brand -->
                <a class="navbar-brand" href="./home">
                    <img class="logo" style="height:100%;" src="" alt="Gow-Mac"/>
                </a>

            </div>

            <!-- Start offcanvas right: This menu will take position at the top of template header (mobile only). Make sure that only #header have the `position: relative`, or it may cause unwanted behavior -->
            <div class="navbar-minimize-mobile right">
                <i class="fa fa-cog"></i>
            </div>

            <div class="clearfix"></div>
        </div>

        <div class="header-right">
            <!-- Start navbar toolbar -->
            <div class="navbar navbar-dark navbar-toolbar">

                <!-- Start left navigation -->
                <ul class="nav navbar-nav navbar-left">

                    <!-- Start sidebar shrink -->
                    <li class="navbar-minimize">
                        <a href="javascript:void(0);" @click="minimizeNav()" title="Minimize sidebar">
                            <i class="fa fa-bars"></i>
                        </a>
                    </li>


                    <search-bar></search-bar>

                </ul>

                <!-- Start right navigation -->
                <ul class="nav navbar-nav navbar-right">

                    <messages></messages>

                    <notifications></notifications>

                    <profile :user-name="userInfo.name"></profile>

                    <!-- Start settings -->
                    <li class="navbar-setting pull-right">
                        <a href="javascript:void(0);" @click="minimizeSettings()"><i class="fa fa-cog fa-spin"></i></a>
                    </li>

                </ul>

            </div>

        </div>

    </header>
</template>

<script>
    import messages from './parts/Messages.vue'
    import notifications from './parts/Notifications.vue'
    import profile from './parts/Profile.vue'
    import SearchBar from './parts/SearchBar.vue'

    export default{
        props: {
            userInfo: {
                required: true,
            },
        },
        data(){
            return{


            }
        },
        components:{
            messages, notifications, profile,
            'search-bar': SearchBar
        },
        mounted(){
            this.handleSidebarResponsive();
        },
        methods:{
            minimizeNav(){
                // Check class sidebar right show
                if($('.page-sidebar-right-show').length){
                    $('body').removeClass('page-sidebar-right-show');
                }

                // Check class sidebar minimize auto
                if($('.page-sidebar-minimize-auto').length){
                    $('body').removeClass('page-sidebar-minimize-auto');
                }else{
                    // Toggle the class to the body
                    $('body').toggleClass('page-sidebar-minimize');
                }
            },
            minimizeSettings(){
                if($('.page-sidebar-minimize.page-sidebar-right-show').length){
                    $('body').toggleClass('page-sidebar-minimize page-sidebar-right-show');
                }
                else if($('.page-sidebar-minimize').length){
                    $('body').toggleClass('page-sidebar-right-show');
                }else{
                    $('body').toggleClass('page-sidebar-minimize page-sidebar-right-show');
                }
            },
            // =========================================================================
            // SIDEBAR RESPONSIVE
            // =========================================================================
            handleSidebarResponsive: function () {
                // This action available on mobile view
                $('.navbar-minimize-mobile.left').on('click',function(){
                    if($('body.page-sidebar-right-show').length){
                        $('body').removeClass('page-sidebar-right-show');
                        $('body').removeClass('page-sidebar-minimize');
                    }
                    $('body').toggleClass('page-sidebar-left-show');
                });
                $('.navbar-minimize-mobile.right').on('click',function(){
                    if($('body.page-sidebar-left-show').length){
                        $('body').removeClass('page-sidebar-left-show');
                        $('body').removeClass('page-sidebar-minimize');
                    }
                    $('body').toggleClass('page-sidebar-right-show');
                });
            },
        }
    }
</script>
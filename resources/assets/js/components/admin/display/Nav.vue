<template>
    <aside id="sidebar-left" class="sidebar-circle">

        <!-- Start left navigation - profile shortcut -->
        <div class="sidebar-content">
            <div class="media">
                <a class="pull-left has-notif avatar" href="">
                    <img src="http://img.djavaui.com/?create=50x50,4888E1?f=ffffff" alt="admin">
                    <i class="online"></i>
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Hello, <span>{{userInfo.name}}</span></h4>
                    <small>{{userInfo.email}}</small>
                </div>
            </div>
        </div>

        <!-- Start left navigation - menu -->
        <ul  v-if="pageUrls ==='admin'" class="sidebar-menu">
            <!-- Start navigation - dashboard -->
            <nav-pill :mainCategory="generate.home.category" v-on:clickedPill="pillClicked"></nav-pill>
            <!-- Start System  -->
            <li class="sidebar-category"><span>System</span><span class="pull-right"><i class="fa fa-code"></i></span></li>
            <nav-pill :mainCategory="generate.settings.category" :subCategories="generate.settings.subCategories" v-on:clickedPill="pillClicked"></nav-pill>
            <nav-pill :mainCategory="generate.about.category" :subCategories="generate.about.subCategories" v-on:clickedPill="pillClicked"></nav-pill>
            <nav-pill :mainCategory="generate.header.category" :subCategories="generate.header.subCategories" v-on:clickedPill="pillClicked"></nav-pill>
            <!--####################################### Start Modules ####################################################################################-->
            <li class="sidebar-category"><span>Modules</span><span class="pull-right"><i class="fa fa-magic"></i></span></li>
            <nav-pill :mainCategory="generate.products.category" :subCategories="generate.products.subCategories" v-on:clickedPill="pillClicked"></nav-pill>
            <nav-pill :mainCategory="generate.news.category" :subCategories="generate.news.subCategories" v-on:clickedPill="pillClicked"></nav-pill>
            <nav-pill :mainCategory="generate.social.category" :subCategories="generate.social.subCategories" v-on:clickedPill="pillClicked"></nav-pill>

            <!-- ###############################################Start User Information################################################################## -->
            <li class="sidebar-category"><span>User Info</span><span class="pull-right"><i class="fa fa-magic"></i></span></li>
            <nav-pill :mainCategory="generate.users.category" v-on:clickedPill="pillClicked"></nav-pill>
            <!-- Start navigation - Users -->
        </ul>

        <ul  v-if="pageUrls ==='profile'" class="sidebar-menu">
            <nav-pill :mainCategory="generate.home.category" v-on:clickedPill="pillClicked"></nav-pill>
            <!--####################################### Start Modules ####################################################################################-->
            <li class="sidebar-category"><span>Modules</span><span class="pull-right"><i class="fa fa-magic"></i></span></li>
            <nav-pill :mainCategory="generate.mail.category" :subCategories="generate.mail.subCategories" v-on:clickedPill="pillClicked"></nav-pill>
            <!-- ###############################################Start User Information################################################################## -->
            <li class="sidebar-category"><span>User Info</span><span class="pull-right"><i class="fa fa-magic"></i></span></li>
            <nav-pill :mainCategory="generate.downloads.category" v-on:clickedPill="pillClicked"></nav-pill>
        </ul>

        <!-- Start left navigation - footer -->
        <bottom-nav></bottom-nav>

    </aside>
</template>

<script>

    import BottomNav from './parts/BottomNav.vue';
    import navPill from './parts/NavPill.vue';

    export default{
        data(){
            return{
                generate:{
                    products:{
                        category:{name: 'Products', id:'products'},
                        subCategories: [
                            {name:'All', id:'all'},
                            {name:'Create', id:'create'},
                            {name:'Reviews', id:'reviews'},
                            {name:'Quotes', id:'quotes'},
                            {name:'Chromatographs', id:'chromatographs'},
                            {name:'Analyzers', id:'analyzers'},
                            {name:'Detectors', id:'detectors'},
                            {name:'Accessories', id:'accessories'},
                        ]
                    },
                    news:{
                        category:{name: 'News', id: 'news'},
                        subCategories: [
                            {name:'Main', id:'main'},
                            {name:'Create', id:'create'},
                        ]
                    },
                    header:{
                        category:{name:'Header Information', id:'header'},
                        subCategories: [
                            {name:'General', id:'general'},
                            {name:'Keywords', id:'keywords'},
                            {name:'Viewport', id:'viewport'},

                        ]
                    },
                    about:{
                        category:{name:'About', id:'about'},
                        subCategories: [
                            {name:'Contacts', id:'contacts'},
                            {name:'FAQ', id:'faq'},
                            {name:'Terms of Use', id:'terms'},
                            {name:'Policy', id:'policy'},
                            {name:'Legal Statement', id:'legal'},
                            {name:'History', id:'history'},
                            {name:'Certifications', id:'certifications'},

                        ]
                    },
                    settings:{
                        category:{name:'Settings', id:'settings'},
                        subCategories: [
                            {name:'General', id:'general'},
                            {name:'Advanced', id:'advanced'},
                            {name:'Page Status', id:'pagestatus'},
                        ]
                    },
                    home:{
                        category:{name: 'Admin Home', id: 'home'}
                    },
                    users:{
                        category:{name: 'Users', id: 'users'}
                    },
                    social:{
                        category:{name: 'Social Media', id: 'social'},
                        subCategories: [
                            {name:'Facebook', id:'facebook'},
                            {name:'Twitter', id:'twitter'},
                            {name:'Google', id:'google'},
                            {name:'YouTube', id:'youtube'},
                            {name:'SoundCloud', id:'soundcloud'},
                        ]
                    },
                    downloads:{
                        category:{name:'Downloads', id:'downloads'}
                    },
                    mail:{
                        category:{name:'Mail', id:'mail'}
                    }

                },
            }
        },
        components:{
            'bottom-nav': BottomNav,
            'nav-pill': navPill
        },
        mounted(){
            this.handleSidebarNavigation();
        },
        props: {
            userInfo: {
                required: true,
            },
            pageUrls:{
                required: true,
            },
        },
        methods: {
            pillClicked(mainID, subID = null){
                if (subID !== null){
                    console.log('this sub pill (' + subID + ') clicked.');
                    for(let i = 0; i < this.$children.length; i++){
                        if(this.$children[i].id === 'link-category'){
                            if(this.$children[i].name !== mainID){
                                this.$children[i].resetAll();
                            }
                        }
                    }
                    this.directTo(subID);
                }else{
                    console.log('this pill (' + mainID + ') clicked.');
                    for(let i = 0; i < this.$children.length; i++){
                        if(this.$children[i].id === 'link-category'){
                            if(this.$children[i].name !== mainID){
                                this.$children[i].resetAll();
                            }
                        }
                    }
                    this.directTo(mainID);

                }

            },
            directTo(location){
                window.location.hash = location;
                $(document).prop('title', 'Admin | ' + location);
                this.$parent.info.subPage = location;
            },
            // =========================================================================
            // SIDEBAR NAVIGATION
            // =========================================================================
            handleSidebarNavigation: function () {
                // Create trigger click for open menu sidebar
                $('.submenu > a').click(function() {
                    let parentElement = $(this).parent('.submenu'),
                        nextElement = $(this).nextAll(),
                        arrowIcon = $(this).find('.arrow'),
                        plusIcon = $(this).find('.plus');

                    if(parentElement.parent('ul').find('ul:visible')){
                        parentElement.parent('ul').find('ul:visible').slideUp('fast');
                        parentElement.parent('ul').find('.open').removeClass('open');
                    }

                    if(nextElement.is('ul:visible')) {
                        arrowIcon.removeClass('open');
                        plusIcon.removeClass('open');
                        nextElement.slideUp('fast');
                        arrowIcon.removeClass('fa-angle-double-down').addClass('fa-angle-double-right');
                    }

                    if(!nextElement.is('ul:visible')) {
                        arrowIcon.addClass('open');
                        plusIcon.addClass('open');
                        nextElement.slideDown('fast');
                        arrowIcon.removeClass('fa-angle-double-right').addClass('fa-angle-double-down');
                    }

                });
            },
        }
    }
</script>

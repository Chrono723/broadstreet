require('../app');

import AdminBody from '../components/admin/display/AdminBody.vue';
import ProfileBody from '../components/profile/interface/ProfileBody.vue'
import AdminHeader from '../components/admin/display/AdminHeader.vue';
import navLeft from '../components/admin/display/Nav.vue';
import headerBar from '../components/admin/part/Header.vue'

let app = new Vue({
    name: 'App',
    el: '#app',
    components: {
        'admin-body': AdminBody, 'header-bar': headerBar,
        'nav-left': navLeft, 'admin-header': AdminHeader,
        'profile-body': ProfileBody
    },
    data: {
        info: {
            mainPage: ((typeof window.jsPass !== 'undefined') ? window.jsPass.MainPage : 'profile'),
            subPage: null,
            actualPage: null,
            baseURL: null,
        },
        users: '',
        logged: '',
    },
    mounted(){
        this.init();
    },
    created(){

    },
    methods: {
        init(){
            this.info.baseURL = this.handleBaseURL();
            this.handleBackToTop();
            this.handleIE();
            this.handleSidebarScroll();
            this.handleTooltip();
            this.handleNavbarScroll();
            let self = this;
            let url =  this.info.mainPage;

            if (window.location.hash === ''){



                axios.get((this.info.mainPage === 'admin')? url.concat('/home') : url)
                    .then(function (response){

                        self.Nav(response.data.SubPage);
                        self.users = response.data.Users;
                        self.logged = response.data.UserData;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            }else{
                let hash = window.location.hash;
                let separate = hash.split("#");

                axios.get((this.info.mainPage === 'admin')? url.concat('/home') : url)
                    .then(function (response){

                        self.Nav(separate[1]);
                        self.users = null;
                        self.logged = response.data.UserData;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });


            }
        },

        Nav(to){
            this.info.subPage = to;
            window.location.hash = to;
            $(document).prop('title', this.jsUcfirst(this.info.mainPage)+ ' | ' + to);
        },


        // Makes first character upper case.
        jsUcfirst(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        },


        // =========================================================================
        // SIDEBAR LEFT NICESCROLL
        // =========================================================================
        handleSidebarScroll: function () {
            // Optimalisation: Store the references outside the event handler:
            function checkHeightSidebar() {
                // Check if there is class page-sidebar-fixed
                if($('.page-sidebar-fixed').length){
                    // Setting dinamic height sidebar menu
                    let heightSidebarLeft       = $(window).outerHeight() - $('#header').outerHeight() - $('.sidebar-footer').outerHeight() - $('.sidebar-content').outerHeight();

                    $('#sidebar-left .sidebar-menu').height(heightSidebarLeft)
                        .niceScroll({
                            cursorwidth: '10px',
                            cursorborder: '0px',
                            railalign: 'left'
                        });
                }

                let heightSidebarRight      = $(window).outerHeight() - $('#sidebar-right .panel-heading').outerHeight(),
                    heightSidebarRightChat  = $(window).outerHeight() - $('#sidebar-right .panel-heading').outerHeight() - $('#sidebar-chat .form-horizontal').outerHeight();

                // Sidebar right profile
                $('#sidebar-profile .sidebar-menu').height(heightSidebarRight)
                    .niceScroll({
                        cursorwidth: '10px',
                        cursorborder: '0px'
                    });

                // Sidebar right layout
                $('#sidebar-layout .sidebar-menu').height(heightSidebarRight)
                    .niceScroll({
                        cursorwidth: '10px',
                        cursorborder: '0px'
                    });

                // Sidebar right setting
                $('#sidebar-setting .sidebar-menu').height(heightSidebarRight)
                    .niceScroll({
                        cursorwidth: '10px',
                        cursorborder: '0px'
                    });

                // Sidebar right chat
                $('#sidebar-chat .sidebar-menu').height(heightSidebarRightChat)
                    .niceScroll({
                        cursorwidth: '10px',
                        cursorborder: '0px'
                    });

            }
            // Execute on load
            checkHeightSidebar();
            // Bind event listener
            $(window).resize(checkHeightSidebar);
        },

        // =========================================================================
        // IE SUPPORT
        // =========================================================================
        handleIE: function () {
            // IE mode
            let isIE8 = false;
            let isIE9 = false;
            let isIE10 = false;

            // initializes main settings for IE
            isIE8 = !! navigator.userAgent.match(/MSIE 8.0/);
            isIE9 = !! navigator.userAgent.match(/MSIE 9.0/);
            isIE10 = !! navigator.userAgent.match(/MSIE 10.0/);

            if (isIE10) {
                $('html').addClass('ie10'); // detect IE10 version
            }

            if (isIE10 || isIE9 || isIE8) {
                $('html').addClass('ie'); // detect IE8, IE9, IE10 version
            }

            // Fix input placeholder issue for IE8 and IE9
            if (isIE8 || isIE9) { // ie8 & ie9
                // this is html5 placeholder fix for inputs, inputs with placeholder-no-fix class will be skipped(e.g: we need this for password fields)
                $('input[placeholder]:not(.placeholder-no-fix), textarea[placeholder]:not(.placeholder-no-fix)').each(function () {
                    let input = $(this);

                    if (input.val() == '' && input.attr("placeholder") != '') {
                        input.addClass("placeholder").val(input.attr('placeholder'));
                    }

                    input.focus(function () {
                        if (input.val() == input.attr('placeholder')) {
                            input.val('');
                        }
                    });

                    input.blur(function () {
                        if (input.val() == '' || input.val() == input.attr('placeholder')) {
                            input.val(input.attr('placeholder'));
                        }
                    });
                });
            }
        },

        // =========================================================================
        // SET UP BASE URL
        // =========================================================================
        handleBaseURL: function () {
            let getUrl = window.location,
                baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
            return baseUrl;
        },

        // =========================================================================
        // BACK TOP
        // =========================================================================
        handleBackToTop: function () {
            $('#back-top').hide();
            $(window).scroll(function () {
                if ($(this).scrollTop() > 100) {
                    $('#back-top').addClass('show animated pulse');
                } else {
                    $('#back-top').removeClass('show animated pulse');
                }
            });
            // scroll body to 0px on click
            $('#back-top').click(function () {
                // Add sound
                $('body,html').animate({
                    scrollTop: 0
                }, 800);
                return false;
            });
        },

        // =========================================================================
        // TOOLTIP
        // =========================================================================
        handleTooltip: function () {
            if($('[data-toggle=tooltip]').length){
                $('[data-toggle=tooltip]').tooltip({
                    animation: 'fade'
                });
            }
            if($('.tooltips').length){
                $('.tooltips').tooltip({
                    animation: 'fade'
                });
            }
        },
        // =========================================================================
        // MESSAGES NICESCROLL
        // =========================================================================
        handleNavbarScroll: function () {
            if($('.navbar-message .niceScroll').length){
                $('.navbar-message .niceScroll').niceScroll({
                    cursorwidth: '10px',
                    cursorborder: '0px'
                });
            }

            // =========================================================================
            // NOTIFICATION NICESCROLL
            // =========================================================================
            if($('.navbar-notification .niceScroll').length){
                $('.navbar-notification .niceScroll').niceScroll({
                    cursorwidth: '10px',
                    cursorborder: '0px'
                });
            }
        },




    }
});
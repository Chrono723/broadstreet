require('../app');

import PublicPages from '../components/hud/PublicPages.vue';
import navTop from '../components/hud/navTop.vue';

let app = new Vue({
    name: 'App',
    el: '#app',
    components: {
        navTop,
        PublicPages,
    },

    data: {
        ui:{
            userMenu: false,
        },
        location:{
            current:{
                main:null,
                sub:null,
                target:null,
            },
        },
        info: ((typeof jsPass !== 'undefined') ? jsPass : {
            'page': null,
            'user': null,
        })
    },
    mounted(){

        let $window, $document, $body;
        let self = this;

        $window = $(window);
        $document = $(document);
        $body = $("body");

        if (window.location.hash === ''){
            window.location.hash = '#home';
        }else{
            self.setLocation();
        }
        $(window).on('hashchange', function() {
            self.setLocation();
        });
        if (typeof smoothScroll === "object") {
            smoothScroll.init();
        }

        $window.scroll(function(event) {
            let logo = $('#HeaderLogo');
            if (logo.visible(true)) {
                logo.css('opacity', 1);
                logo.addClass("fadeInLeftBig");
                logo.css('opacity', 0);
            }
        });

        /*==============================================
         Pre loader init
         ===============================================*/
        $window.on("load", function () {
            $body.imagesLoaded(function () {
                $(".tb-preloader-wave").fadeOut();
                $("#tb-preloader").delay(200).fadeOut("slow").remove();
            });
        });
    },
    methods: {
        //Hud Controls
        logout(){document.getElementById('logout-form').submit();},
        closeMenu(){this.ui.userMenu = false},
        LoginUser(user){
            this.info.user = user;
            window.location.hash = '#home';
        },
        getPage(page, id){
          switch(page){
              case'single-product':
                  window.location.hash = '#product/' + id;
                  break;
          }
        },
        findAndLoad(){
            for(let i = 0; i < this.$children.length; i++){
                switch(this.$children[i].id){
                    case'home':
                    case'login':
                        this.$children[i].isLoading = true;
                        break;
                }
            }
        },
        setLocation(){
            let self = this;
            let hash = window.location.hash.split('#')[1];

            self.location.current.main = hash.split('/')[0];
            self.location.current.sub = hash.split('/')[1];
            self.location.current.target = hash.split('/')[2];

            if(self.location.current.sub !== undefined){
                $(document).prop('title', 'Broad Street Pizza | ' + this.jsUcfirst(self.location.current.main) + ' | ' + this.jsUcfirst(self.location.current.sub));
            }else{
                $(document).prop('title', 'Broad Street Pizza | ' + this.jsUcfirst(self.location.current.main));
            }
        },
        jsUcfirst(text) {
            return String(text).charAt(0).toUpperCase() + String(text).slice(1);
        },

    }
});
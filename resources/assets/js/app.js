
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

require('../../../node_modules/jquery.nicescroll/jquery.nicescroll.js');
require('../../../node_modules/floatthead/src/jquery.floatThead.js');
require('../../../node_modules/jquery-sticky/jquery.sticky');
require('../../../node_modules/sticky-kit/dist/sticky-kit.min');
require('malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min');
require('jquery.easing/jquery.easing.min');
require('bootbox/bootbox.min');
require('gritter/js/jquery.gritter.min');
require('floatthead/src/jquery.floatThead');
require('jquery-countto/jquery.countTo');
require('jquery.countdown/jquery.countdown');
require('jquery-parallax.js/parallax.min');
require('flexslider/jquery.flexslider-min');
require('isotope-layout/dist/isotope.pkgd.min');
require('../../../node_modules/imagesloaded/imagesloaded.pkgd');
require('magnific-popup/dist/jquery.magnific-popup.min');
//require('owl.carousel/dist/owl.carousel.min');
require('smooth-scroll/dist/js/smooth-scroll.min');
require('bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min');
require('jquery-sticky/jquery.sticky');
window.DropZone = require('../../../node_modules/dropzone/dist/dropzone');
Vue.component('overlord_container', require('./components/overlord_container.vue'));
Vue.component('public-pages', require('./components/hud/PublicPages.vue'));

<template>
    <div>
        <!-- Home Page -->
        <transition name="fade">
            <home v-if="info.current.main === 'home'" :info="info" ref="HomePage">

            </home>
        </transition>

        <!-- LogIn | Registration Page -->
        <transition name="fade">
            <log-in v-if="info.current.main ==='login'"
                    v-on:login="sendLogin"
            >
            </log-in>
        </transition>

        <!-- News Page -->
        <transition name="fade">
            <news v-if="info.current.main === 'news'"></news>
        </transition>

        <!-- Contact Us Page -->
        <transition name="fade">
            <contact-us v-if="info.current.main === 'contact-us'"></contact-us>
        </transition>

        <!-- Services Page -->
        <transition name="fade">
            <services v-if="info.current.main === 'services'"
                      :sub-page="info.current.sub"
                      :section="info.current.target">
            </services>
        </transition>

        <!-- Products Page -->
        <transition name="fade">
            <products v-if="info.current.main === 'products'"
                      :page-location="info.current.main"
                      :sub-page="info.current.sub"
                      :is-rated="false"
                      @getPage="changePage"
            >
            </products>
        </transition>

        <!-- Company Page -->
        <transition name="fade">
            <company v-if="info.current.main === 'company'"></company>
        </transition>

        <!-- History Page -->
        <transition name="fade">
            <history v-if="info.current.main === 'history'"></history>
        </transition>

        <!-- Certifications Page -->
        <transition name="fade">
            <certifications v-if="info.current.main === 'certifications'"></certifications>
        </transition>

        <!-- Single Product Page -->
        <transition name="fade">
            <single-product v-if="info.current.main === 'product'" :product-id="info.current.sub"></single-product>
        </transition>

        <!-- FAQ Page -->
        <transition name="fade">
            <faq v-if="info.current.main === 'faq'"></faq>
        </transition>

        <!-- Terms & conditions Page -->
        <transition name="fade">
            <terms-conditions v-if="info.current.main === 'terms-conditions'"></terms-conditions>
        </transition>

    </div>
</template>
<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .3s
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0
    }
</style>

<script>
    import Home from '../public/Home.vue';
    import LogIn from '../public/LogIn.vue';

    import News from '../public/News.vue';
    import contactUs from '../public/ContactUs.vue';
    import Services from '../public/Services.vue';
    import Products from '../public/Products.vue';
    import Company from '../public/Company.vue';
    import History from '../public/History.vue';
    import Certifications from '../public/Certifications.vue'
    import SingleProduct from '../public/ProductSinglePage.vue';

    import LegalStatements from '../public/LegalStatements.vue';
    import Policies from '../public/Policies.vue';
    import TermsConditions from '../public/TermsConditions.vue';


    import Faq from '../public/Faq.vue';
    import Terms from '../public/Terms.vue';

    export default{
        props:['info'],
        components:{
            Home,
            LogIn,

            News,
            contactUs,
            Services,
            Products,
            Company,
            History,
            Certifications,
            SingleProduct,
            Faq,
            TermsConditions,
            Policies,
            LegalStatements
        },
        computed: {


        },

        data(){
            return {
                fetchProductId: 1,


            };
        },
        mounted(){

        },
        methods: {

            sendLogin(user){
                this.$parent.LoginUser(user);
            },
            changePage(id){
                console.log('changing page: ' + id);
                this.fetchProductId = id;
                this.$parent.getPage('single-product', id);
               // this.$emit('fetchPage', 'single-product', id)
            }



        }

    }
</script>
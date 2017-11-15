<template>
    <div>
        <home v-if="subPage === 'home'"></home>

        <general v-if="subPage === 'settings-general'"></general>
        <advanced v-if="subPage === 'settings-advanced'"></advanced>
        <page-status v-if="subPage === 'settings-pagestatus'"></page-status>

        <products v-if="subPage === 'products-all'"></products>
        <product-accessories v-if="subPage === 'products-accessories'"></product-accessories>
        <product-analyzers v-if="subPage === 'products-analyzers'"></product-analyzers>
        <product-chromatographs v-if="subPage === 'products-chromatographs'"></product-chromatographs>
        <product-detectors v-if="subPage === 'products-detectors'"></product-detectors>
        <product-quotes v-if="subPage === 'products-quotes'"></product-quotes>
        <product-reviews v-if="subPage === 'products-reviews'"></product-reviews>
        <product-create v-if="subPage === 'products-create'"></product-create>

        <contact v-if="subPage === 'about-contacts'"></contact>
        <faq v-if="subPage === 'about-faq'"></faq>
        <terms v-if="subPage === 'about-terms'"></terms>
        <policies v-if="subPage === 'about-policy'"></policies>
        <legal-statements v-if="subPage === 'about-legal'"></legal-statements>
        <history v-if="subPage === 'about-history'"></history>
        <certifications v-if="subPage === 'about-certifications'"></certifications>

        <header-info v-if="subPage === 'header-general'"></header-info>
        <header-keywords v-if="subPage === 'header-keywords'"></header-keywords>
        <header-viewport v-if="subPage === 'header-viewport'"></header-viewport>

        <news v-if="subPage === 'news-main'"></news>
        <news-create v-if="subPage == 'news-create'"></news-create>

        <sound-cloud v-if="subPage === 'social-soundcloud'"></sound-cloud>
        <you-tube v-if="subPage === 'social-youtube'"></you-tube>
        <facebook v-if="subPage === 'social-facebook'"></facebook>
        <twitter v-if="subPage === 'social-twitter'"></twitter>
        <google v-if="subPage === 'social-google'"></google>

        <users v-if="subPage === 'users'"></users>

    </div>
</template>

<script>


    import advanced from '../pages/Advanced.vue';
    import general from '../pages/General.vue';
    import pageStatus from '../pages/PageStatus.vue';

    import contact from '../pages/Contact.vue';
    import faq from '../pages/Faq.vue';
    import terms from '../pages/Terms.vue';
    import legalStatements from '../pages/LegalStatements.vue';
    import history from '../pages/History.vue';
    import policies from '../pages/Policies.vue'
    import certifications from '../pages/Certifications.vue';

    import headerInfo from '../pages/HeaderInfo.vue';
    import headerKeywords from '../pages/HeaderKeywords.vue';
    import headerViewport from '../pages/HeaderViewport.vue';

    import news from '../pages/News.vue';
    import newsCreate from '../pages/NewsCreate.vue';

    import products from '../pages/Products.vue';
    import productAccessories from '../pages/ProductAccessories.vue';
    import productDetectors from '../pages/ProductDetectors.vue';
    import productChromatographs from '../pages/ProductChromatographs.vue';
    import productAnalyzers from '../pages/ProductAnalyzers.vue';
    import productCreate from '../pages/ProductCreate.vue';
    import productQuotes from '../pages/ProductQuotes.vue';
    import productReviews from '../pages/ProductReviews.vue';

    import users from '../pages/Users.vue';

    import youTube from '../pages/YouTube.vue';
    import soundCloud from '../pages/SoundCloud.vue';
    import google from '../pages/Google.vue';
    import twitter from '../pages/Twitter.vue';
    import facebook from '../pages/Facebook.vue';

    import home from '../pages/Home.vue';

    export default{
        props:['sub-page', 'location-page', 'main-page'],
        data(){
            return{

            }
        },
        components:{
            home,
            advanced, pageStatus, general,
            faq, contact, terms, legalStatements, history, policies, certifications,
            headerInfo, headerKeywords, headerViewport,
            news, newsCreate,
            products, productAccessories, productDetectors, productAnalyzers,
            productChromatographs, productReviews, productCreate, productQuotes,
            soundCloud, youTube, google, twitter, facebook,
            users,
        }
    }
</script>

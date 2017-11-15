<template>
    <div>
        <home v-if="subPage === 'Home'"></home>
    </div>
</template>
<style>

</style>
<script>
    import Home from '../pages/home.vue'
    export default{
        props:['sub-page', 'location-page', 'main-page', 'user-info'],
        data(){
            return{

            }
        },
        components:{
            Home
        }
    }
</script>

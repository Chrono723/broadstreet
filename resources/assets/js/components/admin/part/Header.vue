<template>

    <div class="header-content">
        <h2>
            <i class="fa fa-home"></i>
            {{main}}
            <span>{{sub}}</span>
        </h2>
        <div class="breadcrumb-wrapper hidden-xs">
            <span class="label">You are here:</span>
            <ol class="breadcrumb">
                <li class="active">{{location}}</li>
            </ol>
        </div>
    </div>

</template>

<script>

    export default {
        props: [
            'main',
            'sub',
            'location'
        ],

        data(){
            return {


            };
        },
        mounted(){

        }
    }
</script>
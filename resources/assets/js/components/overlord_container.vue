<template>
    <div class="page-content Overlord-Panel"
         v-bind:class="{ 'Panel-Color-Primary': isPrimary, 'Panel-Color-Transparent': isTransparent, 'Panel-Color-Gradient': isGradient }">
        <div v-if="top === true" class="menu-header OverlordBevel"></div>
        <div class="Overlord-text">
            <div class="container">
                <slot></slot>
            </div>
        </div>
        <div v-if="bottom === true" class="menu-header OverlordBevel"></div>
    </div>
</template>
<script>

    export default {
        props: [
            'data_top',
            'data_bottom',
            'background-color'
        ],

        data(){
            return {
                top: false,
                bottom: false,
                isPrimary: false,
                isGradient: false,
                isTransparent: false,
            };
        },
        computed:{
            panelColor: function(){
                switch(this.backgroundColor){
                    case'transparent':
                        this.isTransparent = true;
                        break;
                    case'gradient':
                        this.isGradient = true;
                        break;
                    case'primary':
                        this.isPrimary = true;
                        break;
                    default:
                        this.isPrimary = true;
                        break;
                }
            }
        },
        mounted(){
            if (this.data_top === 'true'){this.top = true;}
            if (this.data_top === 'false'){this.top = false;}
            if (this.data_bottom === 'true'){this.bottom = true;}
            if (this.data_bottom === 'false'){this.bottom = false;}
            switch(this.backgroundColor){
                case'transparent':
                    this.isTransparent = true;
                    break;
                case'gradient':
                    this.isGradient = true;
                    break;
                case'primary':
                    this.isPrimary = true;
                    break;
                default:
                    this.isPrimary = true;
                    break;
            }
        }
    }
</script>
<template>
    <div>
        <div class="OverlordBevel Bevel-h20"></div>
        <div class="panel-interface OverLord-Shadow-Main">

            <!-- Menu Interface -->
            <div v-if="isControls === true" class="menu-interface">
                <div class="menu-header">
                    <transition name="fade" mode="out-in">
                        <div class="menu-title OverLord-Shadow-Main" key="3" v-if="titleVisible">Options</div>
                    </transition>

                    <div class="button-container">
                        <div @click="collapseContent" @mouseover="buttonHover(true)" @mouseleave="buttonHover(false)" v-bind:class="{hover: btnHover}" class="button OverLord-Shadow-Main">
                            <i class="fa fa-bars"></i>
                        </div>
                    </div>

                </div>

                <!-- Expanded Options -->
                <transition name="fade" mode="out-in">
                    <div class="menu-body" key="4" v-if="menuVisible">
                        <div class="option-panel OverLord-Shadow-Main">
                            <slot name="options-expanded"></slot>
                        </div>
                    </div>
                </transition>

                <!-- Collapsed Options -->
                <transition name="fade" mode="out-in">
                    <div class="menu-body" key="5" v-if="menuSmallVisible">
                        <div class="option-panel-small OverLord-Shadow-Main">
                            <slot name="options-minimized"></slot>
                        </div>
                    </div>
                </transition>


            </div>
            <div class="panel-content" :style="'height: ' + computedHeight + ' !important;'">
                <slot name="content"></slot>
            </div>

        </div>
    </div>
</template>
<style>
    .fade-enter-active, .fade-leave-active {  transition: opacity 1s  }
</style>
<script>

    export default{
        props: {
            isControls:{
                'default': true,
            },
            setHeight:{
                'default': '100%',
            }

        },
        data(){
            return{
                titleVisible: true,
                menuVisible: true,
                btnHover: false,
                menuSmallVisible: false,
            }
        },
        computed:{
            computedHeight:function(){
                if (this.setHeight === '100%'){
                    return this.setHeight;
                }else{
                    return this.setHeight + 'px ';
                }
            }

        },
        methods:{
            collapseContent(){
                let self = this;
                if (self.titleVisible === true){
                    self.titleVisible = false;
                    self.menuVisible = false;
                    $('.menu-interface').delay(1000).animate({width: "50px", minWidth:'50px'},300);
                    self.menuSmallVisible = true;
                    return;
                }

                if (self.titleVisible === false){
                    self.menuSmallVisible = false;
                    $('.menu-interface').delay(500).animate({width: "248px", minWidth:'248px'},300, function(){
                        self.titleVisible = true;
                        self.menuVisible = true;
                    });
                }
            },
            buttonHover(hovered){
                if (hovered === true){this.btnHover = true}
                if (hovered === false){this.btnHover = false}
            }
        }
    }
</script>

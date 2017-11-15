<template>
    <div class="modal-back animated fadeIn">
        <div class="modal-panel" @click="exit($event)">
            <div class="modalContent OverLord-Shadow-Main" id="menu_content">
                <div class="OverlordBevel Bevel-h20"></div>
                <!-- Title -->
                <div class="modal-title OverLord-Shadow-Main OL-White-Title">
                    <div class="title-text  OverLord-Shadow-Main">
                        <span class="span-title-text OL-White-Title">Title</span>
                    </div>
                    <div class="title-information">
                        <span class="name Crackin-White-Title" v-text="selected.information.name"></span>
                    </div>

                    <a class="modal-exit" @click="closeModal"><i class="fa fa-times"></i></a>
                </div>
                <!-- Body -->
                <div class="modal-body mCustomScrollbar">

                    <div class="modal-body-content">
                        <div class="top-panel">
                            <!-- Beat Controls -->
                            <div class="beat-controls OverLord-Shadow-Main Ol-Panel-Dark-Cyan-Dotted">
                                <div class="options">
                                    <a href="javascript:void(0)" @click="section = 'home'" class="btn rounded"><i class="fa fa-pencil"></i></a>
                                    <a href="javascript:void(0)" class="btn btn rounded"><i class="fa fa-times"></i></a>
                                    <a href="javascript:void(0)" class="btn rounded"><i class="fa fa-home"></i></a>
                                    <a href="javascript:void(0)" class="btn rounded"><i class="fa fa-times"></i></a>
                                    <a href="javascript:void(0)" class="text-btn rounded">LICENSES</a>
                                    <a href="javascript:void(0)" class="text-btn rounded">PLAYLIST</a>
                                    <a href="javascript:void(0)" class="text-btn rounded">COMMENTS</a>
                                    <a href="javascript:void(0)" class="text-btn rounded">ORDERS</a>

                                </div>

                            </div>

                            <!-- Beat Cover -->
                            <div  v-if="selected.information.name !== null" class="beat-cover OverLord-Shadow-Main">
                                <img class="cover-img" :src="'../resources/assets/beats/' + selected.information.name + '/cover/cover.png'">
                            </div>

                            <!-- Beat Information -->
                            <div class="information-board">

                                <!-- Status Board -->
                                <div class="record-status">

                                    <!-- Is Enabled -->
                                    <div class="is-enabled">
                                        <div v-if="selected.information.is_enabled === 1" class="bool-true">
                                            <div class="modal-form-title">Enabled</div><img src="images/icons/accept.png"> True
                                        </div>

                                        <div v-if="selected.information.is_enabled === 0" class="bool-false">
                                            <div class="modal-form-title">Enabled</div><img src="images/icons/error.png"> False
                                        </div>
                                    </div>

                                    <!-- Is High Quality -->
                                    <div class="is-high-quality">
                                        <div v-if="selected.information.is_high_quality === 1" class="bool-true">
                                            <div class="modal-form-title">High Quality</div><img src="images/icons/accept.png"> True
                                        </div>

                                        <div v-if="selected.information.is_high_quality === 0" class="bool-false">
                                            <div class="modal-form-title">High Quality</div><img src="images/icons/error.png"> False
                                        </div>
                                    </div>

                                </div>

                                <!-- Record Dates -->
                                <div class="record-options OverLord-Shadow-Main Ol-Panel-Dark-Cyan-Dotted">
                                    <div class="option1">
                                        <div class="modal-form-title">
                                            ~Created~
                                        </div>
                                        {{selected.information.created_at}}
                                    </div>
                                    <div class="option2">
                                        <div class="modal-form-title">
                                            ~Updated~
                                        </div>
                                        {{selected.information.updated_at}}
                                    </div>

                                </div>

                                <!-- Record Rates -->
                                <div class="record-options OverLord-Shadow-Main Ol-Panel-Dark-Cyan-Dotted">
                                    <div class="option1">
                                        <div class="modal-form-title">
                                            Sample Rate
                                        </div>
                                        {{selected.information.sample_rate}}
                                    </div>
                                    <div class="option2">
                                        <div class="modal-form-title">
                                            Bit Rate
                                        </div>
                                        {{selected.information.bit_rate}}
                                    </div>

                                </div>
                                <!-- Information Panel -->
                                <div class="information-panel OverLord-Shadow-Main Ol-Panel-Dark-Cyan-Dotted">
                                    <div class="information-panel-row">
                                        <div class="information-panel-item">
                                            <span class="item-title">Artist:</span> {{selected.information.artist}}
                                        </div>
                                        <div class="information-panel-item">
                                            <span class="item-title">Type:</span> {{selected.information.type}}
                                        </div>

                                    </div>
                                    <hr class="hrDesign"/>
                                    <div class="information-panel-row">
                                        <div class="information-panel-item">
                                            <span class="item-title">Genre:</span> {{selected.information.genre}}
                                        </div>
                                        <div class="information-panel-item">
                                            <span class="item-title">Sub Genre:</span> {{selected.information.sub_genre}}
                                        </div>
                                    </div>

                                </div>



                            </div>

                            <!-- Small Music Player -->
                            <small-music-player v-if="selected.information.name !== null" :beat="selected"></small-music-player>

                            <!-- Description Bar -->
                            <div class="modal-description OverLord-Shadow-Main Ol-Panel-Dark-Cyan-Dotted Crackin-White-Title">
                               <marquee>{{selected.information.description}}</marquee>

                            </div>

                            <!-- Ticker Board -->
                            <div class="ticker-board">
                                <div class="ticker-left">
                                    <span class="item-title"> Views: </span>{{selected.information.views}}
                                </div>

                                <div class="ticker-right">
                                    <span class="item-title">Downloads: </span> {{selected.information.downloads}}
                                </div>

                            </div>
                        </div>

                        <BeatHome v-if="section === 'home'" :data-beats="selected.information"></BeatHome>
                        <BeatComments  v-if="section === 'comments'" :data-comments="'No Route Yet'"></BeatComments>
                        <BeatLicenses   v-if="section === 'licenses'" :data-licenses="'No Route Yet'"></BeatLicenses>
                        <BeatOrders  v-if="section === 'orders'" :data-orders="'No Route Yet'"></BeatOrders>
                        <BeatPlaylist  v-if="section === 'playlist'" :data-playlist="selected.playlist"></BeatPlaylist>


                    </div>

                </div>
                <div class="OverlordBevel Bevel-h20"></div>


            </div>

        </div>
    </div>
</template>
<style>

</style>
<script>
    import BeatComments from '../modal/beat/BeatComments.vue';
    import BeatHome from '../modal/beat/BeatHome.vue';
    import BeatLicenses from '../modal/beat/BeatLicenses.vue';
    import BeatOrders from '../modal/beat/BeatOrders.vue';
    import BeatPlaylist from '../modal/beat/BeatPlaylist.vue';

    import SmallMusicPlayer from '../musicPlayer/SmallMusicPlayer.vue';


    export default{
        props:['main-page', 'main-category', 'id-number'],
        data(){
            return{
                subPage: null,
                beats: null,
                selected: {information:{name:null,cover_art:null,description:null,}},
                section: null,
            }
        },
        components:{
            BeatComments,
            BeatHome,
            BeatLicenses,
            BeatOrders,
            BeatPlaylist,
            SmallMusicPlayer
        },
        created(){

        },
        mounted(){
            this.getRecord();
            $(".modal-body").mCustomScrollbar({live:true, theme:"light-thick"});
        },
        methods:{
            getRecord(){
                if(this.idNumber !== null || undefined){
                    let self = this;
                    axios.get(this.mainPage +'/'+ this.mainCategory +'/' + this.idNumber)
                        .then(function (response){
                            self.beats = response.data['Beats'];
                            self.selected = response.data['selected'];
                            self.subPage = response.data['SubPage'];
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                }


            },
            exit(evt){
                if(evt.target.id == "menu_content"){return;}
                //For descendants of menu_content being clicked, remove this check if you do not want to put constraint on descendants.
                if($(evt.target).closest('#menu_content').length){return;}
                this.closeModal();
            },
            closeModal(){
                self = this;
                for(let i = 0; i < self.$children.length; i++){
                    if (this.$children[i].id === 'music-player'){
                        this.$children[i].audio.pause();
                    }
                }
                this.$emit('close')
            }
        }
    }
</script>

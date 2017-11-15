<template>
    <div class="modal-page">
        <div class="OverlordBevel Bevel-h20"></div>
        <div class="modal-page-container">
            <modal-title :title-name="'Edit Beat'"></modal-title>
            <modal-content>
                <div v-if="formStatus.length !== 0" slot="errors" class="modal-errors">
                    <status-panel :form-status="formStatus"></status-panel>
                </div>
                <div slot="content" class="modal-page-inner">
                    <div class="form-left">
                        <div class="beat-form">

                            <!-- Name -->
                            <label for="beatName">Beat Name</label>
                            <span class="errors">{{form.beatName.error}}</span>
                            <input id="beatName" type="text" class="Overlord-TextBox form-text-box" title="Beat Name" name="beatName"
                                   :class="{OverlordFailedBorder: form.beatName.alerts.failed, OverlordSuccessBorder: form.beatName.alerts.success}"
                                   v-model="form.beatName.text"
                                   :placeholder="form.beatName.data"
                                   @blur="validate('beatName')"
                            >

                            <!-- Select Box Pairs -->
                            <div class="check-box-form">
                                <div class="select-box-left">
                                    <!-- Is Enabled -->
                                    <input id="isEnabled" type="checkbox" v-model="form.beatIsEnabled.data">
                                    <label for="isEnabled">Enabled?</label>
                                </div>

                                <div class="select-box-right">
                                    <!-- Is High Quality -->
                                    <input id="isHighQuality" type="checkbox" v-model="form.beatIsHighQuality.data">
                                    <label for="isHighQuality">High Quality</label>
                                </div>
                            </div>

                            <!-- Artist -->
                            <label for="beatName">Artist</label>
                            <span class="errors">{{form.beatArtist.error}}</span>
                            <input id="beatArtist" type="text" class="Overlord-TextBox form-text-box" title="Artist" name="beatArtist"
                                   :class="{OverlordFailedBorder: form.beatArtist.alerts.failed, OverlordSuccessBorder: form.beatArtist.alerts.success}"
                                   v-model="form.beatArtist.text"
                                   :placeholder="form.beatArtist.data"
                                   @blur="validate('beatArtist')"
                            >

                            <!-- Description -->
                            <label for="beatDescription">Description</label>
                            <textarea id="beatDescription" class="Overlord-TextBox form-text-box"
                                      :class="{OverlordFailedBorder: form.beatDescription.alerts.failed, OverlordSuccessBorder: form.beatDescription.alerts.success}"
                                      v-model="form.beatDescription.text"
                                      :placeholder="form.beatDescription.data"
                                      @blur="validate('beatDescription')"
                            ></textarea>

                            <!-- Type -->
                            <div  class="option-field">
                                <label for="type">Type</label>
                                <div v-for="option in form.beatType.options" class="single-option">
                                    <input id="type" type="radio" name="type"
                                           v-model="form.beatType.data"
                                           :value="option.name"
                                           :checked="option.checked"
                                    > {{option.name}}
                                </div>
                            </div>

                            <!-- Genre -->
                            <div  class="option-field">
                                <label for="genre">Genre</label>
                                <div v-for="option in form.beatGenre.options" class="single-option">
                                    <input id="genre" type="radio" name="genre"
                                           v-model="form.beatGenre.data"
                                           :value="option.name"
                                           :checked="option.checked"
                                    > {{option.name}}
                                </div>
                            </div>

                            <!-- Select Box Pairs -->
                            <div class="select-box-form">
                                <div class="select-box-left">
                                    <!-- Bit Rate -->
                                    <label for="bitRate">Bit Rate</label>
                                    <select id="bitRate" v-model="form.beatBitRate.data">
                                        <option disabled value="">Please select one</option>
                                        <option v-for="option in form.beatBitRate.options">{{option}}</option>
                                    </select>

                                </div>
                                <div class="select-box-right">
                                    <!-- Bit Rate -->
                                    <label for="sampleRate">Sample Rate</label>
                                    <select id="sampleRate" v-model="form.beatSampleRate.data">
                                        <option disabled value="">Please select one</option>
                                        <option v-for="option in form.beatSampleRate.options">{{option}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-right">
                        <drop-zone @StatusResponse="StatusUpdate"
                                :url="'admin/beats/' + dataBeats.id"
                                :main-form="form"
                                :request-method="'PUT'"
                                :param-name="'CoverArt'"
                                :accepted-files="'image/*'"
                                :dict-default-message="'Drop New Cover Art here'"
                                :thumbnail-height="300"
                                :thumbnail-width="300"
                        >

                        </drop-zone>

                    </div>
                    <div class="form-right">
                        <drop-zone
                                :url="'admin/beats/' + dataBeats.id"
                                :main-form="form"
                                :request-method="'PUT'"
                                :param-name="'Beat'"
                                :dict-default-message="'Drop Mp3 Sample Here'"
                                :thumbnail-height="300"
                                :thumbnail-width="300"
                        >

                        </drop-zone>
                    </div>

                </div>
            </modal-content>



        </div>
        <div class="OverlordBevel Bevel-h20"></div>
    </div>
</template>

<script>

    import ModalTitle from '../parts/ModalBodyTitle.vue';
    import ModalContent from '../parts/ModalBodyContent.vue';
    import DropZone from '../parts/DropZone.vue'
    import StatusPanel from '../parts/StatusPanel.vue';
    export default{
        props:['data-beats'],
        data(){
            return{
                formStatus: [],
                baseURL: null,
                csrfToken: document.head.querySelector('meta[name="csrf-token"]').content,
                csrfHeader: {
                    'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
                },
                form:{
                    // Text Form
                    beatName:{data:null, error:'Required', text:'', alerts:{neutral:true, success:false, failed:false,},},
                    beatArtist:{data:null, error:'Required', text:'', alerts:{neutral:true, success:false, failed:false,},},
                    beatDuration:{data:null, error:null, text:'', alerts:{neutral:true, success:false, failed:false,},},
                    beatDescription:{data:null, text:'', alerts:{neutral:true, success:false, failed:false,},},
                    beatSubGenre:{data:null, text:'', alerts:{neutral:true, success:false, failed:false,},},

                    // Boolean Options
                    beatIsEnabled:{data:null},
                    beatIsHighQuality:{data:null},

                    // FIle Upload
                    beatMp3:{data:null, error:'Required', alerts:{neutral:true, success:false, failed:false,},},
                    beatDemo:{data:null, error:'Required', file:null},
                    beatWav:{data:null, error:'Required', alerts:{neutral:true, success:false, failed:false,},},
                    beatCoverArt:{data:null, alerts:{neutral:true, success:false, failed:false,},},

                    // Select Box
                    beatGenre:{
                        data: null,
                        text: null,
                        options:[
                            {name: 'rnb', checked:''},
                            {name: 'trap', checked:''},
                            {name: 'hiphop', checked:''},
                            {name: 'jazz', checked:''},
                            {name: 'other', checked:''},
                            {name: 'rap', checked:''},
                        ]

                    },
                    beatType:{
                        data: null,
                        text: null,
                        options:[
                            {name:'sample', checked:''},
                            {name:'beat', checked:''},
                            {name:'vocals', checked:''},
                            {name:'full song', checked:''},
                            {name:'freeware', checked:''},
                            {name:'other', checked:''},
                        ],
                    },
                    beatBitRate:{
                        data:null,
                        options:[
                            '16',
                            '28',
                            '32'
                        ]
                    },
                    beatSampleRate:{
                        data:null,
                        options:[
                            '44',
                            '48'
                        ]
                    },
                },

            }
        },
        created(){

        },
        mounted(){
            this.baseURL = this.handleBaseURL();
            let self = this;

            self.form.beatName.data = self.dataBeats.name;
            self.form.beatArtist.data = self.dataBeats.artist;
            self.form.beatDuration.data = self.dataBeats.duration;
            self.form.beatIsEnabled.data = self.dataBeats.is_enabled;
            self.form.beatIsHighQuality.data = self.dataBeats.is_high_quality;
            self.form.beatDescription.data = self.dataBeats.description;
            self.form.beatSubGenre.data = self.dataBeats.sub_genre;
            self.form.beatMp3.data = self.dataBeats.mp3;
            self.form.beatDemo.data = self.dataBeats.demo;
            self.form.beatWav.data = self.dataBeats.wav;
            self.form.beatCoverArt.data = self.dataBeats.cover_art;

            self.form.beatGenre.data = self.dataBeats.genre;
            for (let i = 0; i < self.form.beatGenre.options.length; i++){
                if (self.form.beatGenre.options[i].name === self.dataBeats.genre){
                    self.form.beatGenre.options[i].checked = 'checked';
                }
            }

            self.form.beatType.data = self.dataBeats.type;
            for (let i = 0; i < self.form.beatType.options.length; i++){
                if (self.form.beatType.options[i].name === self.dataBeats.type){
                    self.form.beatType.options[i].checked = 'checked';
                }
            }

            self.form.beatBitRate.data = self.dataBeats.bit_rate;
            self.form.beatSampleRate.data = self.dataBeats.sample_rate;
        },
        components:{
            'modal-title': ModalTitle,
            'modal-content': ModalContent,
            'drop-zone': DropZone,
            'status-panel': StatusPanel,
        },
        methods:{
            validate(item){
                let data = null;
                self = this;
                switch(item){
                    case 'beatName':
                        data = this.form.beatName.text;
                        if(data === null || data === ''){
                            this.form.beatName.alerts.failed = false;
                            this.form.beatName.alerts.success = false;
                            this.form.beatName.error = 'Required';
                        }else{
                            axios.put('admin/beats/'+this.dataBeats.id,{
                                'beatName': data,
                            }).then(function(response){

                                // Checks for Successes
                                if(response['data']['status'] === 'success'){
                                    self.form.beatName.alerts.success = true;
                                    self.form.beatName.alerts.failed = false;
                                    self.form.beatName.error = 'Accepted'
                                }
                                for(let i = 0; i < response['data']['successes'].length; i++){
                                    if(response['data']['successes'][i]['name'] === 'Name'){
                                        self.formStatus.push(response['data']['successes'][i]);
                                        console.log(response['data']['successes'][i]['name'] + ': ' + response['data']['status']);
                                    }
                                }

                                // Checks for Warnings
                                for(let i = 0; i < response['data']['warnings'].length; i++){
                                    if(response['data']['warnings'][i]['name'] === 'Name'){
                                        self.formStatus.push(response['data']['warnings'][i]);
                                        console.log(response['data']['warnings'][i]['name'] + ': ' + response['data']['status']);
                                    }
                                }

                                // Checks for Errors
                                if(response['data']['status'] === 'failed'){
                                    self.form.beatName.alerts.success = false;
                                    self.form.beatName.alerts.failed = true;
                                    self.form.beatName.error = 'Failed'
                                }
                                for(let i = 0; i < response['data']['errors'].length; i++){
                                    if(response['data']['errors'][i]['name'] === 'Name'){
                                        self.formStatus.push(response['data']['errors'][i]);
                                        console.log(response['data']['errors'][i]['name'] + ': ' + response['data']['status']);
                                    }
                                }


                            });
                        }

                        break;
                    case 'beatDescription':
                        data = this.form.beatDescription.text;
                        if(data === null || data === ''){
                            this.form.beatDescription.alerts.failed = false;
                            this.form.beatDescription.alerts.success = false;
                            this.form.beatDescription.error = 'Required';
                        }else{
                            axios.put('admin/beats/'+this.dataBeats.id,{
                                'beatDescription': data,
                            }).then(function(response){

                                // Checks for Successes
                                if(response['data']['status'] === 'success'){
                                    self.form.beatDescription.alerts.success = true;
                                    self.form.beatDescription.alerts.failed = false;
                                    self.form.beatDescription.error = 'Accepted'
                                }
                                for(let i = 0; i < response['data']['successes'].length; i++){
                                    if(response['data']['successes'][i]['name'] === 'Description'){
                                        self.formStatus.push(response['data']['successes'][i]);
                                        console.log(response['data']['successes'][i]['name'] + ': ' + response['data']['status']);
                                    }
                                }

                                // Checks for Warnings
                                for(let i = 0; i < response['data']['warnings'].length; i++){
                                    if(response['data']['warnings'][i]['name'] === 'Description'){
                                        self.formStatus.push(response['data']['warnings'][i]);
                                        console.log(response['data']['warnings'][i]['name'] + ': ' + response['data']['status']);
                                    }
                                }

                                // Checks for Errors
                                if(response['data']['status'] === 'failed'){
                                    self.form.beatDescription.alerts.success = false;
                                    self.form.beatDescription.alerts.failed = true;
                                    self.form.beatDescription.error = 'Failed'
                                }
                                for(let i = 0; i < response['data']['errors'].length; i++){
                                    if(response['data']['errors'][i]['name'] === 'Description'){
                                        self.formStatus.push(response['data']['errors'][i]);
                                        console.log(response['data']['errors'][i]['name'] + ': ' + response['data']['status']);
                                    }
                                }
                            });
                        }

                        break;
                    case 'beatArtist':
                        data = this.form.beatArtist.text;
                        if(data === null || data === ''){
                            this.form.beatArtist.alerts.failed = false;
                            this.form.beatArtist.alerts.success = false;
                            this.form.beatArtist.error = 'Required';
                            break;
                        }else{
                            axios.put('admin/beats/'+this.dataBeats.id,{
                                'beatArtist': data,
                            }).then(function(response){

                                // Checks for Successes
                                if(response['data']['status'] === 'success'){
                                    self.form.beatArtist.alerts.success = true;
                                    self.form.beatArtist.alerts.failed = false;
                                    self.form.beatArtist.error = 'Accepted'
                                }
                                for(let i = 0; i < response['data']['successes'].length; i++){
                                    if(response['data']['successes'][i]['name'] === 'Artist'){
                                        self.formStatus.push(response['data']['successes'][i]);
                                        console.log(response['data']['successes'][i]['name'] + ': ' + response['data']['status']);
                                    }
                                }

                                // Checks for Warnings
                                for(let i = 0; i < response['data']['warnings'].length; i++){
                                    if(response['data']['warnings'][i]['name'] === 'Artist'){
                                        self.formStatus.push(response['data']['warnings'][i]);
                                        console.log(response['data']['warnings'][i]['name'] + ': ' + response['data']['status']);
                                    }
                                }

                                // Checks for Errors
                                if(response['data']['status'] === 'failed'){
                                    self.form.beatArtist.alerts.success = false;
                                    self.form.beatArtist.alerts.failed = true;
                                    self.form.beatArtist.error = 'Failed'
                                }
                                for(let i = 0; i < response['data']['errors'].length; i++){
                                    if(response['data']['errors'][i]['name'] === 'Artist'){
                                        self.formStatus.push(response['data']['errors'][i]);
                                        console.log(response['data']['errors'][i]['name'] + ': ' + response['data']['status']);
                                    }
                                }
                            });
                        }

                        break;
                }


            },
            handleBaseURL: function () {
                let getUrl = window.location;
                return getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname;
            },
            StatusUpdate(dataResponse){

                for(let i = 0; i < dataResponse.successes.length; i++){
                    this.formStatus.push(dataResponse.successes[i]);
                }
                for(let i = 0; i < dataResponse.errors.length; i++){
                    this.formStatus.push(dataResponse['errors'][i]);
                }
                for(let i = 0; i < dataResponse.warnings.length; i++){
                    this.formStatus.push(dataResponse['warnings'][i]);
                }


            }


        }
    }
</script>


<template>
    <div class="body-content animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <MainPanel>
                    <div slot="options-expanded">
                        These are Options
                    </div>
                    <MainContent :title="'General'" slot="content">
                        <div class="information-panel OverLord-Shadow-Main" slot="content">


                            <div class="information-panel-row  Ol-Panel-Dark-Cyan-Dotted OverLord-Shadow-Main">
                                <div class="panel-item">
                                    <div class="item-title">Author</div>
                                    <span class="data-item">{{info.author.data}}</span>
                                </div>
                                <div class="panel-item">
                                    <span class="item-title">Description</span>
                                    <span class="data-item">{{info.description.data}}</span>
                                </div>
                            </div>
                            <div class="information-panel-row">
                                <!-- Status Messages -->
                                <div v-if="formStatus.length !== 0" slot="errors" class="modal-errors">
                                    <status-panel :form-status="formStatus"></status-panel>
                                    <br>
                                    <br>
                                </div>

                                <!-- Author -->
                                <label for="headerAuthor">Author</label>
                                <span class="errors">{{info.author.controls.error}}</span>
                                <input id="headerAuthor" type="text" class="Overlord-TextBox form-text-box" title="headerAuthor" name="headerAuthor"
                                       :class="{OverlordFailedBorder: info.author.controls.failed, OverlordSuccessBorder: info.author.controls.success}"
                                       v-model="info.author.text"
                                       :placeholder="info.author.data"
                                       @blur="validate('headerAuthor')"
                                >

                                <!-- Description -->
                                <label for="headerDescription">Description</label>
                                <span class="errors">{{info.description.controls.error}}</span>
                                <textarea id="headerDescription" class="Overlord-TextBox form-text-box"
                                          :class="{OverlordFailedBorder: info.description.controls.failed, OverlordSuccessBorder: info.description.controls.success}"
                                          v-model="info.description.text"
                                          :placeholder="info.description.data"
                                          @blur="validate('headerDescription')"
                                ></textarea>

                                <div class="button-container">
                                    <button @click="formSubmit" class="form-submit-button Overlord-Button">Update Beat</button>
                                </div>
                            </div>

                        </div>
                    </MainContent>

                </MainPanel>

            </div>
        </div>

    </div>

</template>

<script>
    import MainPanel from '../part/ResponsiveMainPanel.vue';
    import MainTable from '../part/ResponsiveMainTable.vue';
    import MainContent from '../part/ResponsiveMainContent.vue';
    import StatusPanel from '../modal/parts/StatusPanel.vue';
    export default {
        props: [

        ],
        components:{
            'MainPanel': MainPanel,
            'MainTable': MainTable,
            'MainContent': MainContent,
            'status-panel': StatusPanel,
        },
        data(){
            return {
                location: {
                    main: 'Admin',
                    sub: 'Header',
                    location: 'Information'
                },
                info:{
                    author: {data:null, text: null, controls:{error:null}},
                    description: {data:null, text: null, controls:{error:null}},
                },
                formStatus: [],
            };
        },
        created(){
            let self = this;
            self.getInfo();
        },
        mounted(){

        },
        methods:{
            formSubmit(){
                let self = this;
                let data = {
                    'submit':true,
                    'HeaderInformationDescription': self.info.description.text,
                    'HeaderInformationAuthor': self.info.author.text,
                };
                axios.put('admin/header/home/'+ self.info.id.data, data)
                    .then(function(response){
                        // Checks for Successes
                        if(response['data']['status'] === 'success'){
                            console.log('Response: ' + response['data']['status']);
                        }
                        for(let i = 0; i < response['data']['successes'].length; i++){
                            self.formStatus.push(response['data']['successes'][i]);
                            console.log(response['data']['successes'][i]['name'] + ': ' + response['data']['status']);

                        }

                        // Checks for Warnings
                        for(let i = 0; i < response['data']['warnings'].length; i++){
                            self.formStatus.push(response['data']['warnings'][i]);
                            console.log(response['data']['warnings'][i]['name'] + ': ' + response['data']['status']);
                        }

                        // Checks for Errors
                        if(response['data']['status'] === 'failed'){
                            console.log('Response: ' + response['data']['status']);
                        }
                        for(let i = 0; i < response['data']['errors'].length; i++){
                            self.formStatus.push(response['data']['errors'][i]);
                            console.log(response['data']['errors'][i]['name'] + ': ' + response['data']['status']);

                        }
                    })
            },
            getInfo(){
                let self = this;
                axios.get('admin/header/home')
                    .then(function (response){
                        self.info = {
                            author: {
                                data: response.data[0].author,
                                text: '',
                                controls: {failed: false, success: false, error: 'required',}
                            },
                            description: {
                                data: response.data[0].description,
                                text: '',
                                controls: {failed: false, success: false, error: 'required',}
                            },
                            id:{
                                data: response.data[0].id
                            }
                        };
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            validate(item){
                let data = null;
                self = this;
                switch(item){
                    case 'headerAuthor':
                        data = this.info.author.text;
                        if(data === null || data === ''){
                            this.info.author.controls.failed = false;
                            this.info.author.controls.success = false;
                            this.info.author.controls.error = 'Required';
                        }else{
                            axios.put('admin/header/home/'+ this.info.id.data,{
                                'HeaderInformationAuthor': data,
                            }).then(function(response){
                                // Checks for Successes
                                if(response['data']['status'] === 'success'){
                                    self.info.author.controls.success = true;
                                    self.info.author.controls.failed = false;
                                    self.info.author.controls.error = 'Accepted'
                                }
                                for(let i = 0; i < response['data']['successes'].length; i++){
                                    if(response['data']['successes'][i]['name'] === 'Author'){
                                        self.formStatus.push(response['data']['successes'][i]);
                                        console.log(response['data']['successes'][i]['name'] + ': ' + response['data']['status']);
                                    }
                                }
                                // Checks for Warnings
                                for(let i = 0; i < response['data']['warnings'].length; i++){
                                    if(response['data']['warnings'][i]['name'] === 'Author'){
                                        self.formStatus.push(response['data']['warnings'][i]);
                                        console.log(response['data']['warnings'][i]['name'] + ': ' + response['data']['status']);
                                    }
                                }
                                // Checks for Errors
                                if(response['data']['status'] === 'failed'){
                                    self.info.author.controls.success = false;
                                    self.info.author.controls.failed = true;
                                    self.info.author.controls.error = 'Failed'
                                }
                                for(let i = 0; i < response['data']['errors'].length; i++){
                                    if(response['data']['errors'][i]['name'] === 'Author'){
                                        self.formStatus.push(response['data']['errors'][i]);
                                        console.log(response['data']['errors'][i]['name'] + ': ' + response['data']['status']);
                                    }
                                }
                            })
                        }
                        break;
                    case 'headerDescription':
                        data = this.info.description.text;
                        if(data === null || data === ''){
                            this.info.description.controls.failed = false;
                            this.info.description.controls.success = false;
                            this.info.description.controls.error = 'Required';
                        }else{
                            axios.put('admin/header/home/'+ this.info.id.data,{
                                'HeaderInformationDescription': data,
                            }).then(function(response){
                                // Checks for Successes
                                if(response['data']['status'] === 'success'){
                                    self.info.description.controls.success = true;
                                    self.info.description.controls.failed = false;
                                    self.info.description.controls.error = 'Accepted'
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
                                    self.info.description.controls.success = false;
                                    self.info.description.controls.failed = true;
                                    self.info.description.controls.error = 'Failed'
                                }
                                for(let i = 0; i < response['data']['errors'].length; i++){
                                    if(response['data']['errors'][i]['name'] === 'Description'){
                                        self.formStatus.push(response['data']['errors'][i]);
                                        console.log(response['data']['errors'][i]['name'] + ': ' + response['data']['status']);
                                    }
                                }
                            })
                        }
                        break;
                }

            }
        }
    }
</script>
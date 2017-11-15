<template>
    <div class="body-content animated fadeIn">
        <tab-content :number-tabs="5">
            <span slot="slot_button_0">Home</span>
            <div slot="slot_body_0">
                <!-- Home Pages-->
                <div class="row">
                    <div class="col-md-12">
                        <MainPanel :is-controls="false">
                            <MainContent :title="'Home Pages'" slot="content">
                                <div slot="content" class="module-description">
                                    These represent the Home page. Taking these down makes them inaccessible.
                                </div>
                                <div slot="content">
                                    <MainTable v-if="pages !== null">
                                        <tr slot="header" class="table-header OverLord-Shadow-Main">
                                            <th class="icon_row">Method</th><th>URI</th><th>Status</th><th>Name</th><th>Description</th><th>Action</th><th class="last_icon">Created At</th>
                                        </tr>
                                        <tr slot="row" v-for="route in ComputedRoutes.homeRoutes">
                                            <td scope="row">{{route.request_method}}</td>
                                            <td class="field">{{route.uri}}</td>
                                            <td class="field">
                                                <span class="field-status">{{route.status.statusText}}</span>
                                                <select v-model="route.status.text"><option v-for="option in route.status.options">{{option}}</option></select>
                                            </td>
                                            <td class="field">
                                                <span class="field-status">{{route.name.statusText}}</span>
                                                <input id="Name" type="text" class="Overlord-TextBox form-text-box" title="Name" name="Name"
                                                       :class="{OverlordFailedBorder: route.name.alerts.failed, OverlordSuccessBorder: route.name.alerts.success}"
                                                       v-model="route.name.text"
                                                       :placeholder="route.name.data"
                                                       @blur="validate('name', route)"
                                                >
                                            </td>
                                            <td class="field">
                                                <!-- Description -->
                                                <span class="field-status">{{route.description.statusText}}</span>
                                                <textarea class="Overlord-TextBox form-text-box"
                                                          :class="{OverlordFailedBorder: route.description.alerts.failed, OverlordSuccessBorder: route.description.alerts.success}"
                                                          v-model="route.description.text"
                                                          :placeholder="route.description.data"
                                                          @blur="validate('description', route)"
                                                ></textarea>

                                            </td>
                                            <td class="field"><button @click="submitRoute(route)">Update</button></td>
                                            <td class="field">{{route.updated_at}}</td>
                                        </tr>
                                    </MainTable>
                                </div>

                            </MainContent>

                        </MainPanel>

                    </div>
                </div>
            </div>

            <span slot="slot_button_1">API</span>
            <div slot="slot_body_1">
                <!-- Api Pages-->
                <div class="row">
                    <div class="col-md-12">
                        <MainPanel :is-controls="false">
                            <MainContent :title="'API Pages'" slot="content">
                                <div slot="content" class="module-description">
                                    These represent the API pages. Taking these down makes them inaccessible.
                                </div>
                                <div slot="content">
                                    <MainTable v-if="pages !== null">
                                        <tr slot="header" class="table-header OverLord-Shadow-Main">
                                            <th class="icon_row">Method</th><th>URI</th><th>Status</th><th>Name</th><th>Description</th><th>Action</th><th class="last_icon">Created At</th>
                                        </tr>
                                        <tr slot="row" v-for="route in ComputedRoutes.apiRoutes">
                                            <td scope="row">{{route.request_method}}</td>
                                            <td class="field">{{route.uri}}</td>
                                            <td class="field">
                                                <span class="field-status">{{route.status.statusText}}</span>
                                                <select v-model="route.status.text"><option v-for="option in route.status.options">{{option}}</option></select>
                                            </td>
                                            <td class="field">
                                                <span class="field-status">{{route.name.statusText}}</span>
                                                <input type="text" class="Overlord-TextBox form-text-box" title="Name" name="Name"
                                                       :class="{OverlordFailedBorder: route.name.alerts.failed, OverlordSuccessBorder: route.name.alerts.success}"
                                                       v-model="route.name.text"
                                                       :placeholder="route.name.data"
                                                       @blur="validate('name', route)"
                                                >
                                            </td>
                                            <td class="field">
                                                <!-- Description -->
                                                <span class="field-status">{{route.description.statusText}}</span>
                                                <textarea class="Overlord-TextBox form-text-box"
                                                          :class="{OverlordFailedBorder: route.description.alerts.failed, OverlordSuccessBorder: route.description.alerts.success}"
                                                          v-model="route.description.text"
                                                          :placeholder="route.description.data"
                                                          @blur="validate('description', route)"
                                                ></textarea>

                                            </td>
                                            <td class="field"><button @click="submitRoute(route)">Update</button></td>
                                            <td class="field">{{route.updated_at}}</td>
                                        </tr>
                                    </MainTable>
                                </div>

                            </MainContent>

                        </MainPanel>

                    </div>
                </div>
            </div>

            <span slot="slot_button_2">Profile</span>
            <div slot="slot_body_2">
                <!-- Profile Pages-->
                <div class="row">
                    <div class="col-md-12">
                        <MainPanel :is-controls="false">
                            <MainContent :title="'Profile Pages'" slot="content">
                                <div slot="content" class="module-description">
                                    These represent the Profile pages. Taking these down makes them inaccessible.
                                </div>
                                <div slot="content">
                                    <MainTable v-if="pages !== null">
                                        <tr slot="header" class="table-header OverLord-Shadow-Main">
                                            <th class="icon_row">Method</th><th>URI</th><th>Status</th><th>Name</th><th>Description</th><th>Action</th><th class="last_icon">Created At</th>
                                        </tr>
                                        <tr slot="row" v-for="route in ComputedRoutes.profileRoutes">
                                            <td scope="row">{{route.request_method}}</td>
                                            <td class="field">{{route.uri}}</td>
                                            <td class="field">
                                                <span class="field-status">{{route.status.statusText}}</span>
                                                <select v-model="route.status.text"><option v-for="option in route.status.options">{{option}}</option></select>
                                            </td>
                                            <td class="field">
                                                <span class="field-status">{{route.name.statusText}}</span>
                                                <input type="text" class="Overlord-TextBox form-text-box" title="Name" name="Name"
                                                       :class="{OverlordFailedBorder: route.name.alerts.failed, OverlordSuccessBorder: route.name.alerts.success}"
                                                       v-model="route.name.text"
                                                       :placeholder="route.name.data"
                                                       @blur="validate('name', route)"
                                                >
                                            </td>
                                            <td class="field">
                                                <!-- Description -->
                                                <span class="field-status">{{route.description.statusText}}</span>
                                                <textarea class="Overlord-TextBox form-text-box"
                                                          :class="{OverlordFailedBorder: route.description.alerts.failed, OverlordSuccessBorder: route.description.alerts.success}"
                                                          v-model="route.description.text"
                                                          :placeholder="route.description.data"
                                                          @blur="validate('description', route)"
                                                ></textarea>

                                            </td>
                                            <td class="field"><button @click="submitRoute(route)">Update</button></td>
                                            <td class="field">{{route.updated_at}}</td>
                                        </tr>
                                    </MainTable>
                                </div>

                            </MainContent>

                        </MainPanel>

                    </div>
                </div>
            </div>

            <span slot="slot_button_3">Login</span>
            <div slot="slot_body_3">
                <!-- Login Pages-->
                <div class="row">
                    <div class="col-md-12">
                        <MainPanel :is-controls="false">
                            <MainContent :title="'Login Pages'" slot="content">
                                <div slot="content" class="module-description">
                                    These represent the Login pages. Taking these down makes them inaccessible.
                                </div>
                                <div slot="content">
                                    <MainTable v-if="pages !== null">
                                        <tr slot="header" class="table-header OverLord-Shadow-Main">
                                            <th class="icon_row">Method</th><th>URI</th><th>Status</th><th>Name</th><th>Description</th><th>Action</th><th class="last_icon">Created At</th>
                                        </tr>
                                        <tr slot="row" v-for="route in ComputedRoutes.loginRoutes">
                                            <td scope="row">{{route.request_method}}</td>
                                            <td class="field">{{route.uri}}</td>
                                            <td class="field">
                                                <span class="field-status">{{route.status.statusText}}</span>
                                                <select v-model="route.status.text"><option v-for="option in route.status.options">{{option}}</option></select>
                                            </td>
                                            <td class="field">
                                                <span class="field-status">{{route.name.statusText}}</span>
                                                <input type="text" class="Overlord-TextBox form-text-box" title="Name" name="Name"
                                                       :class="{OverlordFailedBorder: route.name.alerts.failed, OverlordSuccessBorder: route.name.alerts.success}"
                                                       v-model="route.name.text"
                                                       :placeholder="route.name.data"
                                                       @blur="validate('name', route)"
                                                >
                                            </td>
                                            <td class="field">
                                                <!-- Description -->
                                                <span class="field-status">{{route.description.statusText}}</span>
                                                <textarea class="Overlord-TextBox form-text-box"
                                                          :class="{OverlordFailedBorder: route.description.alerts.failed, OverlordSuccessBorder: route.description.alerts.success}"
                                                          v-model="route.description.text"
                                                          :placeholder="route.description.data"
                                                          @blur="validate('description', route)"
                                                ></textarea>

                                            </td>
                                            <td class="field"><button @click="submitRoute(route)">Update</button></td>
                                            <td class="field">{{route.updated_at}}</td>
                                        </tr>
                                    </MainTable>
                                </div>

                            </MainContent>

                        </MainPanel>

                    </div>
                </div>
            </div>

            <span slot="slot_button_4">Public</span>
            <div slot="slot_body_4">
                <!-- Public Pages-->
                <div class="row">
                    <div class="col-md-12">
                        <MainPanel :is-controls="false">
                            <MainContent :title="'Public Pages'" slot="content">
                                <div slot="content" class="module-description">
                                    These represent the Public pages. Taking these down makes them inaccessible.
                                </div>
                                <div slot="content">
                                    <MainTable v-if="pages !== null">
                                        <tr slot="header" class="table-header OverLord-Shadow-Main">
                                            <th class="icon_row">Method</th><th>URI</th><th>Status</th><th>Name</th><th>Description</th><th>Action</th><th class="last_icon">Created At</th>
                                        </tr>
                                        <tr slot="row" v-for="route in ComputedRoutes.publicRoutes">
                                            <td scope="row">{{route.request_method}}</td>
                                            <td class="field">{{route.uri}}</td>
                                            <td class="field">
                                                <span class="field-status">{{route.status.statusText}}</span>
                                                <select v-model="route.status.text"><option v-for="option in route.status.options">{{option}}</option></select>
                                            </td>
                                            <td class="field">
                                                <span class="field-status">{{route.name.statusText}}</span>
                                                <input type="text" class="Overlord-TextBox form-text-box" title="Name" name="Name"
                                                       :class="{OverlordFailedBorder: route.name.alerts.failed, OverlordSuccessBorder: route.name.alerts.success}"
                                                       v-model="route.name.text"
                                                       :placeholder="route.name.data"
                                                       @blur="validate('name', route)"
                                                >
                                            </td>
                                            <td class="field">
                                                <!-- Description -->
                                                <span class="field-status">{{route.description.statusText}}</span>
                                                <textarea class="Overlord-TextBox form-text-box"
                                                          :class="{OverlordFailedBorder: route.description.alerts.failed, OverlordSuccessBorder: route.description.alerts.success}"
                                                          v-model="route.description.text"
                                                          :placeholder="route.description.data"
                                                          @blur="validate('description', route)"
                                                ></textarea>

                                            </td>
                                            <td class="field"><button @click="submitRoute(route)">Update</button></td>
                                            <td class="field">{{route.updated_at}}</td>
                                        </tr>
                                    </MainTable>
                                </div>

                            </MainContent>

                        </MainPanel>

                    </div>
                </div>
            </div>

            <span slot="slot_button_5">Status</span>
            <div slot="slot_body_5">
                <!-- Status Pages-->
                <div class="row">
                    <div class="col-md-12">
                        <MainPanel :is-controls="false">
                            <MainContent :title="'Status Pages'" slot="content">
                                <div slot="content" class="module-description">
                                    These represent the Status pages. Taking these down makes them inaccessible.
                                </div>
                                <div slot="content">
                                    <MainTable v-if="pages !== null">
                                        <tr slot="header" class="table-header OverLord-Shadow-Main">
                                            <th class="icon_row">Method</th><th>URI</th><th>Status</th><th>Name</th><th>Description</th><th>Action</th><th class="last_icon">Created At</th>
                                        </tr>
                                        <tr slot="row" v-for="route in ComputedRoutes.statusRoutes">
                                            <td scope="row">{{route.request_method}}</td>
                                            <td class="field">{{route.uri}}</td>
                                            <td class="field">
                                                <span class="field-status">{{route.status.statusText}}</span>
                                                <select v-model="route.status.text"><option v-for="option in route.status.options">{{option}}</option></select>
                                            </td>
                                            <td class="field">
                                                <span class="field-status">{{route.name.statusText}}</span>
                                                <input type="text" class="Overlord-TextBox form-text-box" title="Name" name="Name"
                                                       :class="{OverlordFailedBorder: route.name.alerts.failed, OverlordSuccessBorder: route.name.alerts.success}"
                                                       v-model="route.name.text"
                                                       :placeholder="route.name.data"
                                                       @blur="validate('name', route)"
                                                >
                                            </td>
                                            <td class="field">
                                                <!-- Description -->
                                                <span class="field-status">{{route.description.statusText}}</span>
                                                <textarea class="Overlord-TextBox form-text-box"
                                                          :class="{OverlordFailedBorder: route.description.alerts.failed, OverlordSuccessBorder: route.description.alerts.success}"
                                                          v-model="route.description.text"
                                                          :placeholder="route.description.data"
                                                          @blur="validate('description', route)"
                                                ></textarea>

                                            </td>
                                            <td class="field"><button @click="submitRoute(route)">Update</button></td>
                                            <td class="field">{{route.updated_at}}</td>
                                        </tr>
                                    </MainTable>
                                </div>

                            </MainContent>

                        </MainPanel>

                    </div>
                </div>
            </div>

        </tab-content>

    </div>

</template>

<script>
    import MainPanel from '../part/ResponsiveMainPanel.vue';
    import MainTable from '../part/ResponsiveMainTable.vue';
    import MainContent from '../part/ResponsiveMainContent.vue';
    import TabContent from '../part/ResponsiveTabContent.vue';
    export default {
        props: [

        ],
        components:{
            'MainPanel': MainPanel,
            'MainTable': MainTable,
            'MainContent': MainContent,
            'TabContent': TabContent,
        },

        data(){
            return {
                location: {
                    main: 'Admin',
                    sub: 'Settings',
                    location: 'Page Status'
                },
                pages: null,
                returnStatus:[],
            };
        },
        computed:{
            ComputedRoutes:function(){
                let loginRoutes = [];
                let profileRoutes = [];
                let publicRoutes = [];
                let homeRoutes = [];
                let statusRoutes = [];
                let apiRoutes = [];
                for(let i = 0; i < this.pages.length; i++){
                    let routeArray = this.pages[i].uri.split('/');

                    if(this.pages[i].uri ==='login' || routeArray.includes('login') === true){
                        loginRoutes.push(this.pages[i]);
                    }
                    else if(this.pages[i].uri ==='logout'|| routeArray.includes('logout') === true){
                        loginRoutes.push(this.pages[i]);
                    }
                    else if(this.pages[i].uri ==='password'|| routeArray.includes('password') === true){
                        loginRoutes.push(this.pages[i]);
                    }
                    else if(this.pages[i].uri ==='register'|| routeArray.includes('register') === true){
                        loginRoutes.push(this.pages[i]);
                    }
                    else if(this.pages[i].uri ==='profile' || routeArray.includes('profile') === true){
                        profileRoutes.push(this.pages[i]);
                    }
                    else if(this.pages[i].uri ==='api' || routeArray.includes('api') === true){
                        apiRoutes.push(this.pages[i]);
                    }
                    else{
                        switch(this.pages[i].uri){
                            case'/': case'home': homeRoutes.push(this.pages[i]); break;
                            case'page-status':  case'access-denied': statusRoutes.push(this.pages[i]); break;
                            default: publicRoutes.push(this.pages[i]); break;
                        }

                    }

                }
                return {
                    publicRoutes: publicRoutes,
                    profileRoutes: profileRoutes,
                    loginRoutes: loginRoutes,
                    homeRoutes: homeRoutes,
                    statusRoutes: statusRoutes,
                    apiRoutes: apiRoutes,

                };
            }
        },
        mounted(){
            this.initialize();
        },
        methods:{
            initialize(){
                let self = this;
                axios.get('admin/page-status')
                    .then(function (response){
                        self.pages = [];
                        for(let i = 0; i < response.data.pages.length; i++){
                            self.pages.push({
                                uri: response.data.pages[i].uri,
                                request_method: response.data.pages[i].request_method,
                                id: response.data.pages[i].id,
                                updated_at: response.data.pages[i].updated_at,
                                description: {
                                    text:'',
                                    data:response.data.pages[i].description,
                                    alerts:{
                                        neutral:true,
                                        success:false,
                                        failed:false,
                                    },
                                    statusText: '',
                                },
                                name: {
                                    text:'',
                                    data:response.data.pages[i].name,
                                    alerts:{
                                        neutral:true,
                                        success:false,
                                        failed:false,
                                    },
                                    statusText: '',
                                },
                                status: {
                                    text: response.data.pages[i].status,
                                    options:[
                                        'up',
                                        'down',
                                        'soon',
                                        'admin',
                                    ],
                                    alerts:{
                                        neutral:true,
                                        success:false,
                                        failed:false,
                                    },
                                    statusText: '',
                                },



                            });
                        }


                    })
                    .catch(function (error){
                        console.log(error);
                    });
            },
            validate(field, route){
                let self = this;
                switch(field){
                    case'name':
                        axios.put('admin/page-status/'+ route.id,{
                            'PageStatusName': route.name.text,
                        })
                            .then(function(response){
                                console.log(response.data);
                                if(response['data']['status'] === 'success'){
                                    route.name.alerts.success = true;
                                    route.name.alerts.failed = false;
                                }
                                for(let i = 0; i < response['data']['successes'].length; i++){
                                    if(response['data']['successes'][i]['name'] === 'Name'){
                                        self.returnStatus.push(response['data']['successes'][i]);
                                    }
                                }
                                // Checks for Errors
                                if(response['data']['status'] === 'failed'){
                                    route.name.alerts.success = false;
                                    route.name.alerts.failed = true;
                                }
                                for(let i = 0; i < response['data']['errors'].length; i++){
                                    if(response['data']['errors'][i]['name'] === 'Name'){
                                        self.returnStatus.push(response['data']['errors'][i]);
                                    }
                                }
                            })
                            .catch(function(error){
                                console.log(error)

                            });
                        break;
                    case'description':
                        axios.put('admin/page-status/'+ route.id,{
                            'PageStatusDescription': route.description.text,
                        })
                            .then(function(response){
                                if(response['data']['status'] === 'success'){
                                    route.description.alerts.success = true;
                                    route.description.alerts.failed = false;
                                }
                                for(let i = 0; i < response['data']['successes'].length; i++){
                                    if(response['data']['successes'][i]['name'] === 'Description'){
                                        self.returnStatus.push(response['data']['successes'][i]);
                                    }
                                }
                                // Checks for Errors
                                if(response['data']['status'] === 'failed'){
                                    route.description.alerts.success = false;
                                    route.description.alerts.failed = true;
                                }
                                for(let i = 0; i < response['data']['errors'].length; i++){
                                    if(response['data']['errors'][i]['name'] === 'Description'){
                                        self.returnStatus.push(response['data']['errors'][i]);
                                    }
                                }
                            })
                            .catch(function(error){
                                console.log(error)
                            });
                        break;
                }



            },
            submitRoute(route){
                let self = this;
                let data = {
                    'submit':true,
                    'PageStatusName': route.name.text,
                    'PageStatusDescription': route.description.text,
                    'PageStatusStatus':  route.status.text,
                };

                axios.put('admin/page-status/'+ route.id, data)
                    .then(function(response){
                        // Checks for Successes
                        if(response['data']['status'] === 'success'){
                            console.log('Response: ' + response['data']['status']);
                        }
                        for(let i = 0; i < response['data']['successes'].length; i++){
                            self.returnStatus.push(response['data']['successes'][i]);
                            console.log(response['data']['successes'][i]['name'] + ': ' + response['data']['status']);
                        }

                        // Checks for Warnings
                        for(let i = 0; i < response['data']['warnings'].length; i++){
                            self.returnStatus.push(response['data']['warnings'][i]);
                            console.log(response['data']['warnings'][i]['name'] + ': ' + response['data']['status']);
                        }

                        // Checks for Errors
                        if(response['data']['status'] === 'failed'){
                            console.log('Response: ' + response['data']['status']);
                        }
                        for(let i = 0; i < response['data']['errors'].length; i++){
                            self.returnStatus.push(response['data']['errors'][i]);
                            console.log(response['data']['errors'][i]['name'] + ': ' + response['data']['status']);

                        }
                    })
                    .catch(function(error){
                        console.log(error);
                    });
            }

        }
    }
</script>
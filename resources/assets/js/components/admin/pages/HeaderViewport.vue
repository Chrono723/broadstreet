<template>
    <div class="body-content animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <MainPanel>
                    <div slot="options-expanded">
                        These are Options
                    </div>
                    <MainTable slot="content">
                        <tr slot="header" class="table-header OverLord-Shadow-Main">
                            <th class="icon_row">ID</th>
                            <th>Active</th>
                            <th>Property</th>
                            <th>Created At</th>
                            <th class="last_icon">Updated At</th>
                        </tr><tr
                            slot="row"
                            v-for="viewport in viewports"
                            class="Shadow-Hard-Bottom-effect1"
                            v-bind:class="{ trHover: viewport.controls.hover, 'trActive': viewport.controls.active }"
                            @mouseover="onMouse(viewport)"
                            @mouseleave="onMouseLeave(viewport)"
                    >
                        <td class="field">{{ viewport.data.id }}</td>
                        <td class="field">{{ viewport.data.is_active.text }}</td>


                        <td class="field">
                            <label for="viewportProperty">Property</label>
                            <span class="errors">{{viewport.data.property.error}}</span>
                            <input id="viewportProperty" type="text" class="Overlord-TextBox form-text-box" title="viewport property" name="viewportProperty"
                                   :class="{OverlordFailedBorder: viewport.data.property.alerts.failed, OverlordSuccessBorder: viewport.data.property.alerts.success}"
                                   v-model="viewport.data.property.text"
                                   :placeholder="viewport.data.property.value"
                                   @blur="validate('property', viewport.data.property)"
                            >

                            <label for="pages">Pages</label>
                            <select id="pages" v-model="viewport.data.pages.value">
                                <option disabled value="">Please select one</option>
                                <option v-for="option in viewport.data.pages.options">{{option}}</option>
                            </select>

                        </td>
                        <td class="field">{{ viewport.data.created_at }}</td>
                        <td class="field">{{ viewport.data.updated_at }}</td>
                    </tr>
                    </MainTable>
                    <div class="Add-Input" slot="content">
                        <label for="addNameProperty">add Property</label>
                        <span class="errors">{{addNew.data.property.error}}</span>
                        <input id="addNameProperty" type="text" class="Overlord-TextBox form-text-box" title="viewport property" name="viewportProperty"
                               :class="{OverlordFailedBorder: addNew.data.property.alerts.failed, OverlordSuccessBorder: addNew.data.property.alerts.success}"
                               v-model="addNew.data.property.text"
                               :placeholder="'Add new Property'"
                               @blur="validate('property', keyword.data.property)"
                        >
                    </div>
                </MainPanel>

            </div>
        </div>

    </div>

</template>

<script>
    import MainPanel from '../part/ResponsiveMainPanel.vue';
    import MainTable from '../part/ResponsiveMainTable.vue';
    import MainContent from '../part/ResponsiveMainContent.vue';

    export default {
        props: [

        ],
        components:{
            'MainPanel': MainPanel,
            'MainTable': MainTable,
            'MainContent': MainContent,
        },

        data(){
            return {
                location: {
                    main: 'Admin',
                    sub: 'Header',
                    location: 'Viewport'
                },
                viewports:[],
                addNew:{
                    data:{
                        id: null,
                        created_at: null,
                        updated_at: null,
                        is_active: {
                            text: "",
                            hover: false,
                            active: false,
                            alerts:{neutral:true, success:false, failed:false,},
                        },
                        property: {
                            text: '',
                            hover: false,
                            active: false,
                            error:'required',
                            alerts:{neutral:true, success:false, failed:false,},
                        },
                        pages: {
                            value: '',
                            options:['front', 'back', 'hybrid', 'all',],
                            alerts:{neutral:true, success:false, failed:false,},
                        },
                    },
                    controls:{
                        hover: false,
                        active: false,
                        alerts:{neutral:true, success:false, failed:false,}
                    }
                }
            };
        },
        mounted(){
            this.getInfo();
        },
        methods:{
            getInfo(){
                let self = this;
                axios.get('admin/header/viewport')
                    .then(function (response){
                        for(let i = 0; i < response.data.length; i++){
                            self.viewports.push({
                                data: {
                                    id: response.data[i].id,
                                    created_at: response.data[i].created_at,
                                    updated_at: response.data[i].updated_at,
                                    is_active: {
                                        value: response.data[i].is_active,
                                        text: (response.data[i].is_active === 1)? "active" : "inactive",
                                        hover: false,
                                        active: false,
                                        alerts:{neutral:true, success:false, failed:false,},
                                    },
                                    property: {
                                        value: response.data[i].property,
                                        text: '',
                                        hover: false,
                                        active: false,
                                        error:'required',
                                        alerts:{neutral:true, success:false, failed:false,},
                                    },
                                    pages: {
                                        value: response.data[i].pages,
                                        options:['front', 'back', 'hybrid', 'all',],
                                        error:'required',
                                        alerts:{neutral:true, success:false, failed:false,},
                                    },
                                },
                                controls:{
                                    hover: false,
                                    active: false,
                                    alerts:{neutral:true, success:false, failed:false,}

                                },
                            })

                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            validate(call, field){

            },
            onMouse(keyword){

            },
            onMouseLeave(keyword){

            }
        }
    }
</script>
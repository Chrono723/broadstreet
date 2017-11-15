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
                            <th>Name</th>
                            <th>Created At</th>
                            <th class="last_icon">Updated At</th>
                        </tr>
                        <tr
                                slot="row"
                                v-for="keyword in keywords"
                                class="Shadow-Hard-Bottom-effect1"
                                v-bind:class="{ trHover: keyword.controls.hover, 'trActive': keyword.controls.active }"
                                @mouseover="onMouse(keyword)"
                                @mouseleave="onMouseLeave(keyword)"
                        >
                            <td class="field">{{ keyword.data.id }}</td>
                            <td class="field">{{ keyword.data.is_active.text }}</td>


                            <td class="field">
                                <label for="keywordName">Name</label>
                                <span class="errors">{{keyword.data.name.error}}</span>
                                <input id="keywordName" type="text" class="Overlord-TextBox form-text-box" title="Keyword Name" name="keywordName"
                                       :class="{OverlordFailedBorder: keyword.data.name.alerts.failed, OverlordSuccessBorder: keyword.data.name.alerts.success}"
                                       v-model="keyword.data.name.text"
                                       :placeholder="keyword.data.name.value"
                                       @blur="validate('name', keyword.data.name)"
                                >

                                <label for="pages">Pages</label>
                                <select id="pages" v-model="keyword.data.pages.value">
                                    <option disabled value="">Please select one</option>
                                    <option v-for="option in keyword.data.pages.options">{{option}}</option>
                                </select>


                            </td>
                            <td class="field">{{ keyword.data.created_at }}</td>
                            <td class="field">{{ keyword.data.updated_at }}</td>
                        </tr>
                    </MainTable>
                    <div class="Add-Input" slot="content">
                        <label for="addName">add Name</label>
                        <span class="errors">{{addNew.data.name.error}}</span>
                        <input id="addName" type="text" class="Overlord-TextBox form-text-box" title="Keyword Name" name="keywordName"
                               :class="{OverlordFailedBorder: addNew.data.name.alerts.failed, OverlordSuccessBorder: addNew.data.name.alerts.success}"
                               v-model="addNew.data.name.text"
                               :placeholder="'Add new Keyword'"
                               @blur="validate('name', keyword.data.name)"
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
                    location: 'Keywords'
                },
                keywords: [],
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
                        name: {
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

                },
            };
        },
        mounted(){
            this.getInfo();
        },
        methods:{
            getInfo(){
                let self = this;
                axios.get('admin/header/keywords')
                    .then(function (response){
                        for(let i = 0; i < response.data.length; i++){
                            self.keywords.push({
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
                                    name: {
                                        value: response.data[i].name,
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
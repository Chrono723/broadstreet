<template>
    <div class="body-content animated fadeIn">
        <ViewsGraph v-bind:graphType="'userViews'"></ViewsGraph>
        <div class="row">
            <div class="col-md-9">
                <MainPanel>
                    <MainTable slot="content">
                        <tr slot="header" class="table-header OverLord-Shadow-Main">
                            <th class="icon_row">
                                <img class="music-icon" src="images/icons/music-player/standard/music-note.png">
                            </th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Permissions</th>
                            <th>Artist Name</th>
                            <th>Payment</th>
                            <th>History</th>
                        </tr>
                    </MainTable>
                </MainPanel>
            </div>
        </div>



    </div>

</template>

<script>
    import ViewsGraph from '../part/MainViewsGraph.vue';
    import MainPanel from '../part/ResponsiveMainPanel.vue';
    import MainTable from '../part/ResponsiveMainTable.vue';
    export default {
        props: [

        ],
        components:{
            'ViewsGraph': ViewsGraph,
            'MainPanel': MainPanel,
            'MainTable': MainTable,
        },



        data(){
            return {
                location: {
                    main: 'Admin',
                    sub: 'Users',
                    location: 'Home'
                },
                users: null,
                counter: 0,
                pagination: {
                    total: 0,
                    per_page: 10,
                    from: 1,
                    to: 0,
                    current_page: 1
                },
            };
        },
        created(){
            this.getUsers(this.pagination.current_page);
        },
        mounted(){

        },
        methods:{
            getUsers(page){
                let self = this;
                axios.get('admin/users?page=' + page)
                    .then(function (response){
                        self.users = response.data['Users'];
                        self.pagination = response.data['Pagination'];
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }
    }
</script>
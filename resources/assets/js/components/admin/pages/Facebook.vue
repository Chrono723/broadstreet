<template>
    <div class="body-content animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <MainPanel :is-controls="false" :set-height="780">
                    <MainContent :title="'Social Facebook'" slot="content">
                        <div slot="content" class="modal-page-inner">
                            <div class="form-left">


                            </div>
                            <div class="form-right">

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
                    sub: 'facebook',
                    location: 'social'
                },

            };
        },
        computed:{


            },

        mounted(){

        },
        methods:{

        }
    }
</script>
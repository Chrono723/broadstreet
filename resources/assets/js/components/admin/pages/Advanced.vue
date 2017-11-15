<template>
    <div class="body-content animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <MainPanel>
                    <div slot="options-expanded">
                        These are Options
                    </div>
                    <MainContent :title="'General'" slot="content">
                        <div slot="content">
                            This is the content.
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
                    sub: 'Settings',
                    location: 'Advanced'
                },
            };
        },
        mounted(){

        }
    }
</script>
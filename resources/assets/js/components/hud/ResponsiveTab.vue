<template>
    <overlord-container  :data_top='false' :data_bottom='false' :background-color="'transparent'">
        <div class="row Panel-Color-Gradient" style="margin-top: -200px;">
            <div class="col-md-12">
                <!--tabs border start-->
                <section class="normal-tabs">
                    <ul class="nav nav-tabs">
                        <li v-for="tab in tabContent" v-bind:class="{'active':tab.name === 'Features'}">
                            <a data-toggle="tab" :href="'#' + tab.name">{{tab.name}}</a>
                        </li>

                    </ul>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div v-for="tab in tabContent" :id="tab.name" class="tab-pane" v-bind:class="{'active':tab.name === 'Features'}">

                                <!-- List Tabs -->
                                <div v-if="tab.type === 'list'">
                                    <h4 class="text-uppercase">{{tab.name}}</h4>
                                    <div v-html="tab.description"></div>
                                    <br>
                                    <ul>
                                        <li v-for="item in tab.data">{{item}}</li>
                                    </ul>
                                </div>

                                <!-- Table Tabs -->
                                <table v-if="tab.type === 'table'" class="table table-striped table-bordered">
                                    <tbody>
                                        <tr v-for="data in tab.data">
                                            <td>{{data.name}}</td>
                                            <td>{{data.body}}</td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </section>
                <!--tabs border end-->
            </div>
        </div>
    </overlord-container>
</template>
<script>
    import overlordContainer from '../overlord_container.vue';
    export default{
        props: {
            tabContent: {
                type: Array,
                required: true
            },
        },
        components:{
          'overlord-container': overlordContainer,
        },
        computed: {

        },
        methods : {

        }
    }
</script>
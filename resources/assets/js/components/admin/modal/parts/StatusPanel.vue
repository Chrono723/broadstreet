<template>
    <div class="error-panel OverLord-Shadow-Main Ol-Panel-Dark-Red-Dotted">

        <span v-if="formStatus.length === 0">
            No Status Updates.
        </span>

        <div v-if="formStatus.length > 0" class="status-container">
            <div class="status-list">
                <ul class="list-items">
                    <li v-for="status in updated">
                        <span class="status-name">[{{status.name}}]</span>
                        <span class="status-status"
                              :class="{statusGreen: status.controls.isSuccess, statusYellow: status.controls.isWarning, statusRed: status.controls.isFailed}"
                        >{{status.status}}</span>

                        <span class="status-text">{{status.text}}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<style>
    .status-name{
        color:rgba(12, 228, 198, 0.44);
    }
    .statusGreen{  color: green;  }
    .statusYellow{  color: yellow;  }
    .statusRed{  color: red;  }
</style>


<script>

    export default{
        props:['form-status'],
        data(){
            return{
                updated:[],
            }
        },
        components:{

        },
        watch: {
            formStatus: function (status) {
                this.updated = this.StatusConfig(status);
            }
        },

        mounted(){
            this.updated = this.StatusConfig(this.formStatus);
        },

        methods:{
            StatusConfig(status){
                let update = [];
                for(let i= 0; i < status.length; i++){
                    update.push({
                        controls:{
                            isSuccess: (status[i].status === 'success'),
                            isFailed: (status[i].status === 'failed'),
                            isWarning: (status[i].status === 'warning')
                        },
                        name:status[i].name,
                        text:status[i].text,
                        status:status[i].status
                    })
                }
                return update;
            }
        }
    }
</script>
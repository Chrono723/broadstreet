<template>
    <div class="sidebar-footer hidden-xs hidden-sm hidden-md">
        <a id="fullscreen" @click="handleFullScreen()" class="pull-left" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-title="Fullscreen"><i class="fa fa-desktop"></i></a>
        <a id="logout" @click.prevent="logout" data-url="logout" class="pull-left" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-title="Logout"><i class="fa fa-power-off"></i></a>
        <form id="logout-form"   method="POST" action="logout"  style="display: none;">{{ csrf_token }}</form>
    </div>
</template>

<script>


    export default{
        props:[],
        data(){
            return{
                csrf_token: window.axios.defaults.headers.common['X-CSRF-TOKEN'],

            }
        },
        components:{

        },
        mounted(){
            //this.csrf_token = this.$parent.$parent.info.csrf_field;
        },
        methods:{
            // Logs you out
            //Hud Controls
            logout(){
                bootbox.dialog({
                    message: 'Do you want to exit from Blankon?',
                    title: 'Logout',
                    className: 'modal-danger modal-center',
                    buttons: {
                        danger: {
                            label: 'No',
                            className: 'btn-danger'
                        },
                        success: {
                            label: 'Yes',
                            className: 'btn-success',
                            callback: function() {
                                //window.location = $('#logout').data('url');
                                //document.getElementById('logout-form').submit();
                                axios.post('./logout', {

                                })
                                    .then(function (response) {
                                        console.log(response);
                                    })
                                    .catch(function (error) {
                                        console.log(error);
                                    });

                            }
                        }
                    }
                });

            },
            // Triggers Full Screen
            handleFullScreen: function () {
                let state;
                state = !state;
                if (state) {
                    // Trigger for fullscreen
                    $(this).toggleClass('fg-theme');
                    $(this).attr('data-original-title','Exit Fullscreen');
                    let docElement, request;
                    docElement = document.documentElement;
                    request = docElement.requestFullScreen || docElement.webkitRequestFullScreen || docElement.mozRequestFullScreen || docElement.msRequestFullScreen;
                    if(typeof request!="undefined" && request){
                        request.call(docElement);
                    }
                } else {
                    // Trigger for exit fullscreen

                    $(this).removeClass('fg-theme');
                    $(this).attr('data-original-title','Fullscreen');
                    let docElement, request;
                    docElement = document;
                    request = docElement.cancelFullScreen|| docElement.webkitCancelFullScreen || docElement.mozCancelFullScreen || docElement.msCancelFullScreen || docElement.exitFullscreen;
                    if(typeof request!="undefined" && request){
                        request.call(docElement);
                    }
                }

            },
        }

    }
</script>
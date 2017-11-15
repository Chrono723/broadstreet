<template>
    <div class="modal-page">
        <div class="OverlordBevel Bevel-h20"></div>
        <div class="modal-page-container">
            <modal-title title-name="'Comments'"></modal-title>
            <modal-content>
                <div slot="errors">
                    These are the errors.
                </div>
                <div slot="content">
                    This is the content.
                </div>
            </modal-content>



        </div>
        <div class="OverlordBevel Bevel-h20"></div>
    </div>
</template>

<script>

    import ModalTitle from '../parts/ModalBodyTitle.vue'
    import ModalContent from '../parts/ModalBodyContent.vue'
    export default{
        props:['data-comments'],
        data(){
            return{

            }
        },
        components:{
            'modal-title': ModalTitle,
            'modal-content': ModalContent
        }
    }
</script>

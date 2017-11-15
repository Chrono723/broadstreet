<template>
    <div class="modal-body-content-panel">
        <div class="modal-body-content-inner OverLord-Shadow-Main">
            <slot name="errors"></slot>
            <slot name="content"></slot>
        </div>

    </div>
</template>

<script>

    export default{
        data(){
            return{

            }
        },
        components:{

        }
    }
</script>

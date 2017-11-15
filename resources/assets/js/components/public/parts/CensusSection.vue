<template>
    <div class="col-md-4">
        <div class="fun-factor">
            <div class="icon">
                <i :class="icon"></i>
            </div>
            <div class="fun-info">
                <h1 class="timer" data-from="0" :data-to="number" data-speed="1000"> {{number}}</h1>
                <span>{{name}}</span>
            </div>
        </div>
    </div>
</template>

<script>

    export default{
        props: [
            'name',
            'number',
            'icon'
        ],
    }
</script>
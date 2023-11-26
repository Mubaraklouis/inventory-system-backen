

<script setup>

defineProps({
    show:Boolean
})
</script>

<template>
        <div v-if="show" class="model-mask">
       <div class="model-card">
    <h1>all the products are listed here</h1>
           <div>cart body</div>
           <button>cansel</button>
       </div>
        </div>

</template>

<style>
.model-mask{
    position: fixed;
    top: 0;
    left: 0;
    background: rgba(0,0,0,.6);
    width: 100%;
    height: 100vh;
    display: grid;
    place-items: center;

}

.model-card{
    background: #ffffff;
    padding: 1rem;
    width: 60%;

}
</style>


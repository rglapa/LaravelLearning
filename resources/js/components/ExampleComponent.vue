<script setup>
import { ref } from "vue";

const message = ref("Hello World");
</script>

<template>
    <div class="message-model">
        <p>{{ mesage }}</p>
    </div>
</template>

<style scoped>
.message-model {
    border: 1px solid yellow;
    text-align: center;
    border-radius: 10px;
    width: 80%;
    margin: auto;
    background-color: yellow;
}

.message-model p {
    font-weight: bold;
    font-size: 40px;
}
</style>

<template>
    <div class="button-wrapper" :style="cssProps">
        {{text}}
    </div>
</template>

<script>
export default {
    name: "DefaultButtonComponent",
    props: {
      color: String,
      text: String
    },
    computed: {
        cssProps() {
            return {
                '--bg-color': this.color,
            }
        }
    },
}
</script>

<style scoped>

    .button-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 15px;
        border: 1px solid var(--bg-color);
        color: var(--bg-color);
        background: #ffffff;
        transition: all 0.3s linear;
        cursor: pointer;
    }

    .button-wrapper:hover {
        background: var(--bg-color);
        color: #ffffff;
    }

</style>

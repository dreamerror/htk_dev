<template>
    <div class="button-wrapper" :class="propClass" :style="cssProps">
        {{text}}
    </div>
</template>

<script>
export default {
    name: "DefaultButtonComponent",
    props: {
      color: String,
      text: String,
      propClass: String,
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

<style scoped lang="scss">

    .button-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 15px;
        border: 1px solid var(--bg-color);
        color: var(--bg-color);
        transition: all 0.3s linear;
        cursor: pointer;
        border-radius: 15px;
    }

    .button-wrapper:hover {
        background: var(--bg-color);
        color: #ffffff;
    }

    .bg-color {
        color: #ffffff;
        background: var(--bg-color);
    }

    .bg-color:hover {
        color: #ffffff
    }

    @media (max-width: 899px) {
        .desktop-only {
            display: none;
        }
    }

</style>

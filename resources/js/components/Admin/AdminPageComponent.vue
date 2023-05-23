<template>
    <div class="admin-wrapper">

    </div>
</template>

<script>
export default {
    name: "AdminPageComponent",
    props: {
        cards: Object,
    },
    data() {
        return {
            currentState: "Home"
        }
    },
    methods: {
        changeState(newState) {
            this.currentState = newState
        }
    }
}
</script>

<style scoped>

</style>

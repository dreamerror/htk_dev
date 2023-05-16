<template>
    <div class="admin-wrapper">

        <admin-card-list
        v-if="this.currentState === 'Cards'"
        :cards="cards">

        </admin-card-list>
    </div>
</template>

<script>
export default {
    name: "AdminPageComponent",
    props: {
        cards: Array,
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

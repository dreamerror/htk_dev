<template>
    <div class="cards-wrapper">
        <main-card
        v-for="card in cards"
        :key="card.title"
        :title="card.title"
        :src="card.src"
        :description="card.description"
        :route="card.route">

        </main-card>
    </div>
</template>

<script>
export default {
    name: "MainCardsListComponent",
    props: {
        cards: Array,
    }
}
</script>

<style scoped>
    .cards-wrapper {
        display: flex;
        padding: 0 13vw 2vh 13vw;
        flex-direction: row;
        flex-grow: 1;
        flex-wrap: wrap;
        margin: 0 auto;
    }
</style>

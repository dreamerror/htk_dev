<template>
    <div class="admin-wrapper">
        <h3>
            Карточки
        </h3>

        <div class="admin-list-wrapper">
            <div class="admin-list-item"
                 v-for="card in cards"
                 :key="card.title">
                {{card.title}}
            </div>
        </div>


    </div>
</template>

<script>
export default {
    name: "AdminCardsEditComponent",
    props: {
        cards: Array,
    }
}
</script>

<style scoped lang="scss">

    .admin-wrapper {
        display: flex;
        flex-direction: column;
        gap: 2vh;
        align-items: center;
    }

    .admin-list-wrapper {
        display: flex;
        flex-direction: column;
    }

    .admin-list-item {
        background: #a19e9e;
        border: 1px solid black;
        color: black;
        transition: all .3s linear;
    }

    .admin-list-item:hover {
        background: black;
        color: #a19e9e;
    }



</style>

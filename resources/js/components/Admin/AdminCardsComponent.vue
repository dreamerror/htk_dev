<template>
    <div class="admin-list-wrapper">
        <admin-card-item v-for="(item, index) in items"
        :key="index"
        :src="item.src"
        :title="item.title"
        :text="item.text"
        :id="item.id"
        :lang="item.lang"
        :api="api">

        </admin-card-item>
    </div>
</template>

<script>
export default {
    name: "AdminCardsComponent",
    props: {
        api: String,
        items: Array,
    },
}
</script>

<style scoped>

    .admin-list-wrapper {
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 1vh;
        padding-left: 15vw;
    }

</style>

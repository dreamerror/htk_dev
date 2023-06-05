<template>
    <div class="admin-list-wrapper">
        <admin-bg-item v-for="(item, index) in data"
        :key="index"
        :src="item.src"
        :page="item.title"
        :pageName="item.page"
        :api="api">

        </admin-bg-item>
    </div>
</template>

<script>
export default {
    name: "AdminBackgroundsComponent",
    props: {
        api: String,
        data: Array,
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

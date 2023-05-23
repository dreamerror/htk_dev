<template>
    <div class="admin-list-wrapper">
        <admin-bg-item v-for="(item, index) in pages"
        :key="index"
        :src="item.src"
        :page="item.page"
        :pageName="item.pageName"
        :api="api">

        </admin-bg-item>
    </div>
</template>

<script>
export default {
    name: "AdminBackgroundsComponent",
    props: {
        api: String,
    },
    data() {
        return {
            pages: [
                {page: 'Главная', 'src': '/storage/bg/main-bg.jpg', pageName: 'main'},
                {page: 'Склад временного хранения', 'src': '/storage/bg/svh.png', pageName: 'svh'},
                {page: 'Таможенный представитель', 'src': '/storage/bg/tp.jpg', pageName: 'tp'},
            ]
        }
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

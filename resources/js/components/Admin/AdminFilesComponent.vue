<template>
    <div class="admin-list-wrapper">
        <admin-file-item v-for="(item, index) in pages"
                            :key="index"
                            :api="api"
                            :page="item.page"
                            :page_name="item.page_name"
                            :content="item.content">

        </admin-file-item>
    </div>
</template>

<script>
export default {
    name: "AdminFilesComponent",
    props: {
        api: String,
        items: Array,
    },
    data() {
        return {
            pages: [
                {page_name: 'СВХ', page: 'svh',
                    content: this.items.filter(function (e) {return e.page === 'svh'})},
                {page_name: 'Таможенный представитель', page: 'tp',
                    content: this.items.filter(function (e) {return e.page === 'tp'})},
                {page_name: 'Цены', page: 'prices',
                    content: this.items.filter(function (e) {return e.page === 'prices'})},
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

<template>
    <div class="page-wrapper">
        <header-pages
            :bg_image="'/storage/bg/svh.png'"
            :url="url"
            :content="pageDescription">

        </header-pages>

        <div class="page-content">
            <info-card
            v-for="page in pages"
            :key="page.id"
            :title="page.page_title"
            :id="page.id">

            </info-card>
        </div>
    </div>
</template>

<script>
export default {
    name: "SVHPageComponent",
    props: {
        url: String,
        pages: Array,
    },
    computed: {
        pageDescription() {
            return '<p class="title">Информация</p>';
        }
    },
}
</script>

<style scoped lang="scss">

    .page-wrapper {
        display: flex;
        flex-direction: column;
        gap: 3vh;
    }

    .page-content {
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr;
        gap: 2vh;
        width: 50%;
    }

</style>

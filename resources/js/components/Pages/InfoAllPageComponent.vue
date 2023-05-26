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
            :url="url"
            :title="page.page_title"
            :id="page.id">

            </info-card>
        </div>
    </div>
</template>

<script>
export default {
    name: "InfoAllPageComponent",
    props: {
        url: String,
        pages: Array,
    },
    computed: {
        pageDescription() {
            return '<p class="title">Уважаемые клиенты и посетители сайта!</p>' +
                '' +
                '<p>В настоящем разделе сайта публикуется:</p>' +
                '<p>- информация, требующая официального размещения;</p>' +
                '<p>- уведомления по договорным обязательствам;</p>' +
                '<p>- информация о порядке осуществления деятельности склада временного хранения;</p>' +
                '<p>- информация о предъявлемых требованиях законодательством России к СВХ;</p>' +
                '<p>- иная необходимая информация.</p>';
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
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        gap: 2vw;
    }

</style>

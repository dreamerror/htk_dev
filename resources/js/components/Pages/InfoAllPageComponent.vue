<template>
    <div class="page-wrapper">
        <header-pages
            :bg_image="'/storage/bg/info.jpg'"
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

        <div class="add-button"
        v-if="this.auth">
            <redirect-button
                :url="url"
                route="info/add"
                text="Новая запись"
                :resize="true"
            />
        </div>

    </div>
</template>

<script>
export default {
    name: "InfoAllPageComponent",
    props: {
        url: String,
        pages: Array,
        auth: Number,
    },
    computed: {
        pageDescription() {
            if (this.$store.state.lang === 'ru') {
                return '<p class="title">Уважаемые клиенты и посетители сайта!</p>' +
                    '' +
                    '<p>В настоящем разделе сайта публикуется:</p>' +
                    '<p>- информация, требующая официального размещения;</p>' +
                    '<p>- уведомления по договорным обязательствам;</p>' +
                    '<p>- информация о порядке осуществления деятельности склада временного хранения;</p>' +
                    '<p>- информация о предъявлемых требованиях законодательством России к СВХ;</p>' +
                    '<p>- иная необходимая информация.</p>';
            } else {
                return '<p class="title">尊敬的客户和访客!</p>' +
                    '' +
                    '<p>本网站栏目含以下信息</p>' +
                    '<p>- 需要正式发布的信息;</p>' +
                    '<p>- 合同义务通知;</p>' +
                    '<p>- 监管库有关程序;</p>' +
                    '<p>- 关于俄罗斯法律对临时存储仓库的要求的信息;</p>' +
                    '<p>- 其他必要的信息.</p>';
            }

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

    .add-button {
        width: 100%;


        .page-button {
            margin: 2vh auto;
        }
    }

</style>

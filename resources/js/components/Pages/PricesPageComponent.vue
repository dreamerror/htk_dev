<template>
    <div class="page-wrapper">
        <header-pages
            :bg_image="bg.src"
            :url="url"
            :content="pageDescription"
            :files="items">

        </header-pages>
    </div>
</template>

<script>
export default {
    name: "PricesPageComponent",
    props: {
        url: String,
        items: Array,
        bg: Object,
        page_data: {
            type: Object,
            default: () => {
                return {
                    'page_description': '',
                }
            }
        }
    },
    computed: {
        pageDescription() {
            return this.page_data['page_description'];
        }
    },
}
</script>

<style scoped lang="scss">

    .page-wrapper {
        display: flex;
        flex-direction: column;
    }

</style>

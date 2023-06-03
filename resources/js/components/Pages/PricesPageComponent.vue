<template>
    <div class="page-wrapper">
        <header-pages
            :bg_image="'/storage/bg/prices.jpg'"
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

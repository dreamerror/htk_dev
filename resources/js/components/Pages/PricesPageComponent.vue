<template>
    <div class="page-wrapper">
        <header-pages
            :bg_image="bg.src"
            :url="url"
            :content="pageDescription"
            :files="items">

        </header-pages>

        <file-upload-inputs
            v-if="auth"
            :api_files="`${url}/api/edit-price-files`"
            :files="items"
            page_name="svh" />
    </div>
</template>

<script>
export default {
    name: "PricesPageComponent",
    props: {
        url: String,
        auth: {
            type: Number,
            default: 0,
        },
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

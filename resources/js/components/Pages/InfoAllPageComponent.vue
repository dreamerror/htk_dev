<template>
    <div class="page-wrapper">
        <header-pages
            :bg_image="bg.src"
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
import {initEditor} from "../../inc/ContentTools/editor";

export default {
    name: "InfoAllPageComponent",
    props: {
        url: String,
        pages: Array,
        auth: Number,
        bg: Object,
        content: Object,
    },
    mounted() {
        if (this.auth) {
            initEditor(`${this.url}/api/edit-content`, this.setData)
        }
    },
    computed: {
        pageDescription() {
            return this.content['page_description'];
        }
    },
    methods: {
        setData(payload) {
            console.log(payload)
            return {
                page: 'info',
                description: payload['page-header'],
                lang: this.$store.state.lang
            }
        }
    }
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

<template>
    <div class="page-wrapper">
        <header-pages
            :bg_image="bg.src"
            :url="url"
            :content="pageDescription"
            :files="files">

        </header-pages>

        <div class="page-content">

            <div class="page-img-wrapper">
                <div class="page-documents">
                    <img src="/storage/svh_svid.png" alt="" data-no-resize>
                </div>

                <div class="svh-map">
                    <img data-ce-tag="static" class="svh-map" src="/storage/svh-map.jpg" alt="">
                </div>
            </div>


            <div class="page-text-wrapper">

                <div class="page-text" data-editable data-name="page-text" v-html="pageText">
                    {{pageText}}
                </div>

                <div class="page-additional-info" data-editable data-name="page-additional" v-html="pageAdditional">
                    {{pageAdditional}}
                </div>

                <file-upload-inputs
                    v-if="auth"
                    :api_files="`${url}/api/edit-files`"
                    :files="files"
                    page_name="svh" />

            </div>

        </div>
    </div>
</template>

<script>
import {initEditor} from "../../inc/ContentTools/editor";

export default {
    name: "SVHPageComponent",
    props: {
        url: String,
        api: String,
        api_files: String,
        data: Object,
        auth: Number,
        files: Array,
        bg: Object,
    },
    mounted() {
        if (this.auth) {
            initEditor(this.api, this.setData)
        }
    },
    computed: {
        pageText() {
            return this.data['page_text']
        },
        pageAdditional() {
            return this.data['page_additional']
        },
        pageDescription() {
            return this.data["page_description"]
        }
    },
    methods: {
        setData(payload) {
            return {
                page: 'svh',
                text: payload['page-text'],
                additional: payload['page-additional'],
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
        padding: 0 13vw;
        display: flex;
        flex-direction: row;
        gap: 2vw;
        margin-bottom: 2vh;
        width: 100%;

        .page-img-wrapper {
            display: flex;
            flex-direction: column;
            gap: 2vh;
            width: 70%;
        }

        .page-text-wrapper {
            display: flex;
            flex-direction: column;
            gap: 2vw;
        }
    }

    .doc-text {
        display: flex;
        flex-direction: row;
        justify-content: center;
        gap: 2vw;
    }

    .page-documents, .svh-map {
        display: flex;
        width: 100%;

        img {
            width: 100%;
            //height: auto;
            box-shadow: 4px 6px 10px rgb(0 0 0 / 20%);
            border: 6px solid #fff;
        }
    }



    .page-text {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        width: 100%;
    }

    .title {
        font-size: 1.5rem;
        font-weight: 400;
        line-height: 28px;
        text-transform: uppercase;
    }

    .page-additional-info {
        grid-row: 2;
        grid-column: 1 / span 2;
        margin-left: auto;
    }

    @media (max-width: 900px) {
        .page-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
    }

</style>

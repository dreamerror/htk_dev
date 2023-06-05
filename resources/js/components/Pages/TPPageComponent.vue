<template>
    <div class="page-wrapper">
        <header-pages
            :bg_image="bg.src"
            :url="url"
            :content="pageDescription"
            :files="files">

        </header-pages>

        <div class="page-content">
            <div class="page-doc-wrapper">
                <div class="page-documents">
                    <img src="/storage/tp_prikaz.png" alt="" data-no-resize>
                </div>

                <div class="page-text" data-editable data-name="page-text" v-html="pageText">
                    {{pageText}}
                </div>
            </div>


            <div class="page-additional-info" data-editable data-name="page-additional" v-html="pageAdditional">
                {{pageAdditional}}
            </div>

            <file-upload-inputs
                v-if="auth"
                :api_files="`${url}/api/edit-files`"
                :files="files"
                page_name="tp" />

        </div>
    </div>
</template>

<script>
import {initEditor} from "../../inc/ContentTools/editor";

export default {
    name: "TPPageComponent",
    props: {
        url: String,
        api: String,
        data: Object,
        auth: Number,
        bg: Object,
        files: {
            type: Array,
            default: () => [],
        }
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
            return this.data["page_additional"]
        },
        pageDescription() {
            return this.data["page_description"]
        }
    },
    methods: {
        setData(payload) {
            return {
                page: 'tp',
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

    .page-buttons-wrapper {
        margin-top: 5vh;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        gap: 2vw;
    }

    .page-button {
        text-transform: uppercase;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 25%;
        aspect-ratio: 4;
        padding: 1px 15px;
        border: 2px solid #d1a251;
        color: #d1a251;
        background: #d1a251;
        font-weight: bold;
        cursor: pointer;
        border-radius: 50px;
    }

    .page-content {
        width: 100%;
        padding: 0 13vw;
        display: flex;
        flex-direction: column;
        gap: 2vh;
    }

    .page-doc-wrapper {
        display: flex;
        flex-direction: row;
        gap: 2vw;
    }

    .doc-text {
        display: flex;
        flex-direction: row;
        justify-content: center;
        gap: 2vw;
    }

    .page-documents {
        display: flex;
        flex-direction: column;
        gap: 1vh;
        width: 70%;

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
    }

    .title {
        font-size: 1.5rem;
        font-weight: 400;
        line-height: 28px;
        text-transform: uppercase;
    }

    .page-additional-info {
        padding: 0 22.5vw;
    }

    @media (max-width: 900px) {
        .page-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
    }

</style>

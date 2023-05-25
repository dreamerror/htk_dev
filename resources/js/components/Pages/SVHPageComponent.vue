<template>
    <div class="page-wrapper">
        <header-pages
            :bg_image="'/storage/bg/svh.png'"
            :url="url"
            :content="pageDescription"
            :files="files">

        </header-pages>

        <div class="page-content">
                <div class="page-documents">
                    <img src="/storage/svh_svid.png" alt="" data-no-resize>
                </div>

                <div class="page-text" data-editable data-name="page-text" v-html="pageText">
                    {{pageText}}
                </div>

            <div class="page-additional-info" data-editable data-name="page-additional" v-html="pageAdditional">
                {{pageAdditional}}
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
        data: Object,
        auth: Number,
        files: Array,
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
            console.log(payload)
            return {
                page: 'svh',
                text: payload['page-text'],
                additional: payload['page-additional'],
                description: payload['page-header']
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

    .header-bg:after {
        background-image: url("/storage/bg/svh.png");
    }

    .page-content {
        padding: 0 13vw;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2vh;
        width: 100%;
    }

    .doc-text {
        display: flex;
        flex-direction: row;
        justify-content: center;
        gap: 2vw;
    }

    .page-documents {
        grid-column: 1;
        grid-row: 1;
        display: flex;
        flex-direction: column;
        gap: 1vh;
        width: 80%;

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
        grid-row: 2;
        grid-column: 1 / span 2;
    }

    @media (max-width: 900px) {
        .page-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
    }

</style>

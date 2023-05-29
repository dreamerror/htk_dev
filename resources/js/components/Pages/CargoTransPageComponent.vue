<template>
    <div class="page-wrapper">
        <header-pages
            :bg_image="'/storage/bg/cargo_trans.png'"
            :url="url"
            :content="pageDescription">

        </header-pages>

        <div class="page-content">
            <div class="page-doc-wrapper">
                <div class="page-text" data-editable data-name="page-text" v-html="pageText">
                    {{pageText}}
                </div>
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
    name: "CargoTransPageComponent",
    props: {
        url: String,
        api: String,
        data: Object,
        auth: Number,
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
            console.log(payload)
            return {
                page: 'cargo_trans',
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

    .partners-logo-wrapper {
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
        padding: 0 13vw;
        display: flex;
        flex-direction: column;
        gap: 2vh;
        width: 100%;
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
    }

    @media (max-width: 900px) {
        .page-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
    }

</style>

<template>
    <div class="page-wrapper">
        <header-pages
            :bg_image="'/storage/banner.png'"
            :url="url">

            <template v-slot:description data-editable data-name="page-header">
                <h3>
                    ООО "Хасанская транспортная компания" включает в себя всё необходимое для оказания услуг по хранению
                    товаров и транспортных средств различных видов, находящихся под таможенным контролем до выпуска
                    в соответствии с заявленной таможенной процедурой.
                </h3>

                <div class="page-buttons-wrapper">
                    <div class="page-button"
                         v-for="item in [0,1,2,3,4]"
                         :key="item">

                    </div>
                </div>
            </template>

        </header-pages>

        <div class="page-content">
            <div class="doc-text">
                <div class="page-documents">
                    <img src="/storage/svh_svid.png" alt="" data-no-resize>
                </div>

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
import data from "bootstrap/js/src/dom/data";

export default {
    name: "SVHPageComponent",
    props: {
        url: String,
        api: String,
        data: Object,
    },
    mounted() {
        initEditor(this.api, this.setData)
    },
    computed: {
        pageText() {
            return this.data['page_text']
        },
        pageAdditional() {
            return this.data['page_additional']
        }
    },
    methods: {
        setData(payload) {
            console.log(payload)
            return {
                page: 'svh',
                text: payload['page-text'],
                additional: payload['page-additional']
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

    .header-bg:after {
        background-image: url("/storage/bg/svh.png");
    }

    .page-content {
        display: flex;
        flex-direction: column;
        gap: 2vh;
    }

    .doc-text {
        display: flex;
        flex-direction: row;
        justify-content: center;
        gap: 2vw;
    }

    .page-documents {
        max-width: 340px;
        display: flex;
        flex-direction: column;
        gap: 1vh;

        img {
            width: 100%;
            height: auto;
            box-shadow: 4px 6px 10px rgb(0 0 0 / 20%);
            border: 6px solid #fff;
        }

        p {
            position: relative;
            color: #0a0a0d;
            font-size: 12px;
            font-weight: 500;
            line-height: 18px;
        }

        p::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 98px;
            height: 2px;
            background: #316851;
        }
    }

    .page-text {
        width: 30%;

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

</style>

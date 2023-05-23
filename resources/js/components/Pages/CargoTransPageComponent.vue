<template>
    <div class="page-wrapper">
        <header-pages
            :bg_image="'/storage/banner.png'"
            :url="url">

            <template v-slot:description data-editable data-name="page-header">
                <h3>
                    ООО "Беркут" работает на рынке транспортных услуг уже более 27 лет.
                </h3>

                <p>
                    Компания дислоцируется на базе собственных гаражей один из которых расположен в
                    непосредственной близости к государственной границе с Китаем
                    (п. Краскино, Хасанский район, 24 километра от границы), второй в пригороде Владивостока.
                </p>

                <p>
                    В число наших давних и надежных партнеров входят логистические компании провинции Цзилинь,
                    организующих складскую обработку и таможенную очистку товаров  на территории Китая.
                </p>
            </template>

        </header-pages>

        <div class="page-content">
            <div class="page-documents">
                <img src="/storage/cargo_svid.jpg" alt="" data-no-resize>
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
    },
    mounted() {
        initEditor(this.api, this.setData)
    },
    computed: {
        pageText() {
            return this.data['page_text']
        },
        pageAdditional() {
            return this.data["page_additional"]
        }
    },
    methods: {
        setData(payload) {
            console.log(payload)
            return {
                page: 'cargo_trans',
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
        background-image: url("/storage/bg/tp.jpg");
    }

    .page-content {
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2vh;
        width: 50%;
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

</style>

<template>
    <div class="page-wrapper">

        <header-pages
            :bg_image="'/storage/bg/svh.png'"
            :url="url"
            :content="pageDescription">

        </header-pages>


        <div class="page-text" data-editable data-name="page-text">
            <p>
                По вопросам обращаться:
            </p>
            <p>
                Генеральный директор ООО "Беркут"
            </p>
            <p>
                Машкин Александр Владимирович
            </p>
            <p>
                тел.: +7 924 526-78-00
            </p>
        </div>

        <div class="page-additional" data-editable data-name="page-additional" v-html="pageAdditional">
            {{pageAdditional}}
        </div>

    </div>
</template>

<script>
import {initEditor} from "../../inc/ContentTools/editor";

export default {
    name: "TransitTransPageComponent",
    props: {
        url: String,
        auth: Number,
        api_text: String,
        data: {
            type: Object,
            default: () => {
                return {
                    page_description: '<p>' +
                        'Являясь лицензированным таможенным перевозчиком наша компания может перевозить любые\n' +
                        'транзитные грузы без внесения обеспечения уплаты таможенных платежей.\n' +
                        '</p>',
                    page_text: '',
                    page_additional: '',
                }
            }
        }
    },
    mounted() {
        if (this.auth) {
            initEditor(this.api_text, this.setData)
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
                page: 'transit_trans',
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

.page-description {
    display: flex;
    flex-direction: row;
    gap: 2vw;
}

@media (max-width: 899px) {
    .page-description {
        flex-wrap: wrap;
    }
}

.page-text {
    font-size: 16px;
    font-weight: 400;
    line-height: 28px;

    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

</style>

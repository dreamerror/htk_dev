<template>
    <div class="page-wrapper">

        <header-pages
            :bg_image="'/storage/bg/svh.png'"
            :url="url"
            :content="pageDescription">

        </header-pages>


        <div class="page-text" data-editable data-name="page-text" v-html="pageText">
            {{pageText}}
        </div>

        <div class="page-additional" data-editable data-name="page-additional" v-html="pageAdditional">
            {{pageAdditional}}
        </div>

    </div>
</template>

<script>
import {initEditor} from "../../inc/ContentTools/editor";

export default {
    name: "PassTransPageComponent",
    props: {
        url: String,
        auth: Number,
        api_text: String,
        data: {
            type: Object,
            default: () => {
                return {
                    page_description: '<p class="title">ПАССАЖИРСКИЕ МЕЖДУНАРОДНЫЕ ПЕРЕВОЗКИ ООО "БЕРКУТ"</p>' +
                        '<p>ООО "Беркут" располагает 6-ю пятидесяти пяти местными комфортабельными автобусами.\n' +
                        'Каждый из них имеет право вьезда на территорию Китая, что позволяет нам осуществлять\n' +
                        'поездки не только по территории города Владивостока, Приморского края, но и по территории КНР.</p>',
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
                page: 'pass_trans',
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

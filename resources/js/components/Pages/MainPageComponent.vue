<template>
    <div class="main-wrapper">
        <div class="main-bg">
            <img class="bg-image" :src="bg.src" alt="">

            <header-only-main
            :url="url">

            </header-only-main>
            <div class="main-description">
                <div class="main-description-logo">
                    <div class="main-image-wrapper desktop">
                        <img src="/storage/htk-logo-color-main.svg" class alt="">
                    </div>
                    <div class="header-description-wrapper" data-editable data-name="page-description" v-html="pageDescription">
                        {{pageDescription}}
                    </div>

                    <div class="button-wrapper desktop" data-ce-tag="static"
                    @click="redirectInfo">
                        {{ translations.about[this.$store.state.lang] }}
                    </div>
                </div>

                <div class="main-description-text">
                    <div class="main-description-inner" data-editable data-name="page-text" v-html="pageText">
                        {{pageText}}
                    </div>

                    <div class="button-wrapper mobile" data-ce-tag="static"
                    @click="redirectInfo">
                        {{ translations.about[this.$store.state.lang] }}
                    </div>
                </div>
            </div>
        </div>

        <main-card-list
        :cards="cards">

        </main-card-list>
    </div>
</template>

<script>
import {initEditor} from "../../inc/ContentTools/editor";

export default {
    name: "MainPageComponent",
    props: {
        cards: Array,
        url: String,
        bg: Object,
        data: Object,
        auth: Number,
        api: String,
    },
    mounted() {
        if (this.auth) {
            initEditor(this.api, this.setData)
        }
    },
    data() {
        return {
            translations: {
                about: {ru: 'ПОДРОБНЕЕ', cn: '更多信息'},
            }
        }
    },
    computed: {
        pageText() {
            return this.data['page_text']
        },
        pageDescription() {
            return this.data["page_description"]
        }
    },
    methods: {
        setData(payload) {
            return {
                page: 'main',
                text: payload['page-text'],
                description: payload['page-description'],
                lang: this.$store.state.lang
            }
        },
        redirectInfo() {
            window.location.href = `${this.url}/info`
        },
    }
}
</script>

<style scoped lang="scss">

    .main-bg {
        width: 100%;
        padding: 2vh 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        position: relative;

        .bg-image {
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity : 0.3;
            z-index: -100;
            object-fit: cover;
            mask-image: linear-gradient(#000 20%, transparent);
            mask-position: bottom;
        }
    }

    .main-wrapper {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        width: 100%;
    }

    .main-description {
        width: 100%;
        display: grid;
        grid-template-columns: 4fr 3fr;
        gap: 3vw;
        padding: 9vh 13vw 9vh 13vw;
        color: #111111;

        .main-description-logo {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 4vh;

            .button-wrapper {
                width: auto;
                height: auto;
                display: flex;
                justify-content: center;
                font-size: 18px;
                align-items: center;
                padding: 1px 5px;
                border: 1px solid #316851;
                font-family: 'Harmonia';
                color: #ffffff;
                background: #316851;
                cursor: pointer;
                border-radius: 5px;
                margin-right: auto;
                margin-bottom: 2vh;
            }

            .main-image-wrapper {
                position: relative;
            }

            .header-description-wrapper {
                width: 100%;
                //padding-left: 3.5vw;
            }

            .header-description-wrapper h4 {
                font-weight: bold;
                font-size: 1.4em;
                text-transform: uppercase;
                line-height: 1.5em;
            }
        }

        .main-description-text {
            //padding-top: 5vh;
            padding-left: 1vw;
            font-size: 1rem;
            font-weight: 400;

            .main-description-inner {
                font-size: 1rem;
                font-weight: 400;
            }

            .button-wrapper {
                width: auto;
                height: auto;
                display: flex;
                justify-content: center;
                font-size: 18px;
                align-items: center;
                padding: 1px 5px;
                border: 1px solid #316851;
                font-family: 'Harmonia';
                color: #ffffff;
                background: #316851;
                cursor: pointer;
                border-radius: 5px;
                margin-right: auto;
                margin-bottom: 2vh;
            }
        }
    }

    @media (max-width: 899px) {
        .main-description {
            display: flex;
            flex-direction: column;

            .main-description-logo {
                display: flex;
                flex-direction: column;
                gap: 2vh;
            }
        }
    }

</style>

<template>
    <div class="contacts-wrapper">

        <header-pages
            :bg_image="bg.src"
            :url="url"
            :content="pageDescription">

        </header-pages>

        <div class="page-content">
            <contacts-item-element
                :content="htk"
                :show-map="true">

                <template v-slot:map>
                    <iframe src="https://yandex.ru/map-widget/v1/?lang=ru_RU&amp;scroll=true&amp;um=constructor%3A840eb19f3008a4b16fe71bdff33882375194059076c15bbb9f43b7cf0297f192"
                            frameborder="0" allowfullscreen="true" width="100%" height="300px" style="display: block;">

                    </iframe>
                </template>

            </contacts-item-element>

            <contacts-item-element
                :content="svh"
                :show-map="true">

                <template v-slot:map>
                    <iframe src="https://yandex.ru/map-widget/v1/?lang=ru_RU&amp;scroll=true&amp;um=constructor%3Ae2f63bcc667adf962cca588dd74b7bde9bff30687ef8f1a5ad92a36a82e482c0"
                            frameborder="0" allowfullscreen="true" width="100%" height="300px" style="display: block;">

                    </iframe>
                </template>

            </contacts-item-element>

            <contacts-item-element
                :content="tp" />

            <contacts-item-element
                :content="additional" />
        </div>

    </div>
</template>

<script>
import ContactsItemElement from "../Cards/ContactsItemElement.vue";
import {initEditor} from "../../inc/ContentTools/editor";

export default {
    name: "ContactsPageComponent",
    components: {ContactsItemElement},
    props: {
        url: String,
        auth: Number,
        bg: Object,
        page_data: {
            type: Object,
            default: () => {
                return {
                    'page_description': '',
                }
            }
        },
        htk: Object,
        svh: Object,
        tp: Object,
        additional: Object,
    },
    mounted() {
        if (this.auth) {
            initEditor(`${this.url}/api/contacts`, this.setData)
        }
    },
    methods: {
        setData(payload) {
            return {
                htk_content: payload['text_htk'],
                htk_title: payload['title_htk'],
                svh_content: payload['text_svh'],
                svh_title: payload['title_svh'],
                tp_content: payload['text_tp'],
                tp_title: payload['title_tp'],
                additional_content: payload['text_additional'],
                additional_title: payload['title_additional'],
                lang: this.$store.state.lang
            }
        }
    },
    computed: {
        pageDescription() {
            return this.page_data['page_description']
        }
    }
}
</script>

<style scoped lang="scss">

    .contacts-wrapper {
        display: flex;
        flex-direction: column;
        gap: 3vh;
        //padding: 5vh 10vw;
    }

</style>

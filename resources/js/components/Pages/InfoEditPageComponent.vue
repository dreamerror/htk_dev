<template>
    <div class="page-wrapper">
        <header-pages
            :bg_image="bg.src"
            :url="url"
            :content="pageTitle"
            :files="files">

        </header-pages>

        <div class="page-content">
            <div class="page-text" data-editable data-name="page-text" v-html="pageContent">
                {{pageContent}}
            </div>

            <file-upload-inputs
                v-if="auth"
                :api_files="api_files"
                :files="files"
                type="info"
                :id="id" />
        </div>


    </div>
</template>

<script>
import {initEditor} from "../../inc/ContentTools/editor";

export default {
    name: "InfoEditPageComponent",
    props: {
        url: String,
        api_text: String,
        api_files: String,
        bg: Object,
        data: {
            type: Object,
            default: () => {
                return {
                    page_content: '<p>Тело новости</p>',
                    page_title: '<p class="title">Заголовок</p>'
                }
            }
        },
        files: {
            type: Array,
            default: () => [],
        },
        id: {
            type: Number,
            default: 0,
        },
        auth: Number,
    },
    computed: {
        pageContent() {
            return this.data['page_content']
        },
        pageTitle() {
            return this.data["page_title"]
        }
    },
    mounted() {
        if (this.auth) {
            initEditor(this.api_text, this.setData)
        }
    },
    methods: {
        setData(payload) {
            return {
                id: this.id,
                content: payload['page-text'],
                title: payload['page-header'],
                lang: this.$store.state.lang
            }
        },
        addHandler(e) {
            e.preventDefault();
            this.elementsAdded++;
            const newItem = {text: '', file: '', id: 0 - this.elementsAdded};
            this.filesArray.push(newItem);
        },
        deleteHandler(e, id) {
            e.preventDefault();
            this.filesArray = this.filesArray.filter(function (item) {
                return item.id !== id
            });
            this.deletedItems.push(id);
            this.elementsAdded--;
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
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr;
        gap: 2vh;
    }

    .page-text {
        display: flex;
        flex-direction: column;
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

<template>
    <div class="page-wrapper">
        <header-pages
            :bg_image="'/storage/bg/svh.png'"
            :url="url"
            :content="pageTitle"
            :files="files">

        </header-pages>

        <div class="page-content">
            <div class="page-text" data-editable data-name="page-text" v-html="pageContent">
                {{pageContent}}
            </div>
            <div class="page-files">

            </div>
        </div>

        <form method="post" :action="api_files" enctype="multipart/form-data">

        </form>
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
        data: {
            type: Object,
            default: {
                page_content: '<p>Тело новости</p>',
                page_title: '<p class="title">Заголовок</p>'
            }
        },
        files: Array,
        id: {
            type: Number,
            default: 0,
        }
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
        initEditor(this.api_text, this.setData)
    },
    methods: {
        setData(payload) {
            return {
                id: this.id,
                content: payload['page-text'],
                title: payload['page-header']
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
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr;
        gap: 2vh;
    }

    .page-text {
        display: flex;
        flex-direction: column;
        align-items: center;
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

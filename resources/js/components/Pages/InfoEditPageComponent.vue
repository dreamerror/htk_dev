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

            <form method="post" :action="api_files" enctype="multipart/form-data" v-if="auth">
                <div class="file-input-wrapper"
                     v-for="(item, index) in filesArray"
                     :key="index">
                    <input type="text" :name="`text_${index}`" :value="item.text">

                    <input type="file" :name="`file_${index}`" :id="`file_${index}`">

                    <button @click.stop="deleteHandler($event, item.id)">
                        Удалить
                    </button>

                    <input type="hidden" :name="`id_${index}`" :value="item.id">

                </div>

                <input type="hidden" name="page_id" :value="id">
                <input type="hidden" name="deleted" :value="deletedItems" multiple>

                <button @click.stop="addHandler($event)">Добавить элемент</button>
                <input type="submit">
            </form>
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
    data() {
        return {
            filesArray: [...this.files],
            elementsAdded: 0,
            deletedItems: [],
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
        if (this.auth) {
            initEditor(this.api_text, this.setData)
        }
    },
    methods: {
        setData(payload) {
            return {
                id: this.id,
                content: payload['page-text'],
                title: payload['page-header']
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

<template>
    <div class="page-files">
        <h3>Прикреплённые файлы</h3>
        <form method="post" :action="api_files" enctype="multipart/form-data">
            <div class="file-input-wrapper"
                 v-for="(item, index) in filesArray"
                 :key="index">
                <input type="text" :name="`text_${index}`" v-model="item.text">
                <input type="text" :name="`cntext_${index}`" v-model="item.cn_text" placeholder="Текст на китайском">

                <input type="file" :name="`file_${index}`" :id="`file_${index}`">

                <button @click.stop="deleteHandler($event, item.id)">
                    Удалить
                </button>

                <input type="hidden" :name="`id_${index}`" :value="item.id">

            </div>

            <input type="hidden" name="page_id" :value="id" v-if="type === 'info'">
            <input type="hidden" name="page" :value="page_name" v-if="type !== 'info'">
            <input type="hidden" name="lang" :value="$store.state.lang">
            <input type="hidden" name="deleted" :value="deletedItems" multiple>

            <button @click.stop="addHandler($event)">Добавить элемент</button>
            <input type="submit">
        </form>
    </div>
</template>

<script>
export default {
    name: "PageFilesUploadComponent",
    props: {
        api_files: String,
        files: {
            type: Array,
            default: () => [],
        },
        type: String,
        id: {
            type: Number,
            default: 0,
        },
        page_name: {
            type: String,
            default: '',
        }
    },
    data() {
        return {
            filesArray: [...this.files],
            elementsAdded: 0,
            deletedItems: [],
        }
    },
    methods: {
        addHandler(e) {
            e.preventDefault();
            this.elementsAdded++;
            const newItem = {text: '', file: '', id: 0 - this.elementsAdded};
            this.filesArray.unshift(newItem);
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

    .page-files {
        margin-top: 2vh;
    }

</style>

<template>
    <div class="file-item-wrapper">
        <div class="file-block-wrapper"
             @click="clickHandler">
            <h3>
                {{page_name}}
            </h3>
        </div>
        <div class="file-edit-wrapper"
             :class="{'not-show': !this.displayEdit}">
            <form method="post" :action="api" enctype="multipart/form-data">
                <div class="file-input-wrapper"
                     v-for="(item, index) in contentArray"
                     :key="index">
                    <input type="text" :name="`text_${index}`" :value="item.text">

                    <input type="file" :name="`file_${page}_${index}`" :id="`file_${page}_${index}`">

                    <button @click.stop="deleteHandler($event, item.id)">
                        Удалить
                    </button>

                    <input type="hidden" :name="`id_${index}`" :value="item.id">

                </div>

                <input type="hidden" name="page" :value="page">
                <input type="hidden" name="deleted" :value="deletedItems" multiple>

                <button @click.stop="addHandler($event)">Добавить элемент</button>
                <input type="submit">
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "AdminFilesListElement",
    props: {
        page: String,
        page_name: String,
        content: Array,
        api: String,
    },
    data() {
        return {
            displayEdit: false,
            contentArray: this.content,
            deletedItems: [],
            elementsAdded: 0
        }
    },
    methods: {
        clickHandler() {
            this.displayEdit = !this.displayEdit;
        },
        addHandler(e) {
            e.preventDefault();
            this.elementsAdded++;
            const newItem = {value: '', file: '', id: 0 - this.elementsAdded};
            this.contentArray.push(newItem);
        },
        deleteHandler(e, id) {
            e.preventDefault();
            this.contentArray = this.contentArray.filter(function (item) {
                return item.id !== id
            });
            this.deletedItems.push(id);
            this.elementsAdded--;
        }
    }
}
</script>

<style scoped lang="scss">

    .file-item-wrapper {
        display: flex;
        flex-direction: column;
        gap: 1vh;
    }

    .file-block-wrapper {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 10vw;
        width: 80%;
        height: 20%;
        border: 1px solid black;
        cursor: pointer;

        .doc-image-wrapper {
            width: 10vw;
            height: 10vw;
            display: flex;
            align-items: center;


            img {
                width: inherit;
                height: inherit;
            }
        }
    }

    .file-edit-wrapper {
        transition: all 0.3s linear;
    }

    .file-input-wrapper {
        display: flex;
        gap: 2vw;
    }

    .not-show {
        display: none;
    }

</style>

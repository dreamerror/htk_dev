<template>
    <div class="contact-item-wrapper">
        <div class="contact-block-wrapper"
        @click="clickHandler">
            <h3>
                {{pos_name}}
            </h3>
        </div>
        <div class="doc-edit-wrapper"
        v-if="this.displayEdit">
            <form method="post" :action="api">
                <div class="contacts-input-wrapper"
                v-for="(item, index) in contentArray"
                :key="index">
                    <input type="text" :name="`text_${index}`" :value="item.text">

                    <select :name="`type_${index}`" v-model="item.type">
                        <option v-for="option in typeOptions" :value="option.value">
                            {{option.text}}
                        </option>
                    </select>

                    <button @click.stop="deleteHandler($event, item.id)">
                        Удалить
                    </button>

                    <input type="hidden" :name="`id_${index}`" :value="item.id">

                </div>

                <input type="hidden" name="position" :value="position">
                <input type="hidden" name="deleted" :value="deletedItems" multiple>

                <button @click.stop="addHandler($event)">Добавить элемент</button>
                <input type="submit">
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "AdminContactsListElement",
    props: {
        position: String,
        pos_name: String,
        content: Array,
        api: String,
    },
    data() {
        return {
            displayEdit: false,
            typeOptions: [
                {text: 'Адрес', value: 'address'},
                {text: 'Телефон', value: 'phone'},
                {text: 'E-mail', value: 'email'},
            ],
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
            const newItem = {value: '', position: this.position, type: 'address', id: 0 - this.elementsAdded};
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

    .contact-item-wrapper {
        display: flex;
        flex-direction: column;
        gap: 1vh;
    }

    .contact-block-wrapper {
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

    .doc-edit-wrapper {
        transition: all 0.3s linear;
    }

    .contacts-input-wrapper {
        display: flex;
        gap: 2vw;
    }

</style>

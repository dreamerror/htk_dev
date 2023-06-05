<template>
    <div class="bg-item-wrapper">
        <div class="bg-block-wrapper"
        @click="clickHandler">
            <div class="bg-image-wrapper">
                <img :src="src" alt="">
            </div>
            <h3>
                {{title}}
            </h3>
        </div>
        <div class="bg-edit-wrapper"
        v-if="this.displayEdit">
            <form method="post" :action="api" enctype="multipart/form-data">
                <input type="file" name="image">

                <input type="text" name="title" :value="title">

                <textarea name="description">
                    {{ text }}
                </textarea>

                <select :name="lang" v-model="lang">
                    <option v-for="option in typeLang" :value="option.value">
                        {{option.text}}
                    </option>
                </select>

                <input type="hidden" name="id" :value="id">
                <input type="submit">
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "AdminBackgroundsListElement",
    props: {
        src: String,
        title: String,
        text: String,
        id: Number,
        lang: String,
        api: String,
    },
    data() {
        return {
            displayEdit: false,
            typeLang: [
                {text: 'Русский', value: 'ru'},
                {text: 'Китайский', value: 'cn'},
            ],
        }
    },
    methods: {
        clickHandler() {
            this.displayEdit = !this.displayEdit;
        }
    }
}
</script>

<style scoped lang="scss">

    .bg-item-wrapper {
        display: flex;
        flex-direction: column;
        gap: 1vh;
    }

    .bg-block-wrapper {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 10vw;
        width: 80%;
        height: 20%;
        border: 1px solid black;
        cursor: pointer;

        .bg-image-wrapper {
            width: 10vw;
            height: 10vw;
            display: flex;
            align-items: center;


            img {
                width: inherit;
            }
        }
    }

    .bg-edit-wrapper {
        transition: all 0.3s linear;
    }

</style>

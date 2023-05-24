<template>
    <div class="doc-item-wrapper">
        <div class="doc-block-wrapper"
        @click="clickHandler">
            <div class="doc-image-wrapper">
                <img :src="src" alt="">
            </div>
            <h3>
                {{doc}}
            </h3>
        </div>
        <div class="doc-edit-wrapper"
        v-if="this.displayEdit">
            <form method="post" :action="api" enctype="multipart/form-data">
                <input type="file" :name="docName">
                <input type="hidden" name="doc" :value="docName">
                <input type="submit">
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "AdminDocumentsListElement",
    props: {
        src: String,
        doc: String,
        docName: String,
        api: String,
    },
    data() {
        return {
            displayEdit: false
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

    .doc-item-wrapper {
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

    .doc-edit-wrapper {
        transition: all 0.3s linear;
    }

</style>

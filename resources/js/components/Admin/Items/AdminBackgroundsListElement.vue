<template>
    <div class="bg-item-wrapper">
        <div class="bg-block-wrapper"
        @click="clickHandler">
            <div class="bg-image-wrapper">
                <img :src="src" alt="">
            </div>
            <h3>
                {{page}}
            </h3>
        </div>
        <div class="bg-edit-wrapper"
        v-if="this.displayEdit">
            <form method="post" :action="api" enctype="multipart/form-data">
                <input type="file" :name="pageName">
                <input type="hidden" name="page" :value="pageName">
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
        page: String,
        pageName: String,
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

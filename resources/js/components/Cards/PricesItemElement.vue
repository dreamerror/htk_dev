<template>
    <div class="price-item-wrapper">
        <h3>
            {{ title }}
        </h3>

        <download-button
        :file="file"
        :filename="filename"
        :ext="ext"
        :text="text">

        </download-button>
    </div>
</template>

<script>
export default {
    name: "PricesItemElement",
    props: {
        title: String,
        file: String,
        text: String,
    },
    computed: {
        filenameExt() {
            return this.file.split('/').slice(-1)[0]
        },
        filename() {
            return this.filenameExt.split('.').slice(0, -1).join('.')
        },
        ext() {
            return this.filenameExt.split('.').slice(-1)[0]
        }
    }
}
</script>

<style scoped lang="scss">

    .price-item-wrapper {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        padding: 2vh 0;
        border-bottom: 1px solid gray;

        h3 {
            width: 70%;
        }
    }

</style>

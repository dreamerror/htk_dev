<template>
    <div class="page-wrapper">
        <price-card
        v-for="item in items"
        :key="item.text"
        :title="item.text"
        :file="item.file"
        text="Скачать документ">

        </price-card>
    </div>
</template>

<script>
export default {
    name: "PricesPageComponent",
    props: {
        items: Array,
    }
}
</script>

<style scoped lang="scss">

    .page-wrapper {
        display: flex;
        flex-direction: column;
        padding: 5vh 15vw;
    }

</style>

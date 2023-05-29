<template>
    <div class="page-wrapper">
        <header-pages
            :bg_image="'/storage/bg/svh.png'"
            :url="url"
            :content="''"
            :redirections="items">

        </header-pages>
    </div>
</template>

<script>
export default {
    name: "TransportationPageComponent",
    props: {
        url: String,
    },
    data() {
        return {
            items: [
                {text: 'Грузовые', route: 'transportation/cargo'},
                {text: 'Пассажирские', route: 'transportation/passengers'},
                {text: 'Транзитные грузы', route: 'transportation/transit'},
            ]
        }
    },
}
</script>

<style scoped lang="scss">

    .page-wrapper {
        display: flex;
        flex-direction: column;
    }

</style>

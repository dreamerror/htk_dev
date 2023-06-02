<template>
    <div class="page-wrapper">
        <header-pages
            :bg_image="'/storage/bg/svh.png'"
            :url="url"
            :content="''"
            :redirections="usingItems">

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
            ],
            itemsCn: [
                {text: '货运', route: 'transportation/cargo'},
                {text: '客运', route: 'transportation/passengers'},
            ]
        }
    },
    computed: {
        usingItems() {
            return this.$store.state.lang === 'ru' ? this.items : this.itemsCn
        }
    }
}
</script>

<style scoped lang="scss">

    .page-wrapper {
        display: flex;
        flex-direction: column;
    }

</style>

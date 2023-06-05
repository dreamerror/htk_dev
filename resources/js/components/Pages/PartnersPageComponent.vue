<template>
    <div class="page-wrapper">
        <header-partners
            :bg_image="bg.src"
            :url="url"
            :items="items">

        </header-partners>
    </div>
</template>

<script>
export default {
    name: "PartnersPageComponent",
    props: {
        url: String,
        bg: Object,
        items: {
            type: Array,
            default: () => []
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

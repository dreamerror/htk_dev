<template>
    <div class="page-wrapper">
        <header-partners
            :bg_image="'/storage/bg/svh.png'"
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

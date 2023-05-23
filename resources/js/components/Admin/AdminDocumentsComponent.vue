<template>
    <div class="admin-list-wrapper">
        <admin-doc-item v-for="(item, index) in pages"
        :key="index"
        :src="item.src"
        :doc="item.doc"
        :docName="item.docName"
        :api="api">

        </admin-doc-item>
    </div>
</template>

<script>
export default {
    name: "AdminBackgroundsComponent",
    props: {
        api: String,
    },
    data() {
        return {
            pages: [
                {doc: 'Свидетельство СВХ', src: '/storage/svh_svid.png', docName: 'svh_svid'},
                {doc: 'Приказ "О включении в реестр таможенных представителей"', src: '/storage/tp_prikaz.png', docName: 'tp_prikaz'},
                // {doc: 'Таможенный представитель', 'src': '/storage/bg/tp.jpg', docName: 'tp'},
            ]
        }
    },
}
</script>

<style scoped>

    .admin-list-wrapper {
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 1vh;
        padding-left: 15vw;
    }

</style>

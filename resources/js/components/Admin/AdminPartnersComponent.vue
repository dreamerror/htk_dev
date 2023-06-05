<template>
    <div class="admin-list-wrapper">
        <admin-partner-item v-for="(item, index) in newData"
        :key="index"
        :src="item.src"
        :title="item.title"
        :id="item.id"
        :api="api">

        </admin-partner-item>
    </div>
</template>

<script>
export default {
    name: "AdminPartnersComponent",
    props: {
        api: String,
        data: Array,
    },

    computed: {
        newData() {
            let array = this.data;
            array.push({
                src: '',
                title: 'Добавить',
                id: -1
            })
            return array
        }
    }
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

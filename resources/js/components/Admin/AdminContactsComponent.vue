<template>
    <div class="admin-list-wrapper">
        <admin-contact-item v-for="(item, index) in positions"
        :key="index"
        :api="api"
        :position="item.position"
        :pos_name="item.pos_name"
        :content="item.content">

        </admin-contact-item>
    </div>
</template>

<script>
export default {
    name: "AdminContactsComponent",
    props: {
        api: String,
        items: Array,
    },
    data() {
        return {
            positions: [
                {pos_name: 'Наш офис', position: 'office',
                    content: this.items.filter(function(e) {return e.position === 'office'})},
                {pos_name: 'СВХ', position: 'svh',
                    content: this.items.filter(function(e) {return e.position === 'svh'})},
                {pos_name: 'Перевозки "Беркут"', position: 'berkut',
                    content: this.items.filter(function(e) {return e.position === 'berkut'})},
                {pos_name: 'Таможенный представитель', position: 'tp',
                    content: this.items.filter(function(e) {return e.position === 'tp'})}
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

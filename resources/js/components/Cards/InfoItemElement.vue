<template>
    <div class="info-item-wrapper">
        <div class="info-item-text">
            <a>
                <h3>{{title}}</h3>
            </a>
            <span>{{description}}</span>
        </div>

    </div>
</template>

<script>
export default {
    name: "InfoItemElement",
    props: {
        title: String,
        description: String,
        auth: Number,
    }
}
</script>


<style scoped lang="scss">

</style>

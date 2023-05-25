<template>
    <div class="info-item-wrapper">
        <div class="info-item-text">
            <a :href="`/info/show/${id}`" v-html="title">
                {{title}}
            </a>
        </div>

    </div>
</template>

<script>
export default {
    name: "InfoItemElement",
    props: {
        title: String,
        id: Number,
    }
}
</script>


<style scoped lang="scss">

    .info-item-wrapper {
        text-transform: uppercase;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 1em;
        height: 10vh;
        //width: 25%;
        padding: 1px 1px;
        border: 2px solid #d1a251;
        color: #ffffff;
        background: #d1a251;
        font-weight: bold;
        cursor: pointer;
        border-radius: 100px;
    }

    .info-item-text {
        a {
            text-decoration: none;
            color: #ffffff;

            h1 {
                font-size: 1.5vw !important;
            }
        }
    }

</style>

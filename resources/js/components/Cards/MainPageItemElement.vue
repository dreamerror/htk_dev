<template>
    <div class="card-wrapper"
    @click="redirect">
        <div class="card-img-wrapper">
            <img :src="src" alt="">
        </div>
        <h3>
            {{title}}
        </h3>
        <span>
            {{description}}
        </span>
    </div>
</template>

<script>
export default {
    name: "MainPageItemElement",
    props: {
        src: String,
        title: String,
        description: String,
        route: String
    },
    methods: {
        redirect() {
            window.location.href = this.route;
        }
    }
}
</script>

<style scoped lang="scss">

    .card-wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 1vh 1vw;
        gap: 1vh;
        border-radius: 10px;
        width: 33%;
        box-shadow: 2px 2px 2px 2px black;
        cursor: pointer;
    }

    .card-img-wrapper {
        width: 100%;
        min-height: 150px;
        position: relative;
        display: inline-block;
        overflow: hidden;
        margin: 0;

        img {
            display: block;
            position: absolute;
            top: 50%;
            left: 50%;
            height: 100%;
            min-width: 100%;
            transform: translate(-50%, -50%);
        }
    }

</style>

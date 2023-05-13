<template>
    <div class="card-wrapper">
        <div class="card-img-wrapper"
             @click="redirect">
            <img :src="src" alt="">
        </div>
        <div class="card-text">
            <h3 class="card-title">
                {{title}}
            </h3>
            <span>
                {{description}}
            </span>
        </div>
    </div>
</template>

<script>
export default {
    name: "MainPageItemElement",
    props: {
        src: String,
        title: String,
        description: String,
        route: String,
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
        justify-content: center;
        padding: 0.2vh 0.2vw;
        gap: 1vh;
    }

    .card-img-wrapper {
        position: relative;
        display: inline-block;
        overflow: hidden;
        width: 100%;
        aspect-ratio: 2;
        cursor: pointer;

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

    .card-title {
        border-bottom: 1px solid black;
        text-align: center;
    }

    .card-text {
        margin-bottom: auto;
    }

    @media (min-width: 900px) {
        .card-wrapper {
            width: 50%;
        }

        .card-wrapper:nth-child(2n) {
            flex-direction: column-reverse;
        }

        .card-img-wrapper {
            order: var(--image-order)
        }

        .card-text {
            order: var(--text-order)
        }
    }

    @media (max-width: 899px) {
        .card-wrapper {
            width: 100%;
        }

        .card-img-wrapper {
            margin: 0 auto;
        }
    }

</style>

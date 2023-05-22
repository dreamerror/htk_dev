<template>
    <div class="card-wrapper">
        <div class="card-img-wrapper">
            <img :src="src" alt="">
            <div class="button-wrapper"
            @click="redirect">
                ПОБРОБНЕЕ
            </div>
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
        align-items: center;
        justify-content: center;
        //padding: 0.1vh 0.1vw;
        width: 100%;
        gap: 1vw;
    }

    .card-img-wrapper {
        position: relative;
        display: inline-block;
        overflow: hidden;
        width: 100%;
        aspect-ratio: 1.5;

        img {
            display: block;
            position: absolute;
            top: 50%;
            left: 50%;
            height: 100%;
            min-width: 100%;
            transform: translate(-50%, -50%);
        }

        .button-wrapper {
            width: 30%;
            position: absolute;
            top: 50%;
            left: 35%;
            display: flex;
            justify-content: center;
            font-size: 18px;
            align-items: center;
            padding: 1px 1px;
            border: 1px solid #d1a251;
            color: #ffffff;
            background: #d1a251;
            cursor: pointer;
            border-radius: 5px;
        }
    }

    .card-text {
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;

        .card-title {
            text-align: center;
            text-transform: uppercase;
        }

        span {
            width: 90%;
            text-align: center;
        }
    }

    @media (min-width: 900px) {
        .card-wrapper {
            flex-direction: row;
            width: 100%;
        }

        .card-wrapper:nth-child(2n) {
            flex-direction: row-reverse;
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
            flex-direction: column;
            width: 100%;
        }

        .card-img-wrapper {
            margin: 0 auto;
        }
    }

</style>

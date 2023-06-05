<template>
    <div class="card-wrapper">
        <div class="card-img-wrapper">
            <img :src="src" alt="">
            <div class="button-wrapper"
            @click="redirect">
                {{ translations.about[this.$store.state.lang] }}
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
    data() {
        return {
            translations: {
                about: {ru: 'ПОДРОБНЕЕ', cn: '更多信息'}
            }
        }
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
        width: 100%;
        gap: 1vw;
    }

    .card-img-wrapper {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        width: 100%;
        aspect-ratio: 1;

        img {
            display: block;
            position: absolute;
            top: 50%;
            left: 50%;
            height: 100%;
            min-width: 100%;
            transform: translate(-50%, -50%);
            z-index: -100;
        }

        .button-wrapper {
            width: auto;
            display: flex;
            justify-content: center;
            font-size: 3rem;
            font-weight: 400;
            align-items: center;
            font-family: 'Harmonia';
            padding: 5px 2rem;
            letter-spacing: 0.3rem;
            border: 1px solid #d1a251;
            color: #ffffff;
            background: #d1a251;
            cursor: pointer;
            border-radius: 15px;
            z-index: 100;
        }
    }

    .card-text {
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        gap: 0.5rem;

        .card-title {
            text-align: center;
            text-transform: uppercase;
            font-size: 3.1rem;
        }

        span {
            width: 90%;
            text-align: center;
        }
    }

    @media (max-width: 1000px) {
        .card-img-wrapper {
            .button-wrapper {
                font-size: 1.5rem;
            }
        }
    }

    @media (min-width: 901px) {
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

    @media (max-width: 900px) {
        .card-wrapper {
            flex-direction: column;
            width: 100%;
            gap: 5vh;
        }

        .card-wrapper:not(:last-of-type) {
            margin-bottom: 5vh;
        }

        .card-img-wrapper {
            margin: 0 auto;
            width: 80%;
        }

        .card-img-wrapper {
            .button-wrapper {
                font-size: 1rem;
            }
        }

        .card-text {
            .card-title {
                font-size: 1rem;
            }

            span {
                font-size: 0.75rem;
            }
        }
    }

</style>

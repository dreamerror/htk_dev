<template>
    <div class="page-button"
    @click="redirect">
        <div class="button-text" ref="text-block" v-html="text">
            {{ text }}
        </div>
    </div>
</template>

<script>
export default {
    name: "RedirectButtonComponent",
    props: {
        url: String,
        route: String,
        text: String,
        resize: {
            type: Boolean,
            default: false
        }
    },
    mounted() {
        if (this.resize) {
            this.adjustFontSize()
        }
    },
    methods: {
        redirect() {
            window.location.href = `${this.url}/${this.route}`
        },
        checkOverflow() {
            const el = this.$refs["text-block"];
            let curOverflow = el.style.overflow;
            if (!curOverflow || curOverflow === "visible") {
                el.style.overflow = "hidden";
            }
            let isOverflowing =
                el.clientWidth < el.scrollWidth || el.clientHeight < el.scrollHeight;
            el.style.overflow = curOverflow;
            return isOverflowing;
        },
        adjustFontSize() {
            let fitted = false
            let lastSize
            const increment = 0.05;
            const el = this.$refs["text-block"];

            el.style.fontSize = "0.1em";

            while (!fitted) {
                if (this.checkOverflow()) {
                    el.style.fontSize = `${lastSize - increment}em`
                    fitted = true
                } else {
                    lastSize = parseFloat(el.style.fontSize.slice(0, -2)) + increment
                    el.style.fontSize = `${lastSize}em`
                }
            }

        }
    }
}
</script>

<style scoped lang="scss">

    .page-button {
        text-transform: uppercase;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 25%;
        aspect-ratio: 5;
        text-align: center;
        padding: 20px 20px;
        font-size: 1rem;
        border: 2px solid #316851;
        color: #ffffff;
        background: #316851;
        //font-weight: bold;
        cursor: pointer;
        border-radius: 50px;
    }

    .page-button:hover {
        background: #111111;
        color: #316851;
    }

    .button-text {
        width: 90%;
        height: 90%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 1rem;
    }

    @media (max-width: 899px) {
        .page-button {
            width: 100%;
        }
    }

</style>

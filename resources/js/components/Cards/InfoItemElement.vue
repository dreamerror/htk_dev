<template>
    <div class="info-item-wrapper"
    @click="redirect">
        <div class="info-item-text" v-html="textFromHtml" ref="text-block">
            {{textFromHtml}}
        </div>

    </div>
</template>

<script>
export default {
    name: "InfoItemElement",
    props: {
        url: String,
        title: String,
        id: Number,
    },
    data() {
        return {
            textFromHtml: this.title.replace(/<[^>]+>/g, ''),
        }
    },
    mounted() {
        this.adjustFontSize()
    },
    methods: {
        redirect() {
            window.location.href = `${this.url}/info/show/${this.id}`
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
            const increment = 0.1;
            const el = this.$refs["text-block"];

            el.style.fontSize = "3em";

            while (!fitted) {
                if (!this.checkOverflow()) {
                    el.style.fontSize = `${lastSize + increment}em`
                    fitted = true
                } else {
                    lastSize = parseFloat(el.style.fontSize.slice(0, -2)) - increment
                    el.style.fontSize = `${lastSize}em`
                }
            }

        }
    }
}
</script>


<style scoped lang="scss">

    .info-item-wrapper {
        text-transform: uppercase;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 30%;
        aspect-ratio: 5;
        text-align: center;
        padding: 20px 20px;
        font-size: 1rem;
        border: 2px solid #316851;
        color: #ffffff;
        background: #316851;
        cursor: pointer;
        border-radius: 50px;
    }

    .info-item-text {
        width: 90%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: 'Harmonia';
    }

    @media (max-width: 899px) {
        .info-item-wrapper {
            width: 100%;
        }
    }

</style>

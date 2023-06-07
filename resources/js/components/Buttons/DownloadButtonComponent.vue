<template>
    <div class="page-button"
    @click="downloadFile">
        <div class="button-text" ref="text-block" :style="style">
            {{ text }}
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "DownloadButtonComponent",
    props: {
        file: String,
        filename: String,
        ext: String,
        text: String,
        url: {
            type: String,
            default: '',
        }
    },
    mounted() {
        this.adjustFontSize()
    },
    methods: {
        downloadFile() {
            axios({
                url: this.file,
                method: 'GET',
                responseType: 'blob',
            }).then((res) => {
                let FILE = window.URL.createObjectURL(new Blob([res.data]));
                let docUrl = document.createElement('a');
                docUrl.href = this.url + '/' + FILE;
                docUrl.setAttribute('download', `${this.filename}.${this.ext}`);
                document.body.appendChild(docUrl);
                docUrl.click();
            });
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
    },
    computed: {
        style() {
            const wrap = this.$store.state.lang === 'ru' ? 'normal' : 'nowrap'
            return `white-space: ${wrap};`
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
        width: 30%;
        aspect-ratio: 5;
        text-align: center;
        font-size: 1rem;
        border: 2px solid #d1a251;
        color: #ffffff;
        background: #d1a251;
        cursor: pointer;
        border-radius: 50px;
    }

    .page-button:hover {
        background: #111111;
        color: #d1a251;
    }

    .button-text {
        width: 90%;
        height: 90%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: 'Harmonia';
    }

    @media (max-width: 900px) {
        .page-button {
            width: 100%;
        }
    }

</style>

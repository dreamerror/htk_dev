<template>
    <div class="button-wrapper"
    @click="downloadFile">
        <i class="fa fa-download" aria-hidden="true"></i>
        {{ text }}
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
                docUrl.href = FILE;
                docUrl.setAttribute('download', `${this.filename}.${this.ext}`);
                console.log(docUrl)
                document.body.appendChild(docUrl);
                docUrl.click();
            });
        }
    }
}
</script>

<style scoped lang="scss">

    .button-wrapper {
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: center;
        gap: 1vw;
        padding: 15px;
        border: 1px solid #d1a251;
        color: #ffffff;
        background: #d1a251;
        transition: all 0.3s linear;
        cursor: pointer;
    }

    .button-wrapper:hover {
        background: #111111;
        color: #d1a251;
    }

</style>

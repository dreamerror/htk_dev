<template>
    <div class="page-button"
    @click="downloadFile">
<!--        <i class="fa fa-download" aria-hidden="true"></i>-->
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

    .page-button {
        text-transform: uppercase;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 25%;
        aspect-ratio: 4;
        padding: 1px 1px;
        border: 2px solid #d1a251;
        color: #ffffff;
        background: #d1a251;
        font-weight: bold;
        cursor: pointer;
        border-radius: 50px;
    }

    .page-button:hover {
        background: #111111;
        color: #d1a251;
    }

</style>

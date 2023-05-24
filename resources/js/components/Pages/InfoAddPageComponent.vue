<template>
    <div class="page-wrapper">
        <header-pages
            :bg_image="'/storage/bg/svh.png'"
            :url="url">

        </header-pages>

        <div class="page-content">

        </div>
    </div>
</template>

<script>

export default {
    name: "InfoAddPageComponent",
    props: {
        url: String,
        api: String,
    },
    computed: {
        pageText() {
            return this.data['page_text']
        },
        pageAdditional() {
            return this.data['page_additional']
        },
        pageDescription() {
            return this.data["page_description"]
        }
    },
    methods: {
        setData(payload) {
            console.log(payload)
            return {
                page: 'svh',
                text: payload['page-text'],
                additional: payload['page-additional'],
                description: payload['page-header']
            }
        }
    }
}
</script>

<style scoped lang="scss">

    .page-wrapper {
        display: flex;
        flex-direction: column;
        gap: 3vh;
    }

    .header-bg:after {
        background-image: url("/storage/bg/svh.png");
    }

    .page-content {
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2vh;
        width: 50%;
    }

    .doc-text {
        display: flex;
        flex-direction: row;
        justify-content: center;
        gap: 2vw;
    }

    .page-documents {
        grid-column: 1;
        grid-row: 1;
        display: flex;
        flex-direction: column;
        gap: 1vh;

        img {
            width: 100%;
            //height: auto;
            box-shadow: 4px 6px 10px rgb(0 0 0 / 20%);
            border: 6px solid #fff;
        }
    }

    .page-text {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .title {
        font-size: 1.5rem;
        font-weight: 400;
        line-height: 28px;
        text-transform: uppercase;
    }

    .page-additional-info {
        grid-row: 2;
        grid-column: 1 / span 2;
    }

</style>

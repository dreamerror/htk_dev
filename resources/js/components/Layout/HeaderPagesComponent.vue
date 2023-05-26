<template>
    <div class="header-bg">
        <img class="bg-image" :src="bg_image" alt="">
        <header-only-main
            :url="url">

        </header-only-main>
        <div class="header-description">
            <div class="header-description-logo desktop">
                <div class="header-image-wrapper">
                    <img src="/storage/htk-logo-color-main.svg" class alt="">
                </div>
            </div>

            <div class="header-description-text" data-editable data-name="page-header" v-html="content">
                {{content}}
            </div>
            <div data-ce-tag="static" class="page-buttons-wrapper" v-if="files.length">
                <download-button
                    v-for="file in files"
                    :key="file.id"
                    :file="file.file"
                    :filename="filename(file.file)"
                    :ext="ext(file.file)"
                    :text="file.text"
                >

                </download-button>
            </div>
            <div data-ce-tag="static" class="page-buttons-wrapper" v-if="redirections.length">
                <redirect-button
                v-for="item in redirections"
                :key="item.route"
                :url="url"
                :route="item.route"
                :text="item.text">

                </redirect-button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "HeaderPagesMainComponent",
    props: {
        bg_image: String,
        url: String,
        content: String,
        files: {
            type: Array,
            default: () => [],
        },
        redirections: {
            type: Array,
            default: () => [],
        },
    },
    methods: {
        filenameExt(file) {
            return file.split('/').slice(-1)[0]
        },
        filename(file) {
            file = this.filenameExt(file)
            return file.split('.').slice(0, -1).join('.')
        },
        ext(file) {
            file = this.filenameExt(file)
            return file.split('.').slice(-1)[0]
        }
    }
}
</script>

<style scoped lang="scss">

    .header-bg {
        width: 100%;
        padding: 2vh 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        position: relative;

        .bg-image {
            display: block;
            position: absolute;
            object-fit: cover;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity : 0.3;
            z-index: -100;
            mask-image: linear-gradient(#000 20%, transparent);
            mask-position: bottom;
        }
    }

    .header-contacts {
        display: grid;
        grid-template-columns: 1fr 1fr 2fr;
        width: 60%;
        padding-top: 4vh;
        padding-left: 1vw;

        .contact-elem {
            display: flex;
            flex-direction: column;

            span {
                text-transform: uppercase;
                margin-bottom: 0.25rem;
                font-size: 1rem;
            }

            a {
                text-decoration: none;
                color: #111111;
                font-size: 1rem;
            }
        }

        .contacts-button {
            text-transform: uppercase;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 70%;
            padding: 1px 15px;
            border: 2px solid #ffffff;
            color: #ffffff;
            font-weight: bold;
            cursor: pointer;
            border-radius: 50px;
        }
    }

    .header-description {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
        align-items: center;
        gap: 1vh;
        padding: 9vh 13vw 9vh 13vw;
        color: #111111;

        .header-description-logo {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            width: 50%;
            gap: 4vh;

            .header-image-wrapper img {
                width: 100%;
                aspect-ratio: 2;
            }

            .header-image-wrapper {
                position: relative;
                padding: 0;
            }

            .header-description-wrapper {
                width: 100%;
                padding-left: 3.5vw;
                padding-bottom: 1vh;
            }

            .header-description-wrapper h4 {
                font-weight: bold;
                font-size: 1.2em;
                text-transform: uppercase;
            }
        }

        .header-description-text {
            width: 100%;
            text-align: center;
            padding-top: 3vh;
            font-size: 15px;
            font-weight: 700;
        }
    }

    .page-buttons-wrapper {
        margin-top: 5vh;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        gap: 2vw;
        width: 100%;
        padding: 0 13vw;
    }

</style>

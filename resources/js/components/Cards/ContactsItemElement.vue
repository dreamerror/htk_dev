<template>
    <div class="contacts-item-wrapper">
        <div class="contacts-title" data-editable :data-name="`title_${position}`">
            <h3 v-html="title">
                {{ title }}
            </h3>
        </div>
        <div class="contacts-info">
            <div class="contacts-map"
            v-if="showMap">
                <slot name="map">

                </slot>
            </div>
            <div class="contacts-text" v-html="text" data-editable :data-name="`text_${position}`">
                {{ text }}
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ContactsItemElement",
    props: {
        content: Object,
        showMap: {
            type: Boolean,
            default: false,
        },
    },
    computed: {
        text() {
            return this.content['content']
        },
        title() {
            return this.content['title']
        },
        position() {
            return this.content['position']
        }
    }
}
</script>

<style scoped lang="scss">

    .contacts-item-wrapper {
        display: flex;
        flex-direction: column;
    }

    .contacts-item-wrapper:not(:last-child) {
        margin-bottom: 2vh;
    }

    .contacts-info {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 5vw;
    }

    @media (max-width: 899px) {
        .contacts-info {
            flex-wrap: wrap;
        }
    }

    .contacts-text {
        display: flex;
        flex-direction: column;
        gap: 0.5vh;
        p {
            white-space: pre-line;
            margin: 1em;
        }
    }

    .contacts-map {
        box-shadow: 0 3px 12px rgb(0 0 0 / 16%);
        width: 50%;
    }

</style>

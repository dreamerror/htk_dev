<template>
    <div class="contacts-item-wrapper">
        <h3>
            {{ title }}
        </h3>
        <div class="contacts-info">
            <div class="contacts-map"
            v-if="showMap">
                <slot name="map">

                </slot>
            </div>
            <div class="contacts-text">
                <div class="contacts-item"
                v-for="(item, index) in items"
                :key="index">
                    <span
                    v-if="item.title">
                        <strong>{{ item.title }}</strong>
                    </span>
                    <span>
                        {{ item.text }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ContactsItemElement",
    props: {
        title: String,
        items: {
            type: Array,
            default: () => []
        },
        showMap: {
            type: Boolean,
            default: false,
        },
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
    }

    .contacts-item span {
        white-space: pre-line;
    }

    .contacts-map {
        box-shadow: 0 3px 12px rgb(0 0 0 / 16%);
        width: 50%;
    }

</style>

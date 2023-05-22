<template>
    <div class="page-wrapper">
        <header-pages
            :bg_image="'/storage/banner.png'"
            :url="url">

            <template v-slot:description>
                <h3>
                    ООО "Хасанская транспортная компания" включает в себя всё необходимое для оказания услуг по хранению
                    товаров и транспортных средств различных видов, находящихся под таможенным контролем до выпуска
                    в соответствии с заявленной таможенной процедурой.
                </h3>
            </template>

        </header-pages>
    </div>
</template>

<script>
export default {
    name: "SVHPageComponent",
    props: {
        url: String,
    },
}
</script>

<style scoped lang="scss">

    .page-wrapper {
        display: flex;
        flex-direction: column;
        gap: 3vh;
    }

    .header-bg:after {
        background-image: url("/storage/banner.png");
    }


</style>
